<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Render\Twig\Filter\FixStrSize;
use BumbleDocGen\Render\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\Render\Twig\Filter\RemoveLineBrakes;
use BumbleDocGen\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\Render\Twig\Function\DrawDocumentationMenu;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;

final class MainExtension extends \Twig\Extension\AbstractExtension
{
    public function __construct(private Context $context)
    {
    }

    public function getFunctions(): array
    {
        return [
            new \Twig\TwigFunction('getDocumentedClassUrl', new GetDocumentedClassUrl($this->context), [
                'is_safe' => ['html'],
            ]),
            new \Twig\TwigFunction('drawClassMap', new DrawClassMap($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFunction('drawDocumentationMenu', new DrawDocumentationMenu($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFunction('loadPluginsContent', new LoadPluginsContent($this->context), [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter('quotemeta', 'quotemeta', ['is_safe' => ['html']]),
            new \Twig\TwigFilter('strTypeToUrl', new StrTypeToUrl($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('prepareSourceLink', new PrepareSourceLink()),
            new \Twig\TwigFilter('removeLineBrakes', new RemoveLineBrakes()),
            new \Twig\TwigFilter('addIndentFromLeft', new AddIndentFromLeft(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('fixStrSize', new FixStrSize(), ['is_safe' => ['html']]),
        ];
    }
}
