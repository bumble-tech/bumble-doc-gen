<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;

/**
 * Creates an entity link by object
 *
 * @example {{ getDocumentationPageUrl('Page name') }}
 * @example {{ getDocumentationPageUrl('/someDir/someTemplate.md.twig') }}
 * @example {{ getDocumentationPageUrl('/docs/someDir/someDocFile.md') }}
 * @example {{ getDocumentationPageUrl('readme.md') }}
 */
final class GetDocumentationPageUrl implements CustomFunctionInterface
{
    public const DEFAULT_URL = '#';

    public function __construct(
        private BreadcrumbsHelper $breadcrumbsHelper,
        private LoggerInterface   $logger,
    )
    {
    }

    public static function getName(): string
    {
        return 'getDocumentationPageUrl';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $key The key by which to look up the URL of the page.
     *  Can be the title of a page, a path to a template, or a generated document
     *
     * @return string URL of the document, if found, otherwise DEFAULT_URL
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function __invoke(string $key): string
    {
        $pageLink = $this->breadcrumbsHelper->getPageLinkByKey($key);

        if (!$pageLink) {
            $this->logger->warning("Key `{$key}` not found to get document link.");
        }

        return $pageLink ?: self::DEFAULT_URL;
    }
}
