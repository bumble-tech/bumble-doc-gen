<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use Roave\BetterReflection\Reflector\Reflector;

interface TemplateFillerInterface
{
    /**
     * Getting template parameters from filler
     *
     * @param Reflector $reflector
     * @param string $templateName
     * @return array
     */
    public function getTemplateParameters(Reflector $reflector, string $templateName): array;
}
