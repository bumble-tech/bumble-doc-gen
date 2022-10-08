<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;

final class GeneratePageBreadcrumbs
{
    public function __construct(private Context $context)
    {
    }

    public function __invoke(string $currentPageTitle, string $templatePath, bool $fromCurrent = false): string
    {
        return $this->context->getBreadcrumbsHelper()->renderBreadcrumbs(
            $currentPageTitle,
            $templatePath,
            $fromCurrent
        );
    }
}
