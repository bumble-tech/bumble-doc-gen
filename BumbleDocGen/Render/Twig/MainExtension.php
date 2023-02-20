<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\GetClassMethodsBodyCode;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Render\Twig\Filter\FixStrSize;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;
use BumbleDocGen\Render\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\Render\Twig\Filter\Quotemeta;
use BumbleDocGen\Render\Twig\Filter\RemoveLineBrakes;
use BumbleDocGen\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Render\Twig\Filter\TextToCodeBlock;
use BumbleDocGen\Render\Twig\Filter\TextToHeading;
use BumbleDocGen\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\Render\Twig\Function\DrawDocumentationMenu;
use BumbleDocGen\Render\Twig\Function\DrawDocumentedEntityLink;
use BumbleDocGen\Render\Twig\Function\GeneratePageBreadcrumbs;
use BumbleDocGen\Render\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;
use BumbleDocGen\Render\Twig\Function\PrintEntityCollectionAsList;
use Psr\Log\LoggerInterface;

/**
 * This is an extension that is used to generate documents from templates
 */
final class MainExtension extends \Twig\Extension\AbstractExtension
{
    private CustomFunctionsCollection $functions;
    private CustomFiltersCollection $filters;

    public function __construct(private Context $context)
    {
        $this->setDefaultFunctions();
        $this->setDefaultFilters();
    }

    public function changeContext(Context $context): void
    {
        $this->context = $context;
    }

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->context->getConfiguration();
    }

    public function getLogger(): LoggerInterface
    {
        return $this->getConfiguration()->getLogger();
    }

    public function setDefaultFunctions(): void
    {
        $this->functions = CustomFunctionsCollection::create(
            new GetDocumentedEntityUrl($this->context),
            new DrawClassMap($this->context),
            new DrawDocumentationMenu($this->context),
            new LoadPluginsContent($this->context),
            new GeneratePageBreadcrumbs($this->context),
            new PrintEntityCollectionAsList($this->context),
            new DrawDocumentedEntityLink($this->context),
            new GetClassMethodsBodyCode($this->context)
        );
    }

    public function setDefaultFilters(): void
    {
        $this->filters = CustomFiltersCollection::create(
            new Quotemeta(),
            new StrTypeToUrl($this->context),
            new PrepareSourceLink(),
            new RemoveLineBrakes(),
            new AddIndentFromLeft(),
            new FixStrSize(),
            new HtmlToRst(),
            new TextToHeading($this->context),
            new TextToCodeBlock($this->context)
        );
    }

    /**
     * List of twig functions
     */
    public function getFunctions(): \Generator
    {
        return $this->functions->getTwigFunctions();
    }

    /**
     * List of twig filters
     */
    public function getFilters(): \Generator
    {
        yield from $this->filters->getTwigFilters();
    }
}
