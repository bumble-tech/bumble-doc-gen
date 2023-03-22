<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Filter;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\RenderHelper;
use BumbleDocGen\Core\Render\Twig\Function\GetDocumentedEntityUrl;

/**
 * The filter converts the string with the data type into a link to the documented class, if possible.
 *
 * @note This filter initiates the creation of documents for the displayed classes
 * @see GetDocumentedEntityUrl
 */
final class StrTypeToUrl implements CustomFilterInterface
{
    public const TEMPLATE_TYPE_FROM_CONTEXT = 'context';
    public const TEMPLATE_TYPE_HTML = 'html';
    public const TEMPLATE_TYPE_RST = 'rst';

    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
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
     * @param string $templateType Display format. rst or html
     * @param bool $useShortLinkVersion Shorten or not the link name. When shortening, only the shortName of the class will be shown
     * @param bool $createDocument
     *  If true, creates a class document. Otherwise, just gives a reference to the class code
     *
     * @return string
     */
    public function __invoke(
        string $text,
        RootEntityCollection $rootEntityCollection,
        string $templateType = self::TEMPLATE_TYPE_FROM_CONTEXT,
        bool   $useShortLinkVersion = false,
        bool   $createDocument = false
    ): string
    {
        $getDocumentedEntityUrlFunction = new GetDocumentedEntityUrl($this->context);

        $preparedTypes = [];
        $types = explode('|', $text);
        foreach ($types as $type) {
            $preloadResourceLink = RenderHelper::getPreloadResourceLink($type, $this->context);
            if ($preloadResourceLink) {
                if ($templateType == self::TEMPLATE_TYPE_RST) {
                    $preparedTypes[] = "`{$type} <{$preloadResourceLink}>`_";
                } else {
                    $preparedTypes[] = "<a href='{$preloadResourceLink}'>{$type}</a>";
                }
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

                    if ($templateType == self::TEMPLATE_TYPE_FROM_CONTEXT) {
                        $templateType = $this->context->isCurrentTemplateRst() ? self::TEMPLATE_TYPE_RST : self::TEMPLATE_TYPE_HTML;
                    }

                    if ($templateType == self::TEMPLATE_TYPE_RST) {
                        $preparedTypes[] = "`{$type} <{$link}>`_";
                    } else {
                        $preparedTypes[] = "<a href='{$link}'>{$type}</a>";
                    }
                }
            } else {
                if ($entityOfLink::isEntityNameValid($type)) {
                    $this->context->getConfiguration()->getLogger()->warning(
                        "StrTypeToUrl: Entity {$type} not found in specified sources"
                    );
                }
                $preparedTypes[] = $type;
            }
        }

        return implode(' | ', $preparedTypes);
    }
}
