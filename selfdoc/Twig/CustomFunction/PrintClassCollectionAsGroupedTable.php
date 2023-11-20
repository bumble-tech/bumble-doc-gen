<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class PrintClassCollectionAsGroupedTable implements CustomFunctionInterface
{
    public function __construct(private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction)
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
    public function __invoke(ClassEntityCollection $rootEntityCollection): string
    {
        $groups = $this->groupEntities($rootEntityCollection);
        $getDocumentedEntityUrlFunction = $this->getDocumentedEntityUrlFunction;

        $table = "<table>";
        $table .= "<tr><th>Group name</th><th>Class short name</th><th>Description</th></tr>";

        foreach ($groups as $groupKey => $entities) {
            $firstEntity = array_shift($entities);
            $table .= "<tr><td rowspan='" . count($entities) + 1 . "'>{$groupKey}</td><td><a href='{$getDocumentedEntityUrlFunction($rootEntityCollection, $firstEntity->getName())}'>{$firstEntity->getShortName()}</a></td><td>{$firstEntity->getDescription()}</td></tr>";
            foreach ($entities as $entity) {
                $table .= "<tr><td><a href='{$getDocumentedEntityUrlFunction($rootEntityCollection, $entity->getName())}'>{$entity->getShortName()}</a></td><td>{$entity->getDescription()}</td></tr>";
            }
            $table .= "<tr><td colspan='3'></td></tr>";
        }

        $table .= "</table>";
        return "<embed> {$table} </embed>";
    }

    private function groupEntities(ClassEntityCollection $rootEntityCollection): array
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
