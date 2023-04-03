<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;

/**
 * This is an extension that is used to generate documents from templates
 */
final class MainExtension extends \Twig\Extension\AbstractExtension
{
    private CustomFunctionsCollection $functions;
    private CustomFiltersCollection $filters;

    public function __construct(private Context $context, private Configuration $configuration)
    {
        $this->setDefaultFunctions();
        $this->setDefaultFilters();
    }

    public function getConfiguration(): Configuration
    {
        return $this->context->getConfiguration();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getLanguageHandlersCollection(): LanguageHandlersCollection
    {
        return $this->getConfiguration()->getLanguageHandlersCollection();
    }

    /**
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
