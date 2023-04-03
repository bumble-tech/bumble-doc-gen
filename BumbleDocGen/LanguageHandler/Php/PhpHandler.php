<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\Context\RenderContext;
use BumbleDocGen\Core\Render\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Render\Twig\Function\CustomFunctionsCollection;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;

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
