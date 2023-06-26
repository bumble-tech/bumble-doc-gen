<?php

declare(strict_types=1);

namespace BumbleDocGen\TemplateGenerator\ChatGpt;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use Tectalic\OpenAi\Client;
use Tectalic\OpenAi\ClientException;

final class TemplatesStructureGenerator
{
    public const MODEL_GPT_4 = 'gpt-4';

    public function __construct(private Client $openaiClient, private string $model = self::MODEL_GPT_4)
    {
    }

    /**
     * @throws ClientException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function generateStructureByEntityCollection(
        RootEntityCollection $rootEntityCollection,
        ?string              $additionalPrompt = null,
    ): array
    {
        if (!is_a($rootEntityCollection, ClassEntityCollection::class)) {
            throw new \InvalidArgumentException('Currently we can only work with collections of PHP entities');
        }

        $messages = [
            [
                'role' => 'system',
                'content' => file_get_contents(__DIR__ . '/prompts/structureGenerationStep1')
            ],
        ];

        if ($additionalPrompt) {
            $messages[] = [
                'role' => 'user',
                'content' => "Additional Information: {$additionalPrompt}"
            ];
        }

        $namespacesList = array_map(fn(ClassEntity $e) => $e->getNamespaceName(), iterator_to_array($rootEntityCollection));
        $namespacesList = array_unique($namespacesList);
        $messages[] = [
            'role' => 'user',
            'content' => implode("\n", $namespacesList),
        ];

        $response = $this->openaiClient->chatCompletions()->create(
            new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                'model' => $this->model,
                'messages' => $messages,
            ])
        )->toModel();

        $finalStructure = [
            "/readme.md.twig" => "About the project",
        ];

        if ($content = $response->choices[0]->message->content ?? null) {
            $structure = json_decode($content);
            foreach ($structure as $dir => $docName) {
                $finalStructure["{$dir}/index.md.twig"] = $docName;
            }
        }
        $finalStructure["/tech/index.md.twig"] = "Description of the technical part of the project";
        return $finalStructure;
    }
}
