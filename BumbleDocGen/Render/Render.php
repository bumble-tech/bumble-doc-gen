<?php

declare(strict_types=1);

namespace BumbleDocGen\Render;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\BreadcrumbsHelper;
use BumbleDocGen\Render\Twig\MainExtension;
use Roave\BetterReflection\Reflector\Reflector;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class Render
{
    public function __construct(
        private ConfigurationInterface $configuration,
        private Reflector $reflector,
        private ClassEntityCollection $classEntityCollection
    ) {
    }

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

    public function run(): void
    {
        $templateFolder = $this->configuration->getTemplatesDir();
        $loader = new FilesystemLoader([
            $templateFolder,
            $this->configuration->getClassTemplatesDir(),
        ]);
        $twig = new Environment($loader);

        $breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
        $context = new Context(
            $this->reflector, $this->configuration, $this->classEntityCollection, $breadcrumbsHelper
        );
        $twig->addExtension(new MainExtension($context));

        $allFiles = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $templateFolder, \FilesystemIterator::SKIP_DOTS
            )
        );
        $logger = $this->configuration->getLogger();
        $outputDir = $this->configuration->getOutputDir();

        if ($this->configuration->clearOutputDirBeforeDocGeneration()) {
            $this->clearOutputDir($outputDir);
        }

        $breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
        foreach ($allFiles as $templateFile) {
            /**@var \SplFileInfo $templateFile */
            $filePatch = str_replace($templateFolder, '', $templateFile->getRealPath());

            if (str_ends_with($filePatch, '.twig')) {
                $context->setCurrentTemplateFilePatch($filePatch);
                $content = $twig->render($filePatch, [
                    'classEntityCollection' => $this->classEntityCollection,
                    'fillersParameters' => $this->configuration->getTemplateFillers()->getParametersForTemplate(
                        $this->reflector,
                        $filePatch
                    ),
                    'breadcrumbs' => $breadcrumbsHelper->getBreadcrumbs($filePatch, false),
                ]);

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

        foreach ($context->getDocumentedClassesCollection() as $documentedClass) {
            /**@var \BumbleDocGen\Render\Context\DocumentedClass $documentedClass */
            $documentedClass->getFileName();
            $content = $twig->render('class.rst.twig', [
                'classEntity' => $documentedClass->getClassEntity(),
                'breadcrumbs' => $documentedClass->getBreadcrumbsData(),
            ]);

            $filePatch = "{$outputDir}{$documentedClass->getDocUrl()}";
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
    }
}
