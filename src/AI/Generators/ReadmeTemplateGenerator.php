<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Generators;

use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use DI\DependencyException;
use DI\NotFoundException;

final class ReadmeTemplateGenerator
{
    public function __construct(
        private ProviderInterface $aiProvider,
    ) {
    }


    /**
     * @param RootEntityCollection $rootEntityCollection
     * @param ClassLikeEntity[] $entryPoints
     * @param string|null $composerJsonFile
     * @param string|null $additionalPrompt
     * @return string
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function generateReadmeFileContent(
        RootEntityCollection $rootEntityCollection,
        array $entryPoints = [],
        ?string $composerJsonFile = null,
        ?string $additionalPrompt = null,
    ): string {
        if (!is_a($rootEntityCollection, PhpEntitiesCollection::class)) {
            throw new \InvalidArgumentException('Currently we can only work with collections of PHP entities');
        }

        $namespacesList = array_map(
            fn(ClassLikeEntity $e) => $e->getNamespaceName(),
            iterator_to_array($rootEntityCollection)
        );

        $namespacesList = array_unique($namespacesList);
        $prompts = [];
        $prompts[] = $this->aiProvider->formatDataPrompt('Project namespaces', implode("\n", $namespacesList));

        if ($composerJsonFile) {
            $prompts[] = $this->aiProvider->formatDataPrompt('Composer JSON', file_get_contents($composerJsonFile));
        }

        $entryPointsSignatures = [];
        foreach ($entryPoints as $entryPoint) {
            $methodsSignatures = [];
            foreach ($entryPoint->getMethodEntityCollection() as $method) {
                $methodsSignatures[] = $method->getSignature();
            }

            $classSignature = "{$entryPoint->getModifiersString()} \\{$entryPoint->getName()}";
            $entryPointsSignatures[] = "/**{$entryPoint->getDescription()}*/\n{$classSignature}{\n" . implode(
                "\n",
                $methodsSignatures
            ) . "\n}";
        }

        if ($entryPointsSignatures) {
            $prompts[] = $this->aiProvider->formatDataPrompt(
                'Project entry points',
                implode("\n\n", $entryPointsSignatures)
            );
        }

        if ($additionalPrompt) {
            $prompts[] = $this->aiProvider->formatDataPrompt('Additional Information', $additionalPrompt);
        }

        $systemPrompt = $this->aiProvider->getSystemPrompt('readmeTemplateGeneration');
        return $this->aiProvider->sendPrompts($prompts, $systemPrompt);
    }
}
