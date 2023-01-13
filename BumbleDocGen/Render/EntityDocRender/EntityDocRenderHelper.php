<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

final class EntityDocRenderHelper
{
    public const CLASS_ENTITY_SHORT_LINK_OPTION = 'short_form';
    public const CLASS_ENTITY_FULL_LINK_OPTION = 'full_form';
    public const CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION = 'only_cursor';

    public static function getEntityUrlData(
        string  $linkString,
        Context $context,
        ?string $defaultEntityClassName = null,
        bool    $createDocument = true,
    ): array
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
            !$entity && $needToUseDefaultEntity && $defaultEntityClassName &&
            $defaultEntity = $classEntityCollection->getEntityByClassName($defaultEntityClassName)
        ) {
            $cursorTmpName = str_replace(['$', '(', ')'], '', $className);
            if (
                $defaultEntity->getReflection()->hasMethod($cursorTmpName) ||
                $defaultEntity->getReflection()->hasProperty($cursorTmpName) ||
                $defaultEntity->getReflection()->hasConstant($cursorTmpName)
            ) {
                $classData[1] = $cursorTmpName;
                $entity = $defaultEntity;
            }
        }

        $reflector = $context->getClassEntityCollection()->getReflector();
        if (!$entity && ParserHelper::isClassLoaded($reflector, $className)) {
            $reflectionClass = $reflector->reflectClass($className);
            $attributeParser = new AttributeParser(
                $reflector, $context->getClassEntityCollection()->getLogger()
            );
            $entity = ClassEntity::createByReflection(
                $context->getConfiguration(),
                $reflector,
                $reflectionClass,
                $attributeParser
            );
        }

        if ($entity) {
            $cursor = '';
            if (isset($classData[1])) {
                $cursorTarget = str_replace(['$', '(', ')'], '', $classData[1]);
                if (
                    str_ends_with($classData[1], '()') || $entity->getReflection()->hasMethod($cursorTarget)
                ) {
                    $cursor = 'm' . str_replace('()', '', $classData[1]);
                } elseif (
                    str_starts_with($classData[1], '$') || $entity->getReflection()->hasProperty($classData[1])
                ) {
                    $cursor = 'p' . str_replace('$', '', $classData[1]);
                } elseif ($entity->getReflection()->hasConstant($classData[1])) {
                    $cursor = 'q' . $classData[1];
                }
            }

            $getDocumentedClassUrl = new GetDocumentedClassUrl($context);

            if (in_array(self::CLASS_ENTITY_SHORT_LINK_OPTION, $linkOptions)) {
                $linkString = $entity->getShortName() . (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_FULL_LINK_OPTION, $linkOptions)) {
                $linkString = $entity->getName() . (isset($classData[1]) ? "::{$classData[1]}" : '');
            } elseif (in_array(self::CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION, $linkOptions) && isset($classData[1])) {
                $linkString = $classData[1];
            }

            $url = $getDocumentedClassUrl($entity->getName(), $cursor, $createDocument);
            return [
                'url' => $url,
                'title' => $linkString,
            ];
        }
        return [
            'url' => null,
            'title' => $linkString,
        ];
    }
}
