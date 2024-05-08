<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\RendererHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use Monolog\Logger;

/**
 * The filter converts the string with the data type into a link to the documented entity, if possible.
 *
 * @note This filter initiates the creation of documents for the displayed entities
 * @see GetDocumentedEntityUrl
 */
final class StrTypeToUrl implements CustomFilterInterface
{
    public function __construct(
        private readonly RendererHelper $rendererHelper,
        private readonly GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private readonly Logger $logger
    ) {
    }

    public static function getName(): string
    {
        return 'strTypeToUrl';
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
     * @param string $text Processed text
     * @param RootEntityCollection $rootEntityCollection
     * @param bool $useShortLinkVersion Shorten or not the link name. When shortening, only the shortName of the entity will be shown
     * @param bool $createDocument
     *  If true, creates an entity document. Otherwise, just gives a reference to the entity code
     * @param string $separator Separator between types
     *
     * @return string
     */
    public function __invoke(
        array $context,
        string $text,
        RootEntityCollection $rootEntityCollection,
        bool $useShortLinkVersion = false,
        bool $createDocument = false,
        string $separator = ' | '
    ): string {
        $getDocumentedEntityUrlFunction = $this->getDocumentedEntityUrlFunction;

        $preparedTypes = [];
        $types = explode('|', $text);
        foreach ($types as $type) {
            $name = $type;
            $data = explode('::', $type);
            $type = $data[0];
            $cursor = $data[1] ?? '';
            $preloadResourceLink = $this->rendererHelper->getPreloadResourceLink($type);
            if ($preloadResourceLink) {
                if ($useShortLinkVersion) {
                    $type = array_reverse(explode('\\', $type))[0];
                }
                $preparedTypes[] = "[{$type}]({$preloadResourceLink})";
                continue;
            }
            try {
                $entityOfLink = $rootEntityCollection->getLoadedOrCreateNew($type);
                if (!$entityOfLink->isExternalLibraryEntity() && $entityOfLink->isEntityDataCanBeLoaded()) {
                    if ($entityOfLink->getAbsoluteFileName()) {
                        $link = $getDocumentedEntityUrlFunction($context, $rootEntityCollection, $type, $cursor, $createDocument);

                        if ($useShortLinkVersion) {
                            $type = $entityOfLink->getShortName();
                        } else {
                            $type = "\\{$entityOfLink->getName()}";
                        }

                        if ($link && $link !== '#') {
                            $preparedTypes[] = "[$name]({$link})";
                        } else {
                            $preparedTypes[] = $type;
                        }
                    }
                } else {
                    if ($entityOfLink::isEntityNameValid($type)) {
                        $this->logger->warning(
                            "StrTypeToUrl: Entity {$type} not found in specified sources"
                        );
                    }
                    $preparedTypes[] = $type;
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
                $preparedTypes[] = $type;
            }
        }

        return implode($separator, $preparedTypes);
    }
}
