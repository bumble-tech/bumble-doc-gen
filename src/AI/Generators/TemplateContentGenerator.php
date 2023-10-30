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

final class TemplateContentGenerator
{
    private array $alreadyProcessedEntities = [];

    public function __construct(
        private ProviderInterface $aiHandler,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function generate(
        string $filePath,
        string $fileName,
        array $fileNamespaces,
        ?ClassEntityCollection $entitiesCollection,
        ?string $additionalPrompt = null,
        ?string $systemPrompt = null,
    ): ?string {
        $fileContent = file_get_contents($filePath);
        $methodStubs = $this->getMethodStubs($fileNamespaces, $entitiesCollection);
        $prompts[] = $this->aiHandler->formatDataPrompt(
            'Method Stubs',
            $methodStubs
        );

        if ($additionalPrompt) {
            $prompts[] = $this->aiHandler->formatDataPrompt('Additional Information', $additionalPrompt);
        }

        $prompts[] = ' Produce content for an "index.twig" file titled "' . $fileName . '"';

        if ($systemPrompt === null) {
            $systemPrompt = $this->aiHandler->getSystemPrompt('templateContentGeneration');
        } else {
            $systemPrompt = file_get_contents($systemPrompt);
        }

        $aiContent = $this->aiHandler->sendPrompts($prompts, $systemPrompt);

        return $fileContent . "\n" . $aiContent;
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
    private function getMethodStubs(
        array $fileNamespaces,
        ?ClassEntityCollection $entitiesCollection
    ): string {
        $tree = [];
        $this->alreadyProcessedEntities = [];

        foreach ($this->getEntities($entitiesCollection) as $entity) {
            $nsCheck = in_array($entity->getNamespaceName(), $fileNamespaces, true);
            if ($nsCheck) {
                $methods = $entity->getMethodEntityCollection();
                $simpleEntityName = $this->getSimpleEntityName($entity->getName());
                foreach ($methods as $method) {
                    /** @var MethodEntity $method */
                    $methodString = $method->getName() . '(' . $method->getParametersString() . ')';
                    $description = $method->getDescription();

                    if (!isset($tree[$entity->getNamespaceName()])) {
                        $tree[$entity->getNamespaceName()] = [];
                    }

                    if (!isset($tree[$entity->getNamespaceName()][$simpleEntityName])) {
                        $tree[$entity->getNamespaceName()][$simpleEntityName] = [];
                    }

                    $tree[$entity->getNamespaceName()][$simpleEntityName][$methodString] = $description;
                }
            }
        }
        return $this->treeToText($tree);
    }

    private function getSimpleEntityName(string $fullEntityName): string
    {
        $parts = explode('\\', $fullEntityName);
        return end($parts);
    }

    private function treeToText(array $tree, $indentLevel = 0): string
    {
        $text = '';
        $indent = str_repeat('  ', $indentLevel);

        foreach ($tree as $key => $value) {
            if (is_array($value)) {
                $text .= $indent . $key . ":\n";
                $text .= $this->treeToText($value, $indentLevel + 1);
            } else {
                $text .= $indent . $key . ": " . $value . "\n";
            }
        }

        return $text;
    }
}
