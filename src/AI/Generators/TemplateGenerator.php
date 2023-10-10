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

final class TemplateGenerator
{
    public function __construct(
        private ProviderInterface $aiHandler,
    ) {
    }

    private function getTemplateFromGPT(
        string $filePath,
        string $fileContent,
        array $methodStubs,
        ?string $additionalPrompt
    ): ?string {
        $prompts[] = 'Create the template for ' . $this->getFileSubPathFromPath(
            $filePath
        ) . ' the existing template is: [TEMPLATE]' . $fileContent . '[/TEMPLATE]';

        $prompts[] =
            "The file documents a namespace/class with the following method stubs: \n" . implode(
                "\n",
                $methodStubs
            );

        if ($additionalPrompt) {
            $prompts[] = "Additional Information: {$additionalPrompt}";
        }

        $response = $this->aiHandler->generateTemplateContent($prompts);

        return $this->extractTemplateContent($response);
    }

    private function extractTemplateContent(string $str): ?string
    {
        preg_match('/\[TEMPLATE](.*?)\[\/TEMPLATE]/s', $str, $matches);
        return $matches[1] ?? null;
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

        return str_replace('/', '\\', $namespace);
    }

    public function getFileSubPathFromPath(string $path)
    {
        $subPathStart = 'templates/tech/';

        $startPosition = strpos($path, $subPathStart);

        if ($startPosition === false) {
            return null;
        }

        return substr($path, $startPosition + strlen($subPathStart));
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function generate(
        string $filePath,
        string $fileContent,
        ?ClassEntityCollection $entitiesCollection,
        ?string $additionalPrompt = null
    ): ?string {
        $namespace = $this->getNamespaceFromPath($filePath);

        $alreadyProcessedEntities = [];
        $getEntities = function (ClassEntityCollection|array $entitiesCollection) use (
            &$getEntities,
            &
            $alreadyProcessedEntities
        ): \Generator {
            foreach ($entitiesCollection as $classEntity) {
                /**@var ClassEntity $classEntity */
                if (
                    !$classEntity->entityDataCanBeLoaded() || array_key_exists(
                        $classEntity->getName(),
                        $alreadyProcessedEntities
                    )
                ) {
                    continue;
                }
                $interfaces = $classEntity->getInterfacesEntities();
                if ($interfaces) {
                    yield from $getEntities($interfaces);
                }
                $parentClass = $classEntity->getParentClass();
                if ($parentClass) {
                    yield from $getEntities([$parentClass]);
                }
                $alreadyProcessedEntities[$classEntity->getName()] = 1;
                yield $classEntity;
            }
        };

        $methodStubs = [];
        foreach ($getEntities($entitiesCollection) as $entity) {
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

        return $this->getTemplateFromGPT($filePath, $fileContent, $methodStubs, $additionalPrompt);
    }
}
