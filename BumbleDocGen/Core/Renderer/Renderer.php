<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Render\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use Psr\Log\LoggerInterface;
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
        private Configuration                     $configuration,
        private RootEntityCollectionsGroup        $rootEntityCollectionsGroup,
        private PluginEventDispatcher             $pluginEventDispatcher,
        private RendererContext                   $renderContext,
        private MainTwigEnvironment               $twig,
        private RendererIterator                  $renderIterator,
        private SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache,
        private LoggerInterface                   $logger
    )
    {
    }

    /**
     * Starting the rendering process
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws InvalidConfigurationParameterException
     */
    public function run(): void
    {
        $templateFolder = $this->configuration->getTemplatesDir();
        $outputDir = $this->configuration->getOutputDir();

        $templateParams = [];
        foreach ($this->rootEntityCollectionsGroup as $collectionName => $rootEntityCollection) {
            $templateParams[$collectionName] = $rootEntityCollection;
        }

        foreach ($this->renderIterator->getTemplatesWithOutdatedCache() as $templateFile) {
            /**@var \SplFileInfo $templateFile */
            $filePatch = str_replace($templateFolder, '', $templateFile->getRealPath());

            if (str_ends_with($filePatch, '.twig')) {
                $this->renderContext->setCurrentTemplateFilePatch($filePatch);
                $content = $this->twig->render($filePatch,
                    array_merge($templateParams, [
                        'fillersParameters' => $this->configuration->getTemplateFillers()->getParametersForTemplate(
                            $filePatch
                        ),
                    ])
                );

                $content = $this->pluginEventDispatcher->dispatch(
                    new BeforeCreatingDocFile($content, $this->renderContext)
                )->getContent();

                $filePatch = str_replace('.twig', '', $filePatch);
            } else {
                $content = file_get_contents($templateFile->getRealPath());
            }

            $filePatch = "{$outputDir}{$filePatch}";
            $newDirName = dirname($filePatch);
            if (!is_dir($newDirName)) {
                mkdir($newDirName, 0755, true);
            }
            file_put_contents($filePatch, $content);
            $this->logger->info("Saving `{$filePatch}`");
        }

        foreach ($this->renderIterator->getDocumentedEntityWrappersWithOutdatedCache() as $entityWrapper) {
            /** @var DocumentedEntityWrapper $entityWrapper */

            $content = $entityWrapper->getDocRender()->getRenderedText($entityWrapper);
            $filePatch = "{$outputDir}{$entityWrapper->getDocUrl()}";
            if (str_contains($filePatch, chr(0))) {
                $this->logger->warning("Skipping `{$filePatch}`");
                continue;
            }
            $newDirName = dirname($filePatch);
            if (!is_dir($newDirName)) {
                mkdir($newDirName, 0755, true);
            }
            // tmp hack to fix gitHub pages
            file_put_contents($filePatch, "<!-- {% raw %} -->\n{$content}\n<!-- {% endraw %} -->");
            $this->logger->info("Saving `{$filePatch}`");
        }

        foreach ($this->renderIterator->getFilesToRemove() as $file) {
            unlink($file->getPathname());
            $this->logger->info("Removing `{$file->getPathname()}` file");
        }

        $this->sharedCompressedDocumentFileCache->saveChanges();
        $this->rootEntityCollectionsGroup->updateAllEntitiesCache();
    }
}
