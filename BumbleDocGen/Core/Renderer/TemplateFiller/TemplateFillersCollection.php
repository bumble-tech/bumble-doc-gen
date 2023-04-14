<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\TemplateFiller;

final class TemplateFillersCollection
{
    /** @var array<string, TemplateFillerInterface> */
    private array $templateFillers = [];

    public static function create(TemplateFillerInterface ...$templateFillers): TemplateFillersCollection
    {
        $self = new self();
        $self->templateFillers = $templateFillers;
        return $self;
    }

    /**
     * Get all parameters for a template, obtained using all its fillers
     */
    public function getParametersForTemplate(string $templateName): array
    {
        $parameters = [];
        foreach ($this->templateFillers as $item) {
            $parameters = array_merge($parameters, $item->getTemplateParameters($templateName));
        }
        return $parameters;
    }
}
