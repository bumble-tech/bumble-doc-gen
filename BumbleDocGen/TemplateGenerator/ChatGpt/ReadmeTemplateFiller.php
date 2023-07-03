<?php

declare(strict_types=1);

namespace BumbleDocGen\TemplateGenerator\ChatGpt;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;
use Tectalic\OpenAi\Client;
use Tectalic\OpenAi\ClientException;

final class ReadmeTemplateFiller
{
    public const MODEL_GPT_4 = 'gpt-4';

    public function __construct(
        private Client $openaiClient,
        private string $model = self::MODEL_GPT_4,
    )
    {
    }


    /**
     * @param RootEntityCollection $rootEntityCollection
     * @param ClassEntity[] $entryPoints
     * @param string|null $composerJsonFile
     * @param string|null $additionalPrompt
     * @return string
     * @throws ClientException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     * @throws ReflectionException
     */
    public function generateReadmeFileContent(
        RootEntityCollection $rootEntityCollection,
        array                $entryPoints = [],
        ?string              $composerJsonFile = null,
        ?string              $additionalPrompt = null,
    ): string
    {
        if (!is_a($rootEntityCollection, ClassEntityCollection::class)) {
            throw new \InvalidArgumentException('Currently we can only work with collections of PHP entities');
        }

        $messages = [
            [
                'role' => 'system',
                'content' => file_get_contents(__DIR__ . '/prompts/readmeTemplateFiller')
            ],
        ];

        $namespacesList = array_map(fn(ClassEntity $e) => $e->getNamespaceName(), iterator_to_array($rootEntityCollection));
        $namespacesList = array_unique($namespacesList);
        $messages[] = [
            'role' => 'user',
            'content' => "Project namespaces:\n" . implode("\n", $namespacesList),
        ];

        if ($composerJsonFile) {
            $messages[] = [
                'role' => 'user',
                'content' => "Composer JSON:\n" . file_get_contents($composerJsonFile),
            ];
        }

        $entryPointsSignatures = [];
        foreach ($entryPoints as $entryPoint) {
            $methodsSignatures = [];
            foreach ($entryPoint->getMethodEntityCollection() as $method) {
                $methodsSignatures[] = $method->getSignature();
            }

            $classSignature = "{$entryPoint->getModifiersString()} \\{$entryPoint->getName()}";
            $entryPointsSignatures[] = "/**{$entryPoint->getDescription()}*/\n{$classSignature}{\n" . implode("\n", $methodsSignatures) . "\n}";
        }

        if ($entryPointsSignatures) {
            $messages[] = [
                'role' => 'user',
                'content' => "Project entry points: \n" . implode("\n\n", $entryPointsSignatures)
            ];
        }

        if ($additionalPrompt) {
            $messages[] = [
                'role' => 'user',
                'content' => "Additional Information: {$additionalPrompt}"
            ];
        }

        $response = $this->openaiClient->chatCompletions()->create(
            new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                'model' => $this->model,
                'messages' => $messages,
            ])
        )->toModel();

        return $response->choices[0]->message->content ?? '';
    }
}
