<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class PrintClassCollectionAsGroupedTable implements CustomFunctionInterface
{
    public function __construct(private readonly GetDocumentedEntityUrl $getDocumentedEntityUrlFunction)
    {
    }

    public static function getName(): string
    {
        return 'printClassCollectionAsGroupedTable';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(PhpEntitiesCollection $rootEntityCollection): string
    {
        $groups = $this->groupEntities($rootEntityCollection);
        $getDocumentedEntityUrlFunction = $this->getDocumentedEntityUrlFunction;

        $table = "| Group name | Class short name | Description |\n";
        $table .= "|-|-|-|\n";

        foreach ($groups as $groupKey => $entities) {
            $firstEntity = array_shift($entities);
            $table .= "| **{$groupKey}** | [{$firstEntity->getShortName()}]({$getDocumentedEntityUrlFunction($rootEntityCollection, $firstEntity->getName())}) | {$firstEntity->getDescription()} |\n";
            foreach ($entities as $entity) {
                $table .= "| | [{$entity->getShortName()}]({$getDocumentedEntityUrlFunction($rootEntityCollection, $entity->getName())}) | {$entity->getDescription()} |\n";
            }
            $table .= "| | | |\n";
        }
        return $table;
    }

    private function groupEntities(PhpEntitiesCollection $rootEntityCollection): array
    {
        $notUniquePart = null;
        foreach ($rootEntityCollection as $entity) {
            $name = $entity->getName();
            $nameParts = explode('\\', $name);
            array_pop($nameParts);

            if ($notUniquePart === '') {
                break;
            }

            if (is_null($notUniquePart)) {
                $notUniquePart = implode('\\', $nameParts);
            } else {
                $tmpNotUniquePart = '';
                foreach ($nameParts as $namePart) {
                    if (!str_starts_with($notUniquePart, ltrim($tmpNotUniquePart . '\\' . $namePart, '\\'))) {
                        break;
                    }
                    $tmpNotUniquePart .= '\\' . $namePart;
                }
                $notUniquePart = ltrim($tmpNotUniquePart, '\\');
            }
        }

        $groups = [];
        foreach ($rootEntityCollection as $entity) {
            $name = $entity->getName();
            $nameParts = explode('\\', $name);
            array_pop($nameParts);
            $key = preg_replace("/^" . quotemeta($notUniquePart) . "\\\\/", '', implode('\\', $nameParts));
            $groups[$key][] = $entity;
        }
        return $groups;
    }
}
