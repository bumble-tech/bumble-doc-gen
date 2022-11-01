<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Render\Twig\Filter\EndTextBySeparatorRst;
use BumbleDocGen\Render\Twig\Filter\FixStrSize;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;
use BumbleDocGen\Render\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\Render\Twig\Filter\Quotemeta;
use BumbleDocGen\Render\Twig\Filter\RemoveLineBrakes;
use BumbleDocGen\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Render\Twig\Filter\TextToCodeBlockRst;
use BumbleDocGen\Render\Twig\Filter\TextToHeading;
use BumbleDocGen\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\Render\Twig\Function\DrawDocumentationMenu;
use BumbleDocGen\Render\Twig\Function\DrawDocumentedClassLink;
use BumbleDocGen\Render\Twig\Function\GeneratePageBreadcrumbs;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;
use BumbleDocGen\Render\Twig\Function\IsSubclassOf;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;
use BumbleDocGen\Render\Twig\Function\PrintClassEntityCollectionAsList;

/**
 * This is an extension that is used to generate documents from templates
 */
final class MainExtension extends \Twig\Extension\AbstractExtension
{
    public function __construct(private Context $context)
    {
    }

    public function changeContext(Context $context): void
    {
        $this->context = $context;
    }

    /**
     * List of custom functions
     */
    public function getFunctions(): array
    {
        return [
            new \Twig\TwigFunction('getDocumentedClassUrl', new GetDocumentedClassUrl($this->context), [
                'is_safe' => ['html'],
            ]),
            new \Twig\TwigFunction('drawClassMap', new DrawClassMap($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFunction('drawDocumentationMenu',
                new DrawDocumentationMenu($this->context),
                ['is_safe' => ['html']]),
            new \Twig\TwigFunction('loadPluginsContent', new LoadPluginsContent($this->context), [
                'is_safe' => ['html'],
            ]),
            new \Twig\TwigFunction('isSubclassOf', new IsSubclassOf()),
            new \Twig\TwigFunction('generatePageBreadcrumbs', new GeneratePageBreadcrumbs($this->context), [
                'is_safe' => ['html'],
            ]),
            new \Twig\TwigFunction(
                'printClassEntityCollectionAsList',
                new PrintClassEntityCollectionAsList($this->context),
                [
                    'is_safe' => ['html'],
                ]
            ),
            new \Twig\TwigFunction(
                'drawDocumentedClassLink',
                new DrawDocumentedClassLink($this->context),
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }

    /**
     * List of custom filters
     */
    public function getFilters(): array
    {
        return [
            new \Twig\TwigFilter('quotemeta', new Quotemeta(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('strTypeToUrl', new StrTypeToUrl($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('prepareSourceLink', new PrepareSourceLink()),
            new \Twig\TwigFilter('removeLineBrakes', new RemoveLineBrakes()),
            new \Twig\TwigFilter('addIndentFromLeft', new AddIndentFromLeft(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('fixStrSize', new FixStrSize(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('htmlToRst', new HtmlToRst(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('textToHeading', new TextToHeading(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('endTextBySeparatorRst', new EndTextBySeparatorRst(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('textToCodeBlockRst', new TextToCodeBlockRst(), ['is_safe' => ['html']]),
        ];
    }
}
