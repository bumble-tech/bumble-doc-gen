<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

final class EntityDocRenderHelper
{
    public const CLASS_ENTITY_SHORT_LINK_OPTION = 'short_form';
    public const CLASS_ENTITY_FULL_LINK_OPTION = 'full_form';
    public const CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION = 'only_cursor';

    public static function getEntityUrlData(string $linkString, Context $context): array
    {
        static $pageLinksCache = [];

        $classEntityCollection = $context->getClassEntityCollection();
        $entitiesCount = count(iterator_to_array($classEntityCollection));
        $cacheKey = $entitiesCount . spl_object_id($classEntityCollection);

        if (!isset($pageLinksCache[$cacheKey])) {
            $pageLinks = [];
            foreach ($context->getClassEntityCollection() as $classEntity) {
                /**@var ClassEntity $classEntity */
                $pageLinks[$classEntity->getShortName()] = $classEntity;
                $pageLinks[$classEntity->getFileName()] = $classEntity;
                $pageLinks[$classEntity->getName()] = $classEntity;
            }
            $pageLinksCache[$cacheKey] = $pageLinks;
        } else {
            $pageLinks = $pageLinksCache[$cacheKey];
        }

        $explodedLinkString = explode('|', $linkString);
        $linkString = array_shift($explodedLinkString);

        $linkOptions = $explodedLinkString;

        if (str_contains($linkString, '->')) {
            $classData = explode('->', $linkString);
        } else {
            $classData = explode('::', $linkString);
        }
        $className = $classData[0];

        if (isset($pageLinks[$className])) {
            $cursor = '';
            if (isset($classData[1])) {
                if (str_ends_with($classData[1], '()')) {
                    $cursor = 'm' . str_replace('()', '', $classData[1]);
                } elseif (str_starts_with($classData[1], '$')) {
                    $cursor = 'p' . str_replace('$', '', $classData[1]);
                } else {
                    $cursor = 'q' . $classData[1];
                }
            }

            $getDocumentedClassUrl = new GetDocumentedClassUrl($context);

            if (in_array(self::CLASS_ENTITY_SHORT_LINK_OPTION, $linkOptions)) {
                $linkString = $pageLinks[$className]->getShortName() .
                    (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_FULL_LINK_OPTION, $linkOptions)) {
                $linkString = $pageLinks[$className]->getName() . (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION, $linkOptions) && isset($classData[1])) {
                $linkString = $classData[1];
            }

            $url = $getDocumentedClassUrl($pageLinks[$className]->getName(), $cursor);

            return [
                'url' => $url,
                'title' => $linkString,
            ];
        }
        return [
            'url' => null,
            'title' => $className,
        ];
    }
}
