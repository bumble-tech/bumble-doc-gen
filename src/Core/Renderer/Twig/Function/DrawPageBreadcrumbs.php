<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsTwigEnvironment;
use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use DI\DependencyException;
use DI\NotFoundException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

use function BumbleDocGen\Core\calculate_relative_url;

/**
 * Function to generate breadcrumbs on the page
 */
final class DrawPageBreadcrumbs implements CustomFunctionInterface
{
    public function __construct(
        private readonly BreadcrumbsHelper $breadcrumbsHelper,
        private readonly BreadcrumbsTwigEnvironment $breadcrumbsTwig,
        private readonly RendererContext $rendererContext,
        private readonly Configuration $configuration,
        private readonly RendererDependencyFactory $dependencyFactory,
    ) {
    }

    public static function getName(): string
    {
        return 'drawPageBreadcrumbs';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
            'needs_context' => true,
        ];
    }

    /**
     * @param array $context
     * @param string|null $customPageTitle Custom title of the current page
     *
     * @return string
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws LoaderError
     * @throws NotFoundException
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(
        array $context,
        ?string $customPageTitle = null
    ): string {

        $templatePath = $context[MainTwigEnvironment::CURRENT_TEMPLATE_NAME_KEY] ?? '';
        $docUrl = $this->configuration->getOutputDirBaseUrl() . $templatePath;
        $breadcrumbs = $this->breadcrumbsHelper->getBreadcrumbs($templatePath, false);
        foreach ($breadcrumbs as $k => $breadcrumb) {
            $breadcrumbs[$k]['url'] = calculate_relative_url($docUrl, $breadcrumb['url']);
        }

        $currentPageTitle = $customPageTitle ?: $this->breadcrumbsHelper->getTemplateTitle($templatePath);
        $content = $this->breadcrumbsTwig->render('breadcrumbs.md.twig', [
            'currentPageTitle' => $currentPageTitle,
            'breadcrumbs' => $breadcrumbs,
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
