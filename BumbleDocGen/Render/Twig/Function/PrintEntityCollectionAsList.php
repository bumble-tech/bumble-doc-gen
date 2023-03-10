<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;

/**
 * Outputting entity data as HTML or rst list
 */
final class PrintEntityCollectionAsList implements CustomFunctionInterface
{
    public function __construct(private Context $context)
    {
    }

    public static function getName(): string
    {
        return 'printEntityCollectionAsList';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param RootEntityCollection $rootEntityCollection Processed entity collection
     * @param string $type List tag type
     * @param bool $skipDescription Don't print description
     * @return string
     */
    public function __invoke(
        RootEntityCollection $rootEntityCollection,
        string                $type = 'ul',
        bool                  $skipDescription = false
    ): string
    {
        $getDocumentedEntityUrlFunction = new GetDocumentedEntityUrl($this->context);
        $result = "<{$type}>";
        foreach ($rootEntityCollection as $entity) {
            $description = $entity->getDescription();
            $descriptionText = !$skipDescription && $description ? " - {$description}" : '';
            $result .= "<li><a href='{$getDocumentedEntityUrlFunction($entity->getName())}'>{$entity->getShortName()}</a>{$descriptionText}</li>";
        }
        $result .= "</{$type}>";

        $result = "<embed> {$result} </embed>";
        if ($this->context->isCurrentTemplateRst()) {
            $htmlToRstFunction = new HtmlToRst();
            return $htmlToRstFunction($result);
        }
        return $result;
    }
}
