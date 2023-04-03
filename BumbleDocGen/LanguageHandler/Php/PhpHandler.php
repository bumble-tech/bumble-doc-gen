<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\DrawClassMap;
use BumbleDocGen\LanguageHandler\Php\Render\Twig\Function\GetClassMethodsBodyCode;

final class PhpHandler implements LanguageHandlerInterface
{
    public function __construct(private ClassEntityCollection $classEntityCollection)
    {
    }

    public static function getLanguageKey(): string
    {
        return 'php';
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityCollection(): RootEntityCollection
    {
        if ($this->classEntityCollection->isEmpty()) {
            $this->classEntityCollection->loadClassEntities();
        }
        return $this->classEntityCollection;
    }

    public function getCustomTwigFunctions(Context $context): CustomFunctionsCollection
    {
        return CustomFunctionsCollection::create(
            new DrawClassMap($context),
            new GetClassMethodsBodyCode($context)
        );
    }

    public function getCustomTwigFilters(Context $context): CustomFiltersCollection
    {
        return CustomFiltersCollection::create();
    }
}
