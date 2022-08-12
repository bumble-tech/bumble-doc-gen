<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig;

use BumbleDocGen\ConfigurationInterface;

final class BreadcrumbsHelper
{
    public const MAIN_PAGE_NAME = 'readme.rst';
    public const DEFAULT_PREV_PAGE_NAME = 'index.rst';

    public function __construct(private ConfigurationInterface $configuration)
    {
    }

    private function loadTemplateContent(string $templateName): string
    {
        static $templateContentCache = [];
        if (!isset($templateContentCache[$templateName])) {
            $outputDir = $this->configuration->getTemplatesDir();
            $filePath = "{$outputDir}{$templateName}";
            if (!file_exists($filePath)) {
                if (!str_ends_with($filePath, '.twig')) {
                    $templateName .= '.twig';
                    $templateContentCache[$templateName] = $this->loadTemplateContent($templateName);
                } else {
                    $templateContentCache[$templateName] = '';
                }
                return $templateContentCache[$templateName];
            }
            $templateContentCache[$templateName] = file_get_contents($filePath);
        }
        return $templateContentCache[$templateName];
    }

    private function getTemplateTitle(string $templateName): string
    {
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(title)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }

        return pathinfo($templateName, PATHINFO_FILENAME);
    }

    private function getPrevPage(string $templateName): ?string
    {
        $code = $this->loadTemplateContent($templateName);
        if (preg_match_all('/({%)( ?)(set)( )(prevPage)([ =]+)([\'"])(.*)(\'|")( %})/', $code, $matches)) {
            return array_reverse($matches[8])[0];
        }
        $pathParts = explode('/', $templateName);
        array_pop($pathParts);
        array_pop($pathParts);
        $defaultValue = (count($pathParts) == 1 ? self::MAIN_PAGE_NAME : self::DEFAULT_PREV_PAGE_NAME);
        return $pathParts ? implode('/', $pathParts) . "/{$defaultValue}" : null;
    }

    public function getBreadcrumbs(string $filePatch, bool $fromCurrent = true): array
    {
        $breadcrumbs = [];
        do {
            if (!$fromCurrent) {
                $fromCurrent = true;
                continue;
            }
            $filePatch = str_replace('.twig', '', $filePatch);
            $breadcrumbs[] = [
                'url' => $this->configuration->getOutputDirBaseUrl() . $filePatch,
                'title' => $this->getTemplateTitle($filePatch),
            ];
        } while ($filePatch = $this->getPrevPage($filePatch));
        return array_reverse($breadcrumbs);
    }
}
