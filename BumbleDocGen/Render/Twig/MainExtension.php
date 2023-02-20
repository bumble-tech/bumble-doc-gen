<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig;

use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\GetClassMethodsBodyCode;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Render\Twig\Filter\FixStrSize;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;
use BumbleDocGen\Render\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\Render\Twig\Filter\Quotemeta;
use BumbleDocGen\Render\Twig\Filter\RemoveLineBrakes;
use BumbleDocGen\Render\Twig\Filter\StrTypeToUrl;
use BumbleDocGen\Render\Twig\Filter\TextToCodeBlock;
use BumbleDocGen\Render\Twig\Filter\TextToHeading;
use BumbleDocGen\Render\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Render\Twig\Function\DrawDocumentationMenu;
use BumbleDocGen\Render\Twig\Function\DrawDocumentedEntityLink;
use BumbleDocGen\Render\Twig\Function\GeneratePageBreadcrumbs;
use BumbleDocGen\Render\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;
use BumbleDocGen\Render\Twig\Function\PrintEntityCollectionAsList;
use Psr\Log\LoggerInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * This is an extension that is used to generate documents from templates
 */
final class MainExtension extends \Twig\Extension\AbstractExtension
{
    /**
     * @var TwigFunction[]
     */
    private array $functions = [];
    /**
     * @var TwigFilter[]
     */
    private array $filters = [];

    public function __construct(private Context $context)
    {
        $this->setDefaultFunctions();
        $this->setDefaultFilters();
    }

    public function changeContext(Context $context): void
    {
        $this->context = $context;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->context->getConfiguration()->getLogger();
    }

    /**
     * CustomFunctionInterface
     */
    public function addFunctions(CustomFunctionInterface ...$functions): self
    {
        foreach ($functions as $function) {
            if (!is_callable($function)) {
                $this->getLogger()->warning("Function {$function->getName()} must be callable to be used in filters");
                continue;
            }
            $this->functions[$function::class] = new \Twig\TwigFunction(
                $function->getName(),
                $function,
                $function->getOptions()
            );
        }
        return $this;
    }

    /**
     * CustomFilterInterface
     */
    public function addFilters(TwigFilter ...$filters): self
    {
        foreach ($filters as $filter) {
            $this->filters[] = $filter;
        }
        return $this;
    }

    public function setDefaultFunctions(): void
    {
        $this->functions = [];
        $this->addFunctions(
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
        $this->filters = [];
        $this->addFilters(
            new \Twig\TwigFilter('quotemeta', new Quotemeta(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('strTypeToUrl', new StrTypeToUrl($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('prepareSourceLink', new PrepareSourceLink()),
            new \Twig\TwigFilter('removeLineBrakes', new RemoveLineBrakes()),
            new \Twig\TwigFilter('addIndentFromLeft', new AddIndentFromLeft(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('fixStrSize', new FixStrSize(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('htmlToRst', new HtmlToRst(), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('textToHeading', new TextToHeading($this->context), ['is_safe' => ['html']]),
            new \Twig\TwigFilter('textToCodeBlock', new TextToCodeBlock($this->context), ['is_safe' => ['html']])
        );
    }

    /**
     * List of custom functions
     */
    public function getFunctions(): array
    {
        return $this->functions;
    }

    /**
     * List of custom filters
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
