<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Filter;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\RenderHelper;
use BumbleDocGen\Core\Render\Twig\Function\GetDocumentedEntityUrl;
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
        private Context                $context,
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private Logger                 $logger
    )
    {
    }

    public static function getName(): string
    {
        return 'strTypeToUrl';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $text Processed text
     * @param RootEntityCollection $rootEntityCollection
     * @param bool $useShortLinkVersion Shorten or not the link name. When shortening, only the shortName of the entity will be shown
     * @param bool $createDocument
     *  If true, creates an entity document. Otherwise, just gives a reference to the entity code
     *
     * @return string
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        string               $text,
        RootEntityCollection $rootEntityCollection,
        bool                 $useShortLinkVersion = false,
        bool                 $createDocument = false
    ): string
    {
        $getDocumentedEntityUrlFunction = $this->getDocumentedEntityUrlFunction;

        $preparedTypes = [];
        $types = explode('|', $text);
        foreach ($types as $type) {
            $preloadResourceLink = RenderHelper::getPreloadResourceLink($type, $this->context);
            if ($preloadResourceLink) {
                $preparedTypes[] = "<a href='{$preloadResourceLink}'>{$type}</a>";
                continue;
            }

            $entityOfLink = $rootEntityCollection->getLoadedOrCreateNew($type);
            if ($entityOfLink->entityDataCanBeLoaded()) {
                if ($entityOfLink->getAbsoluteFileName()) {
                    $link = $getDocumentedEntityUrlFunction($rootEntityCollection, $type, '', $createDocument);

                    if ($useShortLinkVersion) {
                        $type = $entityOfLink->getShortName();
                    } else {
                        $type = "\\{$entityOfLink->getName()}";
                    }
                    $preparedTypes[] = "<a href='{$link}'>{$type}</a>";
                }
            } else {
                if ($entityOfLink::isEntityNameValid($type)) {
                    $this->logger->warning(
                        "StrTypeToUrl: Entity {$type} not found in specified sources"
                    );
                }
                $preparedTypes[] = $type;
            }
        }

        return implode(' | ', $preparedTypes);
    }
}
