<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment;
use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use DI\DependencyException;
use DI\NotFoundException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

use function BumbleDocGen\Core\get_relative_path;

/**
 * @internal
 */
final class GenerateEntityBreadcrumbs implements CustomFunctionInterface
{
    public function __construct(
        private readonly BreadcrumbsTwigEnvironment $breadcrumbsTwig,
        private readonly BreadcrumbsHelper $breadcrumbsHelper,
        private readonly RendererContext $rendererContext,
        private readonly RendererDependencyFactory $dependencyFactory
    ) {
    }

    public static function getName(): string
    {
        return 'generateEntityBreadcrumbs';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @throws RuntimeError
     * @throws LoaderError
     * @throws DependencyException
     * @throws SyntaxError
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        string $currentPageTitle,
        string $docUrl,
        string $templatePath,
    ): string {

        $templatesBreadcrumbs = $this->breadcrumbsHelper->getBreadcrumbs($templatePath);
        foreach ($templatesBreadcrumbs as $k => $breadcrumb) {
            $templatesBreadcrumbs[$k]['url'] = get_relative_path($docUrl, $breadcrumb['url']);
        }

        $content = $this->breadcrumbsTwig->render('breadcrumbs.md.twig', [
            'currentPageTitle' => $currentPageTitle,
            'breadcrumbs' => $templatesBreadcrumbs,
        ]);

        $templatesBreadcrumbs = $this->breadcrumbsHelper->getBreadcrumbsForTemplates($templatePath);
        foreach ($templatesBreadcrumbs as $templateBreadcrumb) {
            $fileDependency = $this->dependencyFactory->createFileDependency(
                filePath: $templateBreadcrumb['template'],
                contentFilterRegex: '/^---([^-]+)(---)/',
                matchIndex: 1
            );
            $this->rendererContext->addDependency($fileDependency);
        }

        return $content;
    }
}
