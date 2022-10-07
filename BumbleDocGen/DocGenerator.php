<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Parser\ProjectParser;
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
        $projectParser = ProjectParser::create($configuration);
        $classEntityCollection = $projectParser->parse();
        (new Render($configuration, $projectParser->getReflector(), $classEntityCollection))->run();
    }
}
