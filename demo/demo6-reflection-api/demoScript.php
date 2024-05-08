#!/usr/bin/env php
<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../../vendor/autoload.php';

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntityInterface;
use BumbleDocGen\LanguageHandler\Php\PhpReflectionApiConfig;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use BumbleDocGen\Core\Parser\SourceLocator\RecursiveDirectoriesSourceLocator;
use BumbleDocGen\Core\Parser\SourceLocator\DirectoriesSourceLocator;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\FileTextContainsCondition;
use BumbleDocGen\Core\Parser\ProjectParser;

try {
    $reflectionApiConfig = PhpReflectionApiConfig::create();

    /** @var PhpEntitiesCollection $entitiesCollection*/
    $entitiesCollection = (new \BumbleDocGen\DocGeneratorFactory())->createRootEntitiesCollection($reflectionApiConfig);

    // Initially, the data in the collection is not loaded
    assert(0 === count(iterator_to_array($entitiesCollection)));

    // The get method will not return the entity because the collection is still empty
    $filename = $entitiesCollection->get(ProjectParser::class)?->getAbsoluteFileName();
    assert(is_null($filename));

    // But there is a special method that can load an entity according to psr4/psr0 from the project’s composer configuration file
    $filename = $entitiesCollection->getLoadedOrCreateNew(ProjectParser::class)?->getAbsoluteFileName();
    assert(!is_null($filename));

    $sourceLocators = SourceLocatorsCollection::create(
        new RecursiveDirectoriesSourceLocator([dirname(__DIR__, 2) . '/src']),
        new DirectoriesSourceLocator([__DIR__])
    );

    // We can populate the collection with data
    $entitiesCollection->loadEntities(
        $sourceLocators, // Source locators are needed so that we can determine all the files that will be traversed to fill the collection with data
        new FileTextContainsCondition('class ProjectParser') // We can define special filters according to which entities will be loaded
    );

    // According to the specified resource locators and filters, only 1 entity was found
    assert(1 === count(iterator_to_array($entitiesCollection)));

    // Now this entity is found using the get method
    $filename = $entitiesCollection->get(ProjectParser::class)?->getAbsoluteFileName();
    assert(!is_null($filename));

    // Load all entities without any filtering
    $entitiesCollection->loadEntities($sourceLocators);

    // There are now more than just 1 entity
    assert(1 < count(iterator_to_array($entitiesCollection)));

    /** ================================================= **/

    $entitiesToDisplayExample = $entitiesCollection
        ->filterByInterfaces([
            \BumbleDocGen\Core\Parser\Entity\EntityInterface::class
        ])
        ->filterByPaths([
            '/src/LanguageHandler/Php/Parser/Entity/SubEntity/Property',
            '/src/LanguageHandler/Php/Parser/Entity/SubEntity/Method'
        ])
        ->getOnlyInstantiable()
        ->toArray();

    $apiConfigEntity = $entitiesCollection->findEntity('ReflectionApiConfig.php');
    if ($apiConfigEntity) {
        $entitiesToDisplayExample[] = $apiConfigEntity;
    }

    $trueCondition = $entitiesCollection->findEntity('TrueCondition');
    if ($trueCondition) {
        $entitiesToDisplayExample[] = $trueCondition;
    }

    foreach ($entitiesToDisplayExample as $entity) {
        echo "================================================\n\n";
        echo "Class: {$entity->getName()}\n";
        $parentClassName = $entity->getParentClass()?->getName() ?: '-';
        echo "Parent class: {$parentClassName}\n";
        echo "File name: {$entity->getAbsoluteFileName()}\n";
        echo "Methods count: " . count($entity->getMethods()) . "\n";
        echo "Methods: " . implode(' | ', array_map(fn(MethodEntityInterface $method): string=>$method->getName(), $entity->getMethods())) . "\n";
        echo "Properties count: " . count($entity->getProperties()) . "\n";
        echo "Constants count: " . count($entity->getConstants()) . "\n\n";
    }
} catch (Exception | \Psr\Cache\InvalidArgumentException $e) {
    die($e->getMessage());
}
