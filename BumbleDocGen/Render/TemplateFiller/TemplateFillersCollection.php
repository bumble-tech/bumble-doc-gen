<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use Roave\BetterReflection\Reflector\Reflector;

final class TemplateFillersCollection
{
    /** @var array<string, TemplateFillerInterface[]> */
    private array $templateFillers = [];

    public function setForTemplate(
        string $templateName,
        TemplateFillerInterface ...$templateFillers
    ): TemplateFillersCollection {
        $this->templateFillers[$templateName] = $templateFillers;
        return $this;
    }

    public function getParametersForTemplate(Reflector $reflector, string $templateName): array
    {
        $parameters = [];
        foreach ($this->templateFillers[$templateName] ?? [] as $item) {
            $parameters = array_merge($parameters, $item->getTemplateParameters($reflector));
        }
        return $parameters;
    }
}
