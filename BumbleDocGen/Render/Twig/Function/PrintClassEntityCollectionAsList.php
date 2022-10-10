<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;

/**
 * Outputting entity data as HTML or rst list
 */
final class PrintClassEntityCollectionAsList
{
    public function __construct(private Context $context, private string $templateType = 'rst')
    {
    }

    /**
     * @param ClassEntityCollection $classEntityCollection Processed entity collection
     * @param string $type List tag type
     * @param bool $skipDescription Don't print description
     * @return string
     */
    public function __invoke(
        ClassEntityCollection $classEntityCollection,
        string $type = 'ul',
        bool $skipDescription = false
    ): string {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);
        $result = "<{$type}>";
        foreach ($classEntityCollection as $classEntity) {
            $description = $classEntity->getDescription();
            $descriptionText = !$skipDescription && $description ? " - {$description}" : '';
            $result .= "<li><a href='{$getDocumentedClassUrlFunction($classEntity->getName())}'>{$classEntity->getShortName()}</a>{$descriptionText}</li>";
        }
        $result .= "</{$type}>";

        if ($this->templateType == 'rst') {
            $htmlToRstFunction = new HtmlToRst();
            return $htmlToRstFunction($result);
        }
        return $result;
    }
}
