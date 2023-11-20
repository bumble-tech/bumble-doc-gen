<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Generate class map in HTML format
 *
 * @note This function initiates the creation of documents for the displayed entities
 *
 * @example {{ drawClassMap(phpEntities.filterByPaths(['/src/Renderer'])) }}
 * @example {{ drawClassMap(phpEntities) }}
 */
final class DrawClassMap implements CustomFunctionInterface
{
    /** @var array<string, string> */
    private array $fileClassmap;

    public function __construct(
        private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
    ) {
    }

    public static function getName(): string
    {
        return 'drawClassMap';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }


    /**
     * @param ClassEntityCollection ...$entityCollections
     *  The collection of entities for which the class map will be generated
     * @return string
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        ClassEntityCollection ...$entityCollections,
    ): string {
        $structure = $this->convertDirectoryStructureToFormattedString(
            $this->getDirectoryStructure(...$entityCollections),
        );
        return "<embed> <pre>{$structure}</pre> </embed>";
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    protected function appendClassToDirectoryStructure(array $directoryStructure, ClassLikeEntity $classEntity): array
    {
        $entityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);
        $this->fileClassmap[$classEntity->getRelativeFileName()] = call_user_func_array(
            callback: $this->getDocumentedEntityUrlFunction,
            args: [
                $entityCollection,
                $classEntity->getName()
            ]
        );
        $fileName = ltrim($classEntity->getRelativeFileName(), DIRECTORY_SEPARATOR);
        $pathParts = array_reverse(explode(DIRECTORY_SEPARATOR, $fileName));
        $tmpStructure = [array_shift($pathParts)];
        $prevKey = '';
        foreach ($pathParts as $pathPart) {
            $tmpStructure[$pathPart] = $tmpStructure;
            unset($tmpStructure[$prevKey]);
            unset($tmpStructure[0]);
            $prevKey = $pathPart;
        }
        return array_merge_recursive($directoryStructure, $tmpStructure);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDirectoryStructure(ClassEntityCollection ...$entityCollections): array
    {
        $entities = [];
        foreach ($entityCollections as $entityCollection) {
            foreach ($entityCollection as $classEntity) {
                if (!$classEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                $entities[$classEntity->getName()] = $classEntity;
            }
        }
        ksort($entities, SORT_STRING);
        $directoryStructure = [];
        foreach ($entities as $classEntity) {
            $directoryStructure = $this->appendClassToDirectoryStructure($directoryStructure, $classEntity);
        }
        return $directoryStructure;
    }

    private function sortStruct(array $structure): array
    {
        $sortedStructure = [];
        foreach ($structure as $key => $line) {
            if (is_array($line)) {
                $sortedStructure[$key] = $line;
            }
        }
        foreach ($structure as $key => $line) {
            if (!is_array($line)) {
                $sortedStructure[$key] = $line;
            }
        }
        return $sortedStructure;
    }

    public function convertDirectoryStructureToFormattedString(
        array $structure,
        string $prefix = '│',
        string $path = '/'
    ): string {
        $entityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);
        $formattedString = '';
        $elementsCount = count($structure);
        $i = 0;
        $structure = $this->sortStruct($structure);
        foreach ($structure as $key => $line) {
            $isLastLine = ++$i == $elementsCount;
            $preparedPrefix = mb_substr($prefix, 0, -1) . ($isLastLine ? '└' : '├');
            if (is_array($line)) {
                $formattedString .= "{$preparedPrefix}──<b>{$key}</b>/\n";
                $formattedString .= $this->convertDirectoryStructureToFormattedString(
                    $line,
                    "{$prefix}  │",
                    "{$path}{$key}/"
                );
            } else {
                $filepath = "{$path}{$line}";
                $filepath = $this->fileClassmap[$filepath] ?? $filepath;
                $classEntity = $entityCollection->findEntity("{$path}{$line}");
                if ($description = $classEntity?->getDescription() ?: '') {
                    $description = str_replace(["\r\n", "\r", "\n", "\t", '  '], ' ', strip_tags($description));
                    $description = mb_strimwidth($description, 0, 100, "...");
                    $description = "<i> — <samp>{$description}</samp></i>";
                }

                $formattedString .= "{$preparedPrefix}── <a href='{$filepath}'>{$line}</a> {$description}\n";
            }
        }
        return $formattedString;
    }
}
