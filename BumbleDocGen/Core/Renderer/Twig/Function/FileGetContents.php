<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

/**
 * Displaying the content of a file or web resource
 *
 * @see https://www.php.net/manual/en/function.file-get-contents.php
 *
 * @example {{ fileGetContents('https://www.php.net/manual/en/function.file-get-contents.php') }}
 * @example {{ fileGetContents('%templates_dir%/../config.yaml') }}
 */
final class FileGetContents implements CustomFunctionInterface
{
    public function __construct(private ConfigurationParameterBag $parameterBag)
    {
    }

    public static function getName(): string
    {
        return 'fileGetContents';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $resourceName Resource name, url or path to the resource.
     *  The path can contain shortcodes with parameters from the configuration (%param_name%)
     *
     * @return string Content of a file or web resource
     */
    public function __invoke(string $resourceName): string
    {
        $path = realpath($this->parameterBag->resolveValue($resourceName));
        if (!$path) {
            return '';
        }
        return @file_get_contents($path) ?: '';
    }
}
