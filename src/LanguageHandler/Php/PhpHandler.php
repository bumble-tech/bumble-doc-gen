<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class PhpHandler implements LanguageHandlerInterface
{
    public function __construct(
        private PhpEntitiesCollection $entitiesCollection,
        private PhpHandlerSettings $phpHandlerSettings
    ) {
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    public function getPhpHandlerSettings(): PhpHandlerSettings
    {
        return $this->phpHandlerSettings;
    }

    public function getEntityCollection(): PhpEntitiesCollection
    {
        return $this->entitiesCollection;
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getCustomTwigFunctions(RendererContext $context): CustomFunctionsCollection
    {
        return $this->phpHandlerSettings->getCustomTwigFunctions();
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getCustomTwigFilters(RendererContext $context): CustomFiltersCollection
    {
        return $this->phpHandlerSettings->getCustomTwigFilters();
    }
}
