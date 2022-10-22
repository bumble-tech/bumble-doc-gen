<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Parser\ProjectParser;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use BumbleDocGen\Render\Render;

/**
 * Class for generating documentation.
 */
final class DocGenerator
{
    /**
     * Generates documentation using configuration
     *
     * @param ConfigurationInterface $configuration
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public static function generateDocumentation(ConfigurationInterface $configuration): void
    {
        $pluginEventDispatcher = new PluginEventDispatcher($configuration);

        $projectParser = ProjectParser::create($configuration, $pluginEventDispatcher);
        $classEntityCollection = $projectParser->parse();
        (new Render($configuration, $projectParser->getReflector(), $classEntityCollection, $pluginEventDispatcher))->run();
    }
}
