<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\Context\RenderContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;

final class PhpHandler implements LanguageHandlerInterface
{
    public function __construct(private ClassEntityCollection $classEntityCollection, private PhpHandlerSettings $phpHandlerSettings)
    {
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityCollection(): RootEntityCollection
    {
        if ($this->classEntityCollection->isEmpty()) {
            $this->classEntityCollection->loadClassEntities();
        }
        return $this->classEntityCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getCustomTwigFunctions(RenderContext $context): CustomFunctionsCollection
    {
        return $this->phpHandlerSettings->getCustomTwigFunctions();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getCustomTwigFilters(RenderContext $context): CustomFiltersCollection
    {
        return $this->phpHandlerSettings->getCustomTwigFilters();
    }
}
