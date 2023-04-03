<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Filter\FixStrSize;
use BumbleDocGen\Core\Render\Twig\Filter\HtmlToRst;
use BumbleDocGen\Core\Render\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\Core\Render\Twig\Filter\Quotemeta;
use BumbleDocGen\Core\Render\Twig\Filter\RemoveLineBrakes;
use BumbleDocGen\Core\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Core\Render\Twig\Filter\TextToCodeBlock;
use BumbleDocGen\Core\Render\Twig\Filter\TextToHeading;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\Core\Render\Twig\Function\DrawDocumentationMenu;
use BumbleDocGen\Core\Render\Twig\Function\DrawDocumentedEntityLink;
use BumbleDocGen\Core\Render\Twig\Function\GeneratePageBreadcrumbs;
use BumbleDocGen\Core\Render\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\Core\Render\Twig\Function\LoadPluginsContent;
use BumbleDocGen\Core\Render\Twig\Function\PrintEntityCollectionAsList;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
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

    public function getConfiguration(): Configuration
    {
        return $this->context->getConfiguration();
    }

    public function getLogger(): LoggerInterface
    {
        return $this->getConfiguration()->getLogger();
    }

    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        return $this->getConfiguration()->getLanguageHandlersCollection(
            $this->context->getPluginEventDispatcher()
        );
    }

    public function setDefaultFunctions(): void
    {
        $this->functions = CustomFunctionsCollection::create(
            new GetDocumentedEntityUrl($this->context),
            new DrawDocumentationMenu($this->context),
            new LoadPluginsContent($this->context),
            new GeneratePageBreadcrumbs($this->context),
            new PrintEntityCollectionAsList($this->context),
            new DrawDocumentedEntityLink($this->context),
        );
        foreach ($this->getLanguageHandlersCollection() as $languageHandler) {
            /**@var LanguageHandlerInterface $languageHandler */
            $this->functions->add(...iterator_to_array(
                $languageHandler->getCustomTwigFunctions($this->context)
            ));
        }
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
        foreach ($this->getLanguageHandlersCollection() as $languageHandler) {
            /**@var LanguageHandlerInterface $languageHandler */
            $this->filters->add(...iterator_to_array(
                $languageHandler->getCustomTwigFilters($this->context)
            ));
        }
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
