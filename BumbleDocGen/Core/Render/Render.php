<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Render\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Render\Context\RenderContext;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Render\Twig\MainTwigEnvironment;
use Psr\Log\LoggerInterface;
use Symfony\Component\Finder\Finder;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Generates and processes files from directory TemplatesDir saving them to directory OutputDir
 *
 * @see Configuration::getTemplatesDir()
 * @see Configuration::getOutputDir()
 */
final class Render
{
    public function __construct(
        private Configuration                      $configuration,
        private RootEntityCollectionsGroup         $rootEntityCollectionsGroup,
        private PluginEventDispatcher              $pluginEventDispatcher,
        private RenderContext                      $renderContext,
        private MainTwigEnvironment                $twig,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private LoggerInterface                    $logger
    )
    {
    }

    /**
     * Remove all files from OutputDir before rendering process
     *
     * @see Configuration::clearOutputDirBeforeDocGeneration()
     * @see Configuration::getOutputDir()
     */
    private function clearOutputDir(string $dir): void
    {
        if (is_dir($dir)) {
            $it = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($it as $file) {
                if ($file->isDir()) {
                    rmdir($file->getPathname());
                } else {
                    unlink($file->getPathname());
                }
            }
            rmdir($dir);
        }
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
        $finder = Finder::create()
            ->in($templateFolder)
            ->ignoreDotFiles(true)
            ->ignoreVCSIgnored(true)
            ->reverseSorting()
            ->sortByName()
            ->files();

        $outputDir = $this->configuration->getOutputDir();

        if ($this->configuration->clearOutputDirBeforeDocGeneration()) {
            $this->clearOutputDir($outputDir);
        }

        $templateParams = [];
        foreach ($this->rootEntityCollectionsGroup as $collectionName => $rootEntityCollection) {
            $templateParams[$collectionName] = $rootEntityCollection;
        }

        foreach ($finder as $templateFile) {
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

        foreach ($this->documentedEntityWrappersCollection as $entityWrapper) {
            /**@var DocumentedEntityWrapper $entityWrapper * */
            $this->renderContext->setCurrentTemplateFilePatch($entityWrapper->getInitiatorFilePath());
            $docRender = $entityWrapper->getDocRender();

            $content = $docRender->getRenderedText($entityWrapper);
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
        $this->rootEntityCollectionsGroup->updateAllEntitiesCache();
    }
}
