<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * This is an extension that is used to generate documents from templates
 */
final class MainExtension extends \Twig\Extension\AbstractExtension
{
    private CustomFunctionsCollection $functions;
    private CustomFiltersCollection $filters;

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        private readonly RendererContext $context,
        private readonly Configuration $configuration
    ) {
        $this->setDefaultFunctions();
        $this->setDefaultFilters();
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        return $this->configuration->getLanguageHandlersCollection();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function setDefaultFunctions(): void
    {
        $this->functions = clone $this->configuration->getTwigFunctions();
        foreach ($this->getLanguageHandlersCollection() as $languageHandler) {
            /**@var LanguageHandlerInterface $languageHandler */
            $this->functions->add(...iterator_to_array(
                $languageHandler->getCustomTwigFunctions($this->context)
            ));
        }
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function setDefaultFilters(): void
    {
        $this->filters = clone $this->configuration->getTwigFilters();
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
        yield from $this->functions->getTwigFunctions();
    }

    /**
     * List of twig filters
     */
    public function getFilters(): \Generator
    {
        yield from $this->filters->getTwigFilters();
    }
}
