<?php

declare(strict_types=1);

namespace BumbleDocGen\TemplateGenerator\ChatGpt;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use DI\DependencyException;
use DI\NotFoundException;
use Tectalic\OpenAi\Client;
use Tectalic\OpenAi\ClientException;

final class MissingDocBlocksGenerator
{
    public const MODEL_GPT_4 = 'gpt-4';

    public const MODE_READ_ONLY_SIGNATURES = 1;
    public const MODE_READ_ALL_CODE = 2;

    public function __construct(private Client $openaiClient, private string $model = self::MODEL_GPT_4)
    {
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function hasMethodsWithoutDocBlocks(RootEntityInterface $rootEntity): bool
    {
        if (!is_a($rootEntity, ClassEntity::class)) {
            throw new \InvalidArgumentException('Currently we can only work PHP class entities');
        }
        foreach ($rootEntity->getMethodEntityCollection() as $method) {
            /** @var MethodEntity $method */
            if ($method->getDocComment() || $method->isConstructor()) {
                continue;
            }
            return true;
        }
        return false;
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws ClientException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function generateDocBlocksForMethodsWithoutIt(
        RootEntityInterface $rootEntity,
        int                 $mode = self::MODE_READ_ONLY_SIGNATURES,
    ): array
    {

        if (!is_a($rootEntity, ClassEntity::class)) {
            throw new \InvalidArgumentException('Currently we can only work PHP class entities');
        }

        $methodsDockBlocks = [];
        $toRequest = [];

        foreach ($rootEntity->getMethodEntityCollection() as $method) {
            /** @var MethodEntity $method */
            if ($method->getDocComment() || $method->isConstructor()) {
                continue;
            }

            if ($method->getDocCommentRecursive()) {
                if ($method->getDescription()) {
                    $methodsDockBlocks[$method->getName()] = <<<comment
    /**
     * {@inheritDoc}
     */
comment;
                    continue;
                } else {
                    $methodsDockBlocks[$method->getName()] = <<<comment
    /**
     * [insert]
     * {@inheritDoc}
     */
comment;
                }
            } else {
                $methodsDockBlocks[$method->getName()] = <<<comment
    /**
     * [insert]
     */
comment;
            }

            if ($mode === self::MODE_READ_ONLY_SIGNATURES) {
                $toRequest[] = "{$method->getSignature()};";
            } elseif ($mode === self::MODE_READ_ALL_CODE) {
                $toRequest[] = "{$method->getSignature()} {\n{$method->getBodyCode()}\n}";
            }
        }

        if (!$toRequest) {
            return [];
        }

        $classSignature = "{$rootEntity->getModifiersString()} \\{$rootEntity->getName()}";
        $requestData = "/**{$rootEntity->getDescription()}*/\n{$classSignature}{\n" . implode("\n", $toRequest) . "\n}";

        $messages = [
            [
                'role' => 'system',
                'content' => file_get_contents(__DIR__ . '/prompts/missingDocBlockGeneration')
            ],
        ];
        $messages[] = [
            'role' => 'user',
            'content' => $requestData,
        ];

        $response = $this->openaiClient->chatCompletions()->create(
            new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                'model' => $this->model,
                'messages' => $messages,
            ])
        )->toModel();

        $responseData = json_decode($response->choices[0]->message->content ?? "{}", true);
        foreach ($methodsDockBlocks as $methodName => $block) {
            $methodsDockBlocks[$methodName] = str_replace("[insert]", $responseData[$methodName] ?? '', $block);
        }

        return $methodsDockBlocks;
    }
}
