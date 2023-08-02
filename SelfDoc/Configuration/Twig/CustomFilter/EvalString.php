<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Twig\CustomFilter;

use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface;

final class EvalString implements CustomFilterInterface
{
    public function __invoke(string $toEval): mixed
    {
        $tmp = null;
        eval("\$tmp = {$toEval};");
        return $tmp;
    }

    public static function getName(): string
    {
        return 'eval';
    }

    public static function getOptions(): array
    {
        return [];
    }
}
