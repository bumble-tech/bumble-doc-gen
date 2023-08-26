<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFiltersCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionsCollection;

interface LanguageHandlerInterface
{
    /**
     * Unique language handler key
     */
    public static function getLanguageKey(): string;

    /**
     * Additional twig functions that are added to the built-in ones when a language handler is included
     */
    public function getCustomTwigFunctions(RendererContext $context): CustomFunctionsCollection;

    /**
     * Additional twig filters that are added to the built-in ones when a language handler is included
     */
    public function getCustomTwigFilters(RendererContext $context): CustomFiltersCollection;

    public function getEntityCollection(): RootEntityCollection;
}
