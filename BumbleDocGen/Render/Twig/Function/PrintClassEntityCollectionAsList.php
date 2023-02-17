<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\HtmlToRst;

/**
 * Outputting entity data as HTML or rst list
 */
final class PrintClassEntityCollectionAsList
{
    public function __construct(private Context $context)
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
        string                $type = 'ul',
        bool                  $skipDescription = false
    ): string
    {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);
        $result = "<{$type}>";
        foreach ($classEntityCollection as $classEntity) {
            $description = $classEntity->getDescription();
            $descriptionText = !$skipDescription && $description ? " - {$description}" : '';
            $result .= "<li><a href='{$getDocumentedClassUrlFunction($classEntity->getName())}'>{$classEntity->getShortName()}</a>{$descriptionText}</li>";
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
