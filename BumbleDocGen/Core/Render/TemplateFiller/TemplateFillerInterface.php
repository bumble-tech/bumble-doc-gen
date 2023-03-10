<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\TemplateFiller;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     */
    public function getTemplateParameters(RootEntityCollection $rootEntityCollection, string $templateName): array;
}
