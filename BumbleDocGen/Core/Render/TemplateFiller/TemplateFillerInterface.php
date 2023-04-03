<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\TemplateFiller;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     */
    public function getTemplateParameters(string $templateName): array;
}
