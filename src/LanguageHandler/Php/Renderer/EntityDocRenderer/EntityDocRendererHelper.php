<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;

final class EntityDocRendererHelper
{
    public const CLASS_ENTITY_SHORT_LINK_OPTION = 'short_form';
    public const CLASS_ENTITY_FULL_LINK_OPTION = 'full_form';
    public const CLASS_ENTITY_ONLY_CURSOR_LINK_OPTION = 'only_cursor';

    public function __construct(
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityDataByLink(
        string $linkString,
        RootEntityCollection $rootEntityCollection,
        ?string $defaultEntityName = null,
        bool $useUnsafeKeys = true
    ): array {
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
            if (!$defaultEntity->isEntityDataCanBeLoaded()) {
                $entity = $defaultEntity;
                $classData[1] = '';
            } elseif (
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
            if ($nextEntity->isEntityDataCanBeLoaded() && $nextEntity->isDocumentCreationAllowed()) {
                $entity = $nextEntity;
            }
        }

        if ($entity && $entity->isEntityDataCanBeLoaded()) {
            $cursor = '';
            if ($classData[1] ?? null) {
                $cursorTarget = str_replace(['$', '(', ')'], '', $classData[1]);
                if ($entity->hasMethod($cursorTarget)) {
                    $cursor = "{$cursorTarget}()";
                } elseif ($entity->hasProperty($cursorTarget)) {
                    $cursor = "\${$cursorTarget}";
                } elseif ($entity->hasConstant($cursorTarget)) {
                    $cursor = $cursorTarget;
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityUrlDataByLink(
        string $linkString,
        ?string $defaultEntityClassName = null,
        bool $createDocument = true
    ): array {
        $entityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);
        $data = self::getEntityDataByLink($linkString, $entityCollection, $defaultEntityClassName);
        if ($data['entityName'] ?? null) {
            $data['url'] = call_user_func_array(
                $this->getDocumentedEntityUrlFunction,
                [
                    $entityCollection,
                    $data['entityName'],
                    $data['cursor'],
                    $createDocument
                ]
            );
        }
        return $data;
    }
}
