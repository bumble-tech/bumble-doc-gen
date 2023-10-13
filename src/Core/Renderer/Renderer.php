<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Renderer\AfterRenderingEntities;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeRenderingDocFiles;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeRenderingEntities;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use DI\DependencyException;
use DI\NotFoundException;
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
        private Configuration $configuration,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private PluginEventDispatcher $pluginEventDispatcher,
        private RendererContext $rendererContext,
        private MainTwigEnvironment $twig,
        private RendererIteratorFactory $renderIteratorFactory,
        private SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache,
        private Filesystem $fs,
        private LoggerInterface $logger
    ) {
    }

    /**
     * Starting the rendering process
     *
     * @throws InvalidArgumentException
     * @throws RuntimeError
     * @throws LoaderError
     * @throws DependencyException
     * @throws SyntaxError
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function run(): void
    {
        $outputDir = $this->configuration->getOutputDir();

        $templateParams = [];
        foreach ($this->rootEntityCollectionsGroup as $collectionName => $rootEntityCollection) {
            $templateParams[$collectionName] = $rootEntityCollection;
        }

        $this->pluginEventDispatcher->dispatch(new BeforeRenderingDocFiles());

        foreach ($this->renderIteratorFactory->getTemplatesWithOutdatedCache() as $templateFile) {
            if ($templateFile->isTemplate()) {
                $this->rendererContext->setCurrentTemplateFilePatch($templateFile->getRelativeTemplatePath());
                $content = $this->twig->render($templateFile->getRelativeTemplatePath(), $templateParams);

                $content = $this->pluginEventDispatcher->dispatch(
                    new BeforeCreatingDocFile($content, $this->rendererContext)
                )->getContent();
            } else {
                $content = file_get_contents($templateFile->getRealPath());
            }

            $filePatch = "{$outputDir}{$templateFile->getRelativeDocPath()}";
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
            // tmp hack to fix gitHub pages
            $this->fs->dumpFile($filePatch, "<!-- {% raw %} -->\n{$content}\n<!-- {% endraw %} -->");
            $this->logger->info("Saving `{$filePatch}`");
        }

        $this->pluginEventDispatcher->dispatch(new AfterRenderingEntities());

        foreach ($this->renderIteratorFactory->getFilesToRemove() as $file) {
            $this->fs->remove($file->getPathname());
            $this->logger->info("Removing `{$file->getPathname()}` file");
        }

        $this->rootEntityCollectionsGroup->updateAllEntitiesCache();
        $this->sharedCompressedDocumentFileCache->removeNotUsedKeys();
        $this->sharedCompressedDocumentFileCache->saveChanges();
    }
}
