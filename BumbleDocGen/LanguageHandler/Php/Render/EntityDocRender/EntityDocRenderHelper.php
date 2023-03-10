<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedEntityUrl;

final class EntityDocRenderHelper
{
    public const CLASS_ENTITY_SHORT_LINK_OPTION = 'short_form';
    public const CLASS_ENTITY_FULL_LINK_OPTION = 'full_form';
    public const CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION = 'only_cursor';

    public static function getEntityDataByLink(
        string               $linkString,
        RootEntityCollection $rootEntityCollection,
        ?string              $defaultEntityName = null,
        bool                 $useUnsafeKeys = true
    ): array
    {
        if (!is_a($rootEntityCollection, ClassEntityCollection::class)) {
            return [];
        }

        $explodedLinkString = explode('|', $linkString);
        $linkString = array_shift($explodedLinkString);
        $linkOptions = $explodedLinkString;

        $entity = $rootEntityCollection->findEntity($linkString, $useUnsafeKeys);

        if (str_contains($linkString, '->')) {
            $classData = explode('->', $linkString);
        } else {
            $classData = explode('::', $linkString);
        }
        $className = ltrim($classData[0], '\\');

        $needToUseDefaultEntity = !$entity && $defaultEntityName && !isset($classData[1]);
        if ($needToUseDefaultEntity) {
            $defaultEntity = $rootEntityCollection->getLoadedOrCreateNew($defaultEntityName);
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
            $nextEntity = $rootEntityCollection->getLoadedOrCreateNew($className);
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
                    $cursor = $classData[1];
                } elseif (
                    str_starts_with($classData[1], '$') || $entity->hasProperty($cursorTarget)
                ) {
                    $cursor = $classData[1];
                } elseif ($entity->hasConstant($classData[1])) {
                    $cursor = $classData[1];
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
        $data = self::getEntityDataByLink($linkString, $context->getRootEntityCollection(), $defaultEntityClassName);
        if ($data['entityName'] ?? null) {
            $getDocumentedEntityUrl = new GetDocumentedEntityUrl($context);
            $data['url'] = $getDocumentedEntityUrl($data['entityName'], $data['cursor'], $createDocument);
        }
        return $data;
    }
}
