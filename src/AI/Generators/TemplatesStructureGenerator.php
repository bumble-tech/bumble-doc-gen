<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Generators;

use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;

final class TemplatesStructureGenerator
{
    public function __construct(private ProviderInterface $aiHandler)
    {
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function generateStructureByEntityCollection(
        RootEntityCollection $rootEntityCollection,
        ?string $additionalPrompt = null,
    ): array {
        if (!is_a($rootEntityCollection, ClassEntityCollection::class)) {
            throw new \InvalidArgumentException('Currently we can only work with collections of PHP entities');
        }
        $namespacesList = array_map(
            static fn(ClassEntity $e) => $e->getNamespaceName(),
            iterator_to_array($rootEntityCollection)
        );
        $namespacesList = array_unique($namespacesList);

        $content = $this->aiHandler->generateTemplateStructure($namespacesList, $additionalPrompt);

        $structure = json_decode($content);
        $finalStructure = [
            "/readme.md.twig" => "About the project",
        ];

        foreach ($structure as $dir => $docName) {
            $finalStructure["{$dir}/index.md.twig"] = $docName;
        }

        $finalStructure["/tech/index.md.twig"] = "Description of the technical part of the project";
        return $finalStructure;
    }
}
