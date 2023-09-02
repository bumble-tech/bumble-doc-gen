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
    /**
     * Template to search for empty links
     *
     * @example /(`)([^<>\n]+?)(`_)/m
     */
    abstract protected function getLinkRegEx(): string;

    /**
     * Group number of the regular expression that contains the text that will be used to search for the link
     */
    abstract protected function getGroupRegExNumber(): int;

    /**
     * Template of the result of processing an empty link by a plugin.
     * Keys %title% and %url% will be replaced with real data
     *
     * @example `%title% <%url%>`_
     */
    abstract protected function getOutputTemplate(): string;

    public function __construct(
        private BreadcrumbsHelper $breadcrumbsHelper,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private LoggerInterface $logger,
    ) {
    }

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
                $linkString = $matches[$this->getGroupRegExNumber()];
                $pageData = $this->breadcrumbsHelper->getPageDataByKey($linkString);
                if ($pageData) {
                    return $this->getFilledOutputTemplate($pageData['title'], $pageData['url']);
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
                            return $this->getFilledOutputTemplate($entityUrlData['title'], $entityUrlData['url']);
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
