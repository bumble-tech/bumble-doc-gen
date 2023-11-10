<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class FindEntitiesClassesByCollectionClassName implements CustomFunctionInterface
{
    public function __construct(private RootEntityCollectionsGroup $rootEntityCollectionsGroup)
    {
    }

    /**
     * @return ClassEntity[]
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(string $collectionName): array
    {
        $classEntityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);

        /**
         * @var ClassEntity $findCollectionEntity
         */
        $findCollectionEntity = $classEntityCollection->findEntity($collectionName);
        $addMethodEntity = $findCollectionEntity->getMethodEntity('add');
        $firstParam = $addMethodEntity->getParameters()[0];
        /**
         * @var ClassEntity $firstParamEntity
         */
        $firstParamEntity = $classEntityCollection->findEntity($firstParam['type']);

        if ($firstParamEntity->isInterface()) {
            return iterator_to_array($classEntityCollection->filterByInterfaces([$firstParamEntity->getName()]));
        } elseif ($firstParamEntity->isInstantiable()) {
            return [$firstParamEntity];
        }
        return iterator_to_array($classEntityCollection->filterByParentClassNames([$firstParamEntity->getName()]));
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
