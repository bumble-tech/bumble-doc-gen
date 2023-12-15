<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Display all API methods of a class
 *
 * @example {{ displayClassApiMethods('\\BumbleDocGen\\LanguageHandler\\Php\\Parser\\Entity\\ClassEntity') }}
 */
final class DisplayClassApiMethods implements CustomFunctionInterface
{
    public function __construct(
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
    ) {
    }

    public static function getName(): string
    {
        return 'displayClassApiMethods';
    }

    public static function getOptions(): array
    {
        return [];
    }

    /**
     * @param string $className Name of the class for which API methods need to be displayed
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(string $className): ?string
    {
        $entitiesCollection = $this->rootEntityCollectionsGroup->get(PhpEntitiesCollection::NAME);
        if (!$entitiesCollection) {
            return null;
        }
        $classEntity = $entitiesCollection->getLoadedOrCreateNew($className);
        if ($classEntity->isEntityDataCanBeLoaded()) {
            $apiMethods = [];
            foreach ($classEntity->getMethods() as $method) {
                if ($method->isApi()) {
                    $description = $method->getDescription();
                    $entityDocUrl = call_user_func_array($this->getDocumentedEntityUrlFunction, [
                        $entitiesCollection,
                        $classEntity->getName(),
                        $method->getName()
                    ]);
                    $apiMethods[] = "- [#]({$entityDocUrl}) `{$method->getName()}()`" . ($description ? ": {$description}" : '');
                }
            }
            return implode("\n", $apiMethods);
        }
        return null;
    }
}
