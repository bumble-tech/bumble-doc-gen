<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\RenderHelper;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

/**
 * The filter converts the string with the data type into a link to the documented class, if possible.
 *
 * @note This filter initiates the creation of documents for the displayed classes
 * @see GetDocumentedClassUrl
 */
final class StrTypeToUrl
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

    /**
     * @param string $text Processed text
     * @param string $templateType Display format. rst or html
     * @param bool $useShortLinkVersion Shorten or not the link name. When shortening, only the shortName of the class will be shown
     * @param bool $createDocument
     *  If true, creates a class document. Otherwise, just gives a reference to the class code
     *
     * @return string
     */
    public function __invoke(
        string $text,
        string $templateType = self::TEMPLATE_TYPE_FROM_CONTEXT,
        bool   $useShortLinkVersion = false,
        bool   $createDocument = false
    ): string
    {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);

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

            $entityClassOfLink = $this->context->getClassEntityCollection()->getLoadedOrCreateNew($type);
            if ($entityClassOfLink->entityDataCanBeLoaded()) {
                if ($entityClassOfLink->getAbsoluteFileName()) {
                    $link = $getDocumentedClassUrlFunction($type, '', $createDocument);

                    if ($useShortLinkVersion) {
                        $type = $entityClassOfLink->getShortName();
                    } else {
                        $type = "\\{$entityClassOfLink->getName()}";
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
                if (ParserHelper::isCorrectClassName($type)) {
                    $this->context->getConfiguration()->getLogger()->warning(
                        "StrTypeToUrl: Class {$type} not found in specified sources"
                    );
                }
                $preparedTypes[] = $type;
            }
        }

        return implode(' | ', $preparedTypes);
    }
}
