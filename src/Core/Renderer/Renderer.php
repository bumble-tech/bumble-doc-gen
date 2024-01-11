<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Renderer\AfterRenderingEntities;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeRenderingDocFiles;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeRenderingEntities;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Generates and processes files from directory TemplatesDir saving them to directory OutputDir
 *
 * @see Configuration::getTemplatesDir()
 * @see Configuration::getOutputDir()
 */
final class Renderer
{
    public function __construct(
        private readonly Configuration $configuration,
        private readonly RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private readonly PluginEventDispatcher $pluginEventDispatcher,
        private readonly RendererContext $rendererContext,
        private readonly MainTwigEnvironment $twig,
        private readonly RendererIteratorFactory $renderIteratorFactory,
        private readonly SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache,
        private readonly Filesystem $fs,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Starting the rendering process
     *
     * @throws InvalidArgumentException
     * @throws RuntimeError
     * @throws LoaderError
     * @throws SyntaxError
     * @throws InvalidConfigurationParameterException
     */
    public function run(): void
    {
        $this->twig->reloadTemplates();
        $outputDir = $this->configuration->getOutputDir();

        $templateParams = [];
        foreach ($this->rootEntityCollectionsGroup as $collectionName => $rootEntityCollection) {
            $templateParams[$collectionName] = $rootEntityCollection;
        }

        $this->pluginEventDispatcher->dispatch(new BeforeRenderingDocFiles());

        foreach ($this->renderIteratorFactory->getTemplatesWithOutdatedCache() as $templateFile) {
            $filePatch = "{$outputDir}{$templateFile->getRelativeDocPath()}";
            if ($templateFile->isTemplate()) {
                $this->rendererContext->setCurrentTemplateFilePatch($templateFile->getRelativeTemplatePath());
                $content = $this->twig->render($templateFile->getRelativeTemplatePath(), $templateParams);

                $handledEvent = $this->pluginEventDispatcher->dispatch(
                    new BeforeCreatingDocFile($content, $filePatch)
                );
                $content = $handledEvent->getContent();
                $filePatch = $handledEvent->getOutputFilePatch();
            } else {
                $content = file_get_contents($templateFile->getRealPath());
            }

            $newDirName = dirname($filePatch);
            if (!is_dir($newDirName)) {
                $this->fs->mkdir($newDirName, 0755);
            }
            $this->fs->dumpFile($filePatch, $content);
            $this->logger->info("Saving `{$filePatch}`");
        }

        $this->pluginEventDispatcher->dispatch(new BeforeRenderingEntities());

        foreach ($this->renderIteratorFactory->getDocumentedEntityWrappersWithOutdatedCache() as $entityWrapper) {
            /** @var DocumentedEntityWrapper $entityWrapper */

            $content = $entityWrapper->getDocRender()->getRenderedText($entityWrapper);
            $filePatch = "{$outputDir}{$entityWrapper->getDocUrl()}";
            if (str_contains($filePatch, chr(0))) {
                $this->logger->warning("Skipping `{$filePatch}`");
                continue;
            }
            $newDirName = dirname($filePatch);
            if (!is_dir($newDirName)) {
                $this->fs->mkdir($newDirName, 0755);
            }
            $handledEvent = $this->pluginEventDispatcher->dispatch(
                new BeforeCreatingEntityDocFile($content, $filePatch)
            );

            $content = $handledEvent->getContent();
            $filePatch = $handledEvent->getOutputFilePatch();
            $this->fs->dumpFile($filePatch, $content);
            $this->logger->info("Saving `{$filePatch}`");
        }

        $this->pluginEventDispatcher->dispatch(new AfterRenderingEntities());

        foreach ($this->renderIteratorFactory->getFilesToRemove() as $file) {
            if (!$file->isWritable()) {
                continue;
            }
            $type = $file->getType();
            $this->fs->remove($file->getPathname());
            $this->logger->info("Removing `{$file->getPathname()}` {$type}");
        }

        $this->rootEntityCollectionsGroup->updateAllEntitiesCache();
        $this->sharedCompressedDocumentFileCache->removeNotUsedKeys();
        $this->sharedCompressedDocumentFileCache->saveChanges();
    }
}
