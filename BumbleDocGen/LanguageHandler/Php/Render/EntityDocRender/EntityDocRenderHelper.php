<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

final class EntityDocRenderHelper
{
    public const CLASS_ENTITY_SHORT_LINK_OPTION = 'short_form';
    public const CLASS_ENTITY_FULL_LINK_OPTION = 'full_form';
    public const CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION = 'only_cursor';

    public static function getEntityDataByLink(
        string  $linkString,
        Context $context,
        ?string $defaultEntityClassName = null,
        bool    $useUnsafeShortNames = true
    ): array
    {
        static $pageLinksCache = [];

        $classEntityCollection = $context->getClassEntityCollection();
        $entitiesCount = count(iterator_to_array($classEntityCollection));
        $cacheKey = $entitiesCount . spl_object_id($classEntityCollection);

        if (!isset($pageLinksCache[$cacheKey])) {
            $pageLinks = [];
            $unsafeLinks = [];
            foreach ($context->getClassEntityCollection() as $classEntity) {
                /**@var ClassEntity $classEntity */
                $pageLinks[$classEntity->getShortName()] = $classEntity;
                if (array_key_exists($classEntity->getShortName(), $pageLinks) && !$useUnsafeShortNames) {
                    $unsafeLinks[$classEntity->getShortName()] = $classEntity->getShortName();
                }
                $pageLinks[$classEntity->getFileName()] = $classEntity;
                $pageLinks[$classEntity->getName()] = $classEntity;
            }
            foreach ($unsafeLinks as $unsafeLink) {
                unset($pageLinks[$unsafeLink]);
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
        $className = ltrim($classData[0], '\\');

        $entity = $pageLinks[$className] ?? null;

        $needToUseDefaultEntity = !$entity || in_array($classData[0], [
                'self',
                'static',
                'parent',
                '$this',
                'this',
            ]) || !isset($classData[1]);

        if (
            !$entity && $needToUseDefaultEntity && $defaultEntityClassName
        ) {
            $defaultEntity = $classEntityCollection->getLoadedOrCreateNew($defaultEntityClassName);
            $cursorTmpName = str_replace(['$', '(', ')'], '', $className);
            if (
                $defaultEntity->hasMethod($cursorTmpName) ||
                $defaultEntity->hasProperty($cursorTmpName) ||
                $defaultEntity->hasConstant($cursorTmpName)
            ) {
                $classData[1] = $cursorTmpName;
                $entity = $defaultEntity;
            }
        }

        if (!$entity) {
            $nextEntity = $classEntityCollection->getLoadedOrCreateNew($className);
            if ($nextEntity->entityDataCanBeLoaded() && $nextEntity->isInGit()) {
                $entity = $nextEntity;
            }
        }

        if ($entity) {
            $cursor = '';
            if (isset($classData[1])) {
                $cursorTarget = str_replace(['$', '(', ')'], '', $classData[1]);
                if (
                    str_ends_with($classData[1], '()') || $entity->hasMethod($cursorTarget)
                ) {
                    $cursor = 'm' . str_replace('()', '', $classData[1]);
                } elseif (
                    str_starts_with($classData[1], '$') || $entity->hasProperty($classData[1])
                ) {
                    $cursor = 'p' . str_replace('$', '', $classData[1]);
                } elseif ($entity->hasConstant($classData[1])) {
                    $cursor = 'q' . $classData[1];
                }
            }
            if (in_array(self::CLASS_ENTITY_SHORT_LINK_OPTION, $linkOptions)) {
                $linkString = $entity->getShortName() . (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_FULL_LINK_OPTION, $linkOptions)) {
                $linkString = $entity->getName() . (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION, $linkOptions) && isset($classData[1])) {
                $linkString = $classData[1];
            }
            return [
                'entityName' => $entity->getName(),
                'cursor' => $cursor,
                'title' => $linkString,
            ];
        }
        return [
            'entityName' => null,
            'cursor' => null,
            'title' => $linkString,
        ];
    }

    public static function getEntityUrlDataByLink(
        string  $linkString,
        Context $context,
        ?string $defaultEntityClassName = null,
        bool    $createDocument = true
    ): array
    {
        $data = self::getEntityDataByLink($linkString, $context, $defaultEntityClassName);
        if ($data['entityName'] ?? null) {
            $getDocumentedClassUrl = new GetDocumentedClassUrl($context);
            $data['url'] = $getDocumentedClassUrl($data['entityName'], $data['cursor'], $createDocument);
        }
        return $data;
    }
}
