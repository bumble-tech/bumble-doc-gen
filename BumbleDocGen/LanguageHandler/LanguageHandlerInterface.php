<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Plugin\PluginsCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\Render\Twig\Function\CustomFunctionInterface;

interface LanguageHandlerInterface
{
    /**
     * Unique language handler key
     */
    public static function getLanguageKey(): string;

    /**
     * Additional twig functions that are added to the built-in ones when a language handler is included
     *
     * @return CustomFunctionInterface[]
     */
    public function getCustomTwigFunctions(Context $context): array;

    /**
     * Additional twig filters that are added to the built-in ones when a language handler is included
     *
     * @return CustomFilterInterface[]
     */
    public function getCustomTwigFilters(Context $context): array;

    /**
     * Additional plugins that will be added when the language handler is enabled
     */
    public function getExtraPlugins(): PluginsCollection;

    public function getEntityCollection(): RootEntityCollection;
}