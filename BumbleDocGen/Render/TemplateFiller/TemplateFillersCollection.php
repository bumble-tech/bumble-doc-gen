<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\TemplateFiller;

use BumbleDocGen\Parser\Entity\RootEntityCollection;

final class TemplateFillersCollection
{
    /** @var array<string, TemplateFillerInterface> */
    private array $templateFillers = [];

    /**
     * Add a set of fillers for the template
     */
    public function setForTemplate(
        string                  $templateName,
        TemplateFillerInterface ...$templateFillers
    ): TemplateFillersCollection
    {
        $this->templateFillers[$templateName] = $templateFillers;
        return $this;
    }

    /**
     * Get all parameters for a template, obtained using all its fillers
     */
    public function getParametersForTemplate(RootEntityCollection $rootEntityCollection, string $templateName): array
    {
        $parameters = [];
        foreach ($this->templateFillers[$templateName] ?? [] as $item) {
            $parameters = array_merge($parameters, $item->getTemplateParameters($rootEntityCollection, $templateName));
        }
        return $parameters;
    }
}
