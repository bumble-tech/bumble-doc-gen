<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\TemplateFiller;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     */
    public function getTemplateParameters(RootEntityCollectionsGroup $rootEntityCollectionsGroup, string $templateName): array;
}
