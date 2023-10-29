<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Generators;

use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use DI\DependencyException;
use DI\NotFoundException;
use DirectoryIterator;
use JsonException;

final class TemplateGenerator
{
    private const FILE_LENGTH_EXISTING_CONTENT = 300;

    private array $alreadyProcessedEntities = [];

    public function __construct(
        private ProviderInterface $aiHandler,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws JsonException
     * @throws InvalidConfigurationParameterException
     */
    public function generate(
        string $filePath,
        string $fileContent,
        ?ClassEntityCollection $entitiesCollection,
        ?string $additionalPrompt = null
    ): ?string {
        $methodStubs = $this->getMethodStubs($filePath, $entitiesCollection);
        $directoryStructure = $this->getDirectoryStructure($filePath);

        if (strlen($fileContent) > self::FILE_LENGTH_EXISTING_CONTENT) {
            return $fileContent; //todo: better way to not generate already existing content
        }
        $prompts[] = $this->aiHandler->formatDataPrompt(
            'Method Stubs',
            implode(
                "\n",
                $methodStubs
            )
        );
        $prompts[] = $this->aiHandler->formatDataPrompt(
            'Directory Structure',
            json_encode(
                $directoryStructure,
                JSON_THROW_ON_ERROR
            )
        );
        if ($additionalPrompt) {
            $prompts[] = $this->aiHandler->formatDataPrompt('Additional Information', $additionalPrompt);
        }

        $prompts[] = 'Generate the documentation content for ' . $this->getFileSubPathFromPath(
            $filePath
        );

        $systemPrompt = $this->aiHandler->getSystemPrompt('templateGeneration');

        $aiContent = $this->aiHandler->sendPrompts($prompts, $systemPrompt);

        return $fileContent . "\n" . $aiContent;
    }

    private function isNamespaceChildOrSame(string $namespace1, string $namespace2): bool
    {
        // If namespaces are exactly the same
        if ($namespace1 === $namespace2) {
            return true;
        }

        if (str_starts_with($namespace2, $namespace1 . '\\')) {
            $remainder = substr($namespace2, strlen($namespace1) + 1);
            if (!str_contains($remainder, '\\')) {
                return true;
            }
        }

        return false;
    }

    private function getNamespaceFromPath(string $path): ?string
    {
        $namespaceStart = 'templates/tech/';

        $startPosition = strpos($path, $namespaceStart);

        if ($startPosition === false) {
            return null;
        }

        $namespacePart = substr($path, $startPosition + strlen($namespaceStart));
        $namespace = dirname($namespacePart);

        return "BumbleDocGen\\" . str_replace('/', '\\', $namespace); //todo: fix that i'm passing BumbleDocGen
    }

    public function getFileSubPathFromPath(string $path): ?string
    {
        $subPathStart = 'templates/tech/';

        $startPosition = strpos($path, $subPathStart);

        if ($startPosition === false) {
            return null;
        }

        return substr($path, $startPosition + strlen($subPathStart));
    }

    private function getDirectoryStructure($path, $parent = ''): array
    {
        $data = [];

        // If a file path is provided, get its directory.
        if (!is_dir($path)) {
            $parent .= '/' . basename(dirname($path));
            $path = dirname($path);
        }

        $items = new DirectoryIterator($path);
        foreach ($items as $item) {
            if (!$item->isDot()) {
                $currentPath = $parent . '/' . $item->getFilename();
                if ($item->isDir()) {
                    $data[$currentPath] = $this->getDirectoryStructure($item->getPathname(), $currentPath);
                } else {
                    $data[$currentPath] = $currentPath;
                }
            }
        }

        return $data;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    private function getEntities(ClassEntityCollection|array $entitiesCollection): \Generator
    {
        foreach ($entitiesCollection as $classEntity) {
            /**@var ClassEntity $classEntity */
            if (
                !$classEntity->entityDataCanBeLoaded() || array_key_exists(
                    $classEntity->getName(),
                    $this->alreadyProcessedEntities
                )
            ) {
                continue;
            }
            $interfaces = $classEntity->getInterfacesEntities();
            if ($interfaces) {
                yield from $this->getEntities($interfaces);
            }
            $parentClass = $classEntity->getParentClass();
            if ($parentClass) {
                yield from $this->getEntities([$parentClass]);
            }
            $this->alreadyProcessedEntities[$classEntity->getName()] = 1;
            yield $classEntity;
        }
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private function getMethodStubs(string $filePath, ?ClassEntityCollection $entitiesCollection): array
    {
        $namespace = $this->getNamespaceFromPath($filePath);
        $methodStubs = [];
        foreach ($this->getEntities($entitiesCollection) as $entity) {
            $nsCheck = $this->isNamespaceChildOrSame($namespace, $entity->getNamespaceName());
            if ($nsCheck) {
                $methods = $entity->getMethodEntityCollection();
                foreach ($methods as $method) {
                    /** @var MethodEntity $method */
                    $methodStubs[] = $entity->getName() . ' function ' . $method->getName(
                    ) . '(' . $method->getParametersString() . ') # ' . $method->getDescription();
                }
            }
        }
        return $methodStubs;
    }
}
