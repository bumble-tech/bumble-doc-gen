<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use Roave\BetterReflection\Reflector\Reflector;

interface TemplateFillerInterface
{
    /** @var array<string, string> */
    public function getTemplateParameters(Reflector $reflector): array;
}
