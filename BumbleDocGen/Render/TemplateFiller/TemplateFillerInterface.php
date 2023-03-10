<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use BumbleDocGen\Parser\Entity\RootEntityCollection;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     */
    public function getTemplateParameters(RootEntityCollection $rootEntityCollection, string $templateName): array;
}
