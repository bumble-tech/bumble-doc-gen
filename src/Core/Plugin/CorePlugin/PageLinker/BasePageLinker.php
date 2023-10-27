<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\PageLinker;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;

abstract class BasePageLinker implements PluginInterface
{
    public function __construct(
        private BreadcrumbsHelper $breadcrumbsHelper,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * Template to search for empty links
     *
     * @example /(`)([^<>\n]+?)(`_)/m
     * @example  /(<a(?![^>]*\bhref\b)[^>]*>)(.*?)(<\/a>)/m
     */
    abstract protected function getLinkRegEx(): string;

    /**
     * Method for getting a URL from a link found using a regular expression
     *
     * @param string $match Link found using regular expression
     * @return string $url
     */
    abstract protected function getUrlFromMatch(string $match): string;

    /**
     * Get custom link title
     *
     * @param string $match Link found using regular expression
     * @return string $title
     */
    abstract protected function getCustomTitleFromMatch(string $match): string;

    /**
     * Template of the result of processing an empty link by a plugin.
     * Keys %title% and %url% will be replaced with real data
     *
     * @example `%title% <%url%>`_
     */
    abstract protected function getOutputTemplate(): string;

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeCreatingDocFile::class => 'beforeCreatingDocFile',
        ];
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    final public function beforeCreatingDocFile(BeforeCreatingDocFile $event): void
    {
        $content = preg_replace_callback(
            $this->getLinkRegEx(),
            function (array $matches) {
                $match = $matches[0] ?? '';
                $linkString = $this->getUrlFromMatch($match);
                $pageData = $this->breadcrumbsHelper->getPageDataByKey($linkString);
                if ($pageData) {
                    return $this->getFilledOutputTemplate(
                        $this->getCustomTitleFromMatch($match) ?: $pageData['title'],
                        $pageData['url']
                    );
                } else {
                    foreach ($this->rootEntityCollectionsGroup as $rootEntityCollection) {
                        $entityUrlData = $rootEntityCollection->getEntityLinkData($linkString);
                        if ($entityUrlData['entityName'] ?? null) {
                            $getDocumentedEntityUrl = $this->getDocumentedEntityUrlFunction;
                            $entityUrlData['url'] = $getDocumentedEntityUrl(
                                $rootEntityCollection,
                                $entityUrlData['entityName'],
                                $entityUrlData['cursor']
                            );
                            return $this->getFilledOutputTemplate(
                                $this->getCustomTitleFromMatch($match) ?: $entityUrlData['title'],
                                $entityUrlData['url']
                            );
                        }
                    }
                }

                $this->logger->warning("PageLinkerPlugin: Key `{$linkString}` not found to get document link.");
                return $linkString;
            },
            $event->getContent()
        );

        $event->setContent($content);
    }

    protected function getFilledOutputTemplate(string $title, string $url): string
    {
        return str_replace(
            ['%title%', '%url%'],
            [$title, $url],
            $this->getOutputTemplate()
        );
    }
}
