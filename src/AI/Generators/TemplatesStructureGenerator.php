<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Generators;

use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use JsonException;

final class TemplatesStructureGenerator
{
    public function __construct(private ProviderInterface $aiHandler)
    {
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     * @throws JsonException
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

        $prompts = [];
        $prompts[] = $this->aiHandler->formatDataPrompt(
            'Namespaces',
            implode(
                "\n",
                $namespacesList
            )
        );

        $systemPrompt = $this->aiHandler->getSystemPrompt('structureGeneration');

        if ($additionalPrompt) {
            $prompts[] = $this->aiHandler->formatDataPrompt('Additional Information', $additionalPrompt);
        }

        $content = $this->aiHandler->sendPrompts($prompts, $systemPrompt);

        $structure = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        $finalStructure = [
            "/readme.md.twig" => "About the project",
        ];

        foreach ($structure as $dir => $docName) {
            $finalStructure["/tech{$dir}/index.md.twig"] = $docName;
        }

        $finalStructure["/tech/index.md.twig"] = "Description of the technical part of the project";
        return $finalStructure;
    }
}
