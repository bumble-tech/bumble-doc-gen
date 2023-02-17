<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     */
    public function getTemplateParameters(ClassEntityCollection $classEntityCollection, string $templateName): array;
}
