<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class FindEntitiesClassesByCollectionClassName implements CustomFunctionInterface
{
    public function __construct(private RootEntityCollectionsGroup $rootEntityCollectionsGroup)
    {
    }

    /**
     * @return ClassLikeEntity[]
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(string $collectionName): array
    {
        $entityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);

        /**
         * @var ClassLikeEntity $findCollectionEntity
         */
        $findCollectionEntity = $entityCollection->findEntity($collectionName);
        $addMethodEntity = $findCollectionEntity->getMethodEntity('add');
        if (!$addMethodEntity) {
            return [];
        }
        $firstParam = $addMethodEntity->getParameters()[0];
        /**
         * @var ClassLikeEntity $firstParamEntity
         */
        $firstParamEntity = $entityCollection->findEntity($firstParam['type']);

        if ($firstParamEntity->isInterface()) {
            return iterator_to_array($entityCollection->filterByInterfaces([$firstParamEntity->getName()]));
        } elseif ($firstParamEntity->isInstantiable()) {
            return [$firstParamEntity];
        }
        return iterator_to_array($entityCollection->filterByParentClassNames([$firstParamEntity->getName()]));
    }

    public static function getName(): string
    {
        return 'findEntitiesClassesByCollectionClassName';
    }

    public static function getOptions(): array
    {
        return [];
    }
}
