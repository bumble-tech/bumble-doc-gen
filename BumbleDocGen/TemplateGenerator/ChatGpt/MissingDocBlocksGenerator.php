<?php

declare(strict_types=1);

namespace BumbleDocGen\TemplateGenerator\ChatGpt;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use DI\DependencyException;
use DI\NotFoundException;
use Tectalic\OpenAi\Client;
use Tectalic\OpenAi\ClientException;

final class MissingDocBlocksGenerator
{
    public const MODEL_GPT_4 = 'gpt-4';

    public const MODE_READ_ONLY_SIGNATURES = 1;
    public const MODE_READ_ALL_CODE = 2;

    public function __construct(
        private Client       $openaiClient,
        private ParserHelper $parserHelper,
        private string       $model = self::MODEL_GPT_4,
    )
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
        $newThrowsDockBlocks = [];
        $toRequest = [];

        foreach ($rootEntity->getMethodEntityCollection() as $method) {
            /** @var MethodEntity $method */
            if ($method->isConstructor() || $method->isImplementedInParentClass()) {
                continue;
            }

            $bodyCode = $method->getBodyCode();
            if (preg_match_all("/throw\\s*new\\s*([a-zA-Z0-9\\\\]+)(\\s*?)(?=\\()/s", $bodyCode, $matches)) {
                $alreadySavedThrows = array_map(fn(array $tData) => $tData['name'], $method->getThrows());
                $foundThrows = $matches[1] ?? [];
                $foundThrows = array_combine($foundThrows, $foundThrows);
                if ($foundThrows) {
                    $newThrowsDockBlocks[$method->getName()] = array_filter(array_map(function (string $className) use ($method) {
                        return $this->parserHelper->parseFullClassName(
                            $className,
                            $method->getImplementingClass()
                        );
                    }, $foundThrows), fn($c) => !in_array($c, $alreadySavedThrows));
                }
            }

            if ($method->getDocComment() && $method->getDescription()) {
                $prototype = $method->getPrototype();
                $prototypeDocComment = $prototype?->getDocComment();
                if ($prototypeDocComment && !str_contains(strtolower($method->getDocComment()), '@inheritdoc')) {
                    if (isset($newThrowsDockBlocks[$method->getName()])) {
                        $methodsDockBlocks[$method->getName()] = str_replace('*/', "*\n * [throws]\n * {@inheritDoc}\n */", $method->getDocComment());
                    } else {
                        $methodsDockBlocks[$method->getName()] = str_replace('*/', "*\n * {@inheritDoc}\n */", $method->getDocComment());
                    }
                } elseif (isset($newThrowsDockBlocks[$method->getName()])) {
                    $methodsDockBlocks[$method->getName()] = str_replace('*/', "* [throws]\n */", $method->getDocComment());
                }
                continue;
            }

            if (!$method->getDescription() && $method->getDocComment()) {
                $methodsDockBlocks[$method->getName()] = str_replace('/**', "/**\n * [insert]", $method->getDocComment());
            } elseif (strlen($method->getDocCommentRecursive()) > 1) {
                if ($method->getDescription()) {
                    if (isset($newThrowsDockBlocks[$method->getName()])) {
                        $methodsDockBlocks[$method->getName()] = $this->createDocBlockText(['[throws]', '{@inheritDoc}']);
                    } else {
                        $methodsDockBlocks[$method->getName()] = $this->createDocBlockText(['{@inheritDoc}']);
                    }
                    continue;
                } else {
                    $methodsDockBlocks[$method->getName()] = $this->createDocBlockText(['[insert]', '{@inheritDoc}']);
                }
            } else {
                $methodsDockBlocks[$method->getName()] = $this->createDocBlockText(['[insert]']);
            }

            if ($mode === self::MODE_READ_ONLY_SIGNATURES) {
                $toRequest[] = "{$method->getSignature()};";
            } elseif ($mode === self::MODE_READ_ALL_CODE) {
                $toRequest[] = "{$method->getSignature()} {\n{$bodyCode}\n}";
            }
        }

        if (!$toRequest) {

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
        }

        foreach ($methodsDockBlocks as $methodName => $block) {
            $methodsDockBlocks[$methodName] = str_replace("[insert]", $responseData[$methodName] ?? '', $block);
            $throwsString = implode("\n *", array_map(fn($v) => "@throws {$v}", $newThrowsDockBlocks[$methodName] ?? []));
            if ($throwsString) {
                $methodsDockBlocks[$methodName] = str_replace(
                    '[throws]',
                    $throwsString,
                    $methodsDockBlocks[$methodName]
                );
            }
        }

        return $methodsDockBlocks;
    }

    private function createDocBlockText(array $parts): string
    {
        $partsStr = implode("\n", array_map(fn($v) => " * {$v}", $parts));
        return "/**\n{$partsStr}\n */";
    }
}
