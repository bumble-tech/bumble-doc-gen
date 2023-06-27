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
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     * @throws ClientException
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
            if ($method->isConstructor()) {
                continue;
            }

            if ($method->getDocComment() && $method->getDescription()) {
                $prototype = $method->getPrototype();
                $prototypeDocComment = $prototype?->getDocComment();
                if ($prototypeDocComment && !str_contains(strtolower($prototypeDocComment), '@inheritdoc')) {
                    $methodsDockBlocks[$method->getName()] = str_replace('*/', "*\n * {@inheritDoc}\n */", $prototypeDocComment);
                }
                continue;
            }

            if (!$method->getDescription() && $method->getDocComment()) {
                $methodsDockBlocks[$method->getName()] = str_replace('/**', "/**\n * [insert]", $method->getDocComment());
            } elseif (strlen($method->getDocCommentRecursive()) > 1) {
                if ($method->getDescription()) {
                    $methodsDockBlocks[$method->getName()] = <<<docBlock
/**
 * {@inheritDoc}
 */
docBlock;
                    continue;
                } else {
                    $methodsDockBlocks[$method->getName()] = <<<docBlock
/**
 * [insert]
 * {@inheritDoc}
 */
docBlock;
                }
            } else {
                $methodsDockBlocks[$method->getName()] = <<<docBlock
/**
 * [insert]
 */
docBlock;
            }

            if ($mode === self::MODE_READ_ONLY_SIGNATURES) {
                $toRequest[] = "{$method->getSignature()};";
            } elseif ($mode === self::MODE_READ_ALL_CODE) {
                $toRequest[] = "{$method->getSignature()} {\n{$method->getBodyCode()}\n}";
            }
        }

        if (!$toRequest) {
            return $methodsDockBlocks;
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
