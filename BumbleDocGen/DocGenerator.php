<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Parser\ProjectParser;
use BumbleDocGen\Render\Render;

final class DocGenerator
{
    public static function generateDocumentation(ConfigurationInterface $configuration): void
    {
        $projectParser = ProjectParser::create($configuration);
        $classEntityCollection = $projectParser->parse();
        (new Render($configuration, $projectParser->getReflector(), $classEntityCollection))->run();
    }
}
