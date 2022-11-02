<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\CorePlugin\PageLinker;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Plugin\Event\Render\BeforeCreatingDocFile;
use BumbleDocGen\Plugin\PluginInterface;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;
use Psr\Log\LoggerInterface;

abstract class BasePageLinker implements PluginInterface
{
    private array $keyUsageCount = [];

    /**
     * Template to search for empty links
     *
     * @example /(`)([^<>\n]+?)(`_)/m
     */
    abstract function getLinkRegEx(): string;

    /**
     * Group number of the regular expression that contains the text that will be used to search for the link
     */
    abstract function getGroupRegExNumber(): int;

    /**
     * Template of the result of processing an empty link by a plugin.
     * Keys %title% and %url% will be replaced with real data
     *
     * @example `%title% <%url%>`_
     */
    abstract function getOutputTemplate(): string;

    public function __construct(private LoggerInterface $logger)
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeCreatingDocFile::class => 'beforeCreatingDocFile',
        ];
    }

    final public function beforeCreatingDocFile(BeforeCreatingDocFile $event): void
    {
        $context = $event->getContext();
        $pageLinks = $this->getAllPageLinks($context);

        $content = preg_replace_callback(
            $this->getLinkRegEx(),
            function (array $matches) use ($pageLinks, $context) {
                $linkString = $matches[$this->getGroupRegExNumber()];
                if (array_key_exists($linkString, $pageLinks)) {
                    $breadcrumb = $pageLinks[$linkString];
                    $this->checkKey($linkString, $this->logger);
                    return $this->getFilledOutputTemplate($breadcrumb['title'], $breadcrumb['url']);
                } else {
                    $entityUrlData = $this->getEntityUrlData($linkString, $context);
                    if ($entityUrlData) {
                        return $this->getFilledOutputTemplate($entityUrlData['title'], $entityUrlData['url']);
                    }
                }

                $this->logger->warning("PageLinkerPlugin: Key `{$linkString}` not found to get document link.");
                return $linkString;
            },
            $event->getContent()
        );

        $event->setContent($content);
    }

    private function getAllPageLinks(Context $context): array
    {
        static $pageLinks = null;
        if (is_null($pageLinks)) {
            $pageLinks = [];
            $templatesDir = $context->getConfiguration()->getTemplatesDir();
            $breadcrumbsHelper = $context->getBreadcrumbsHelper();

            $addLinkKey = function (string $key, array $breadcrumb) use (&$pageLinks) {
                $this->keyUsageCount[$key] ??= 0;
                ++$this->keyUsageCount[$key];
                $pageLinks[$key] = $breadcrumb;
            };

            /**@var \SplFileInfo[] $allFiles */
            $allFiles = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    $templatesDir, \FilesystemIterator::SKIP_DOTS
                )
            );
            foreach ($allFiles as $file) {
                $filePatch = str_replace($templatesDir, '', $file->getRealPath());
                if (!str_ends_with($filePatch, '.twig')) {
                    continue;
                }
                foreach ($breadcrumbsHelper->getBreadcrumbs($filePatch) as $breadcrumb) {
                    $addLinkKey($breadcrumb['url'], $breadcrumb);
                    $addLinkKey($breadcrumb['title'], $breadcrumb);
                    $linkKey = $breadcrumbsHelper->getTemplateLinkKey($filePatch);
                    if ($linkKey) {
                        $addLinkKey($linkKey, $breadcrumb);
                    }
                }
            }
        }
        return $pageLinks;
    }

    private function getEntityUrlData(string $linkString, Context $context): ?array
    {
        static $pageLinks = null;
        if (is_null($pageLinks)) {
            $pageLinks = [];
            foreach ($context->getClassEntityCollection() as $classEntity) {
                /**@var ClassEntity $classEntity */
                $pageLinks[$classEntity->getShortName()] = $classEntity;
                $this->keyUsageCount[$classEntity->getShortName()] ??= 0;
                ++$this->keyUsageCount[$classEntity->getShortName()];

                $pageLinks[$classEntity->getFileName()] = $classEntity;
                $this->keyUsageCount[$classEntity->getFileName()] ??= 0;
                ++$this->keyUsageCount[$classEntity->getFileName()];

                $pageLinks[$classEntity->getName()] = $classEntity;
                $this->keyUsageCount[$classEntity->getName()] ??= 0;
                ++$this->keyUsageCount[$classEntity->getName()];
            }
        }

        $classData = explode('::', $linkString);
        $className = $classData[0];

        if (isset($pageLinks[$className])) {
            $this->checkKey($className, $context->getConfiguration()->getLogger());

            $cursor = '';
            if (isset($classData[1])) {
                if (str_ends_with($classData[1], '()')) {
                    $cursor = 'm' . str_replace('()', '', $classData[1]);
                } elseif (str_starts_with($classData[1], '$')) {
                    $cursor = 'p' . str_replace('$', '', $classData[1]);
                } else {
                    $cursor = 'c' . $classData[1];
                }
            }

            $getDocumentedClassUrl = new GetDocumentedClassUrl($context);
            $url = $getDocumentedClassUrl($pageLinks[$className]->getName(), $cursor);

            return [
                'url' => $url,
                'title' => $linkString,
            ];
        }
        return null;
    }

    private function checkKey(string $key, LoggerInterface $logger): void
    {
        if (($this->keyUsageCount[$key] ?? 0) > 1) {
            $logger->warning(
                "PageLinkerPlugin: Key `{$key}` refers to multiple templates ({$this->keyUsageCount[$key]}). Use a unique link key to avoid mistakes"
            );
        }
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
