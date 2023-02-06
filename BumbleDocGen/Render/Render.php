<?php

declare(strict_types=1);

namespace BumbleDocGen\Render;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapper;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Plugin\Event\Render\BeforeCreatingDocFile;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\MainExtension;
use Symfony\Component\Finder\Finder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Generates and processes files from directory TemplatesDir saving them to directory OutputDir
 *
 * @see ConfigurationInterface::getTemplatesDir()
 * @see ConfigurationInterface::getOutputDir()
 */
final class Render
{
    public function __construct(
        private ConfigurationInterface $configuration,
        private ClassEntityCollection $classEntityCollection,
        private PluginEventDispatcher $pluginEventDispatcher
    ) {
    }

    /**
     * Remove all files from OutputDir before rendering process
     *
     * @see ConfigurationInterface::clearOutputDirBeforeDocGeneration()
     * @see ConfigurationInterface::getOutputDir()
     */
    private function clearOutputDir(string $dir): bool
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
            return rmdir($dir);
        }
        return false;
    }

    /**
     * Starting the rendering process
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function run(): void
    {
        $templateFolder = $this->configuration->getTemplatesDir();
        $loader = new FilesystemLoader([
            $templateFolder,
        ]);
        $twig = new Environment($loader);

        $breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
        $context = new Context(
            $this->configuration, $this->classEntityCollection, $breadcrumbsHelper, $this->pluginEventDispatcher
        );
        $twig->addExtension(new MainExtension($context));

        $finder = Finder::create()->in($templateFolder)->ignoreDotFiles(true)->ignoreVCSIgnored(true)->files();

        $logger = $this->configuration->getLogger();
        $outputDir = $this->configuration->getOutputDir();

        if ($this->configuration->clearOutputDirBeforeDocGeneration()) {
            $this->clearOutputDir($outputDir);
        }

        foreach ($finder as $templateFile) {
            /**@var \SplFileInfo $templateFile */
            $filePatch = str_replace($templateFolder, '', $templateFile->getRealPath());

            if (str_ends_with($filePatch, '.twig')) {
                $context->setCurrentTemplateFilePatch($filePatch);
                $content = $twig->render($filePatch, [
                    'classEntityCollection' => $this->classEntityCollection,
                    'fillersParameters' => $this->configuration->getTemplateFillers()->getParametersForTemplate(
                        $this->classEntityCollection->getReflector(),
                        $filePatch
                    ),
                ]);

                $content = $this->pluginEventDispatcher->dispatch(
                    new BeforeCreatingDocFile($content, $context)
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
            $logger->info("Saving `{$filePatch}`");
        }

        foreach ($context->getEntityWrappersCollection() as $entityWrapper) {
            /**@var \BumbleDocGen\Render\Context\DocumentedEntityWrapper $entityWrapper * */
            $docRender = $this->configuration->getEntityDocRendersCollection()->getFirstMatchingRender($entityWrapper);
            if (!$docRender) {
                $logger->warning(
                    "Skipping `{$entityWrapper->getDocumentTransformableEntity()->getName()}`. Render not found."
                );
                continue;
            }

            $context->setCurrentTemplateFilePatch($entityWrapper->getInitiatorFilePath());
            $docRender->setContext($context);

            $content = $docRender->getRenderedText($entityWrapper);
            $filePatch = "{$outputDir}{$entityWrapper->getDocUrl()}";
            if (str_contains($filePatch, chr(0))) {
                $logger->warning("Skipping `{$filePatch}`");
                continue;
            }
            $newDirName = dirname($filePatch);
            if (!is_dir($newDirName)) {
                mkdir($newDirName, 0755, true);
            }
            file_put_contents($filePatch, $content);
            $logger->info("Saving `{$filePatch}`");
        }
        $this->classEntityCollection->updateEntitiesCache();
    }
}
