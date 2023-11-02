<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Providers\OpenAI;

use BumbleDocGen\AI\ProviderInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use RuntimeException;

final class Provider implements ProviderInterface
{
    private const API_ENDPOINT = 'https://api.openai.com/v1/chat/completions';
    private const API_MODEL_ENDPOINT = 'https://api.openai.com/v1/models';
    private const DATA_SEPARATOR = '"""';
    public const NAME = 'openai';
    private Client $client;
    private ?string $model;
    private float $temperature;
    private float $frequencyPenalty;
    private ?int $maxTokens;
    private int $topP;

    public function __construct(string $bearerToken, ?string $model)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $bearerToken
        ];

        $client = new Client(
            [
                'headers' => $headers
            ]
        );
        $this->client = $client;
        $this->model = $model ?? 'gpt-4';
        $this->temperature = 0.5;
        $this->frequencyPenalty = 0;
        $this->maxTokens = null;
        $this->topP = 1;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function sendPrompts(array $prompts, string $system): string
    {
        $requestData = [
            'messages' => $this->createMessages($prompts, $system),
            'model' => $this->model,
            'temperature' => $this->temperature,
            'frequency_penalty' => $this->frequencyPenalty,
            'top_p' => $this->topP,
        ];

        if ($this->maxTokens !== null) {
            $requestData['max_tokens'] = $this->maxTokens;
        }

        try {
            $response = $this->client->request('POST', self::API_ENDPOINT, [
                'json' => $requestData,
            ]);

            $responseData = json_decode(
                $response->getBody()->getContents(),
                true,
                512,
                JSON_THROW_ON_ERROR
            );

            if (isset($responseData['choices'][0]['message']['content'])) {
                return $responseData['choices'][0]['message']['content'];
            }

            throw new RuntimeException('Generated text not found in response');
        } catch (GuzzleException $e) {
            throw new RuntimeException('[' . $e->getCode() . ']' . $e->getMessage());
        } catch (JsonException $e) {
            throw new RuntimeException(
                '[' . $e->getCode() . '] Failed to decode JSON response: ' . $e->getMessage()
            );
        }
    }

    public function getSystemPrompt(string $fileName): string
    {
        return file_get_contents(dirname(__DIR__) . '/../Prompts/' . $fileName);
    }

    public function formatDataPrompt(string $title, string $content): string
    {
        return $title . ": \n" . self::DATA_SEPARATOR . "\n" . $content . "\n" . self::DATA_SEPARATOR;
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function getAvailableModels(): array
    {
        $response = $this->client->request('GET', self::API_MODEL_ENDPOINT);
        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        // Order by 'created' field in descending order
        usort($data['data'], function ($a, $b) {
            return $b['created'] <=> $a['created'];
        });
        $models = [];
        foreach ($data['data'] as $model) {
            $models[] = $model['id'];
        }
        return $models;
    }

    private function createMessage(string $role, string $content): \stdClass
    {
        $message = new \stdClass();
        $message->role = $role;
        $message->content = $content;
        return $message;
    }

    private function createMessages(array $prompts, string $system): array
    {
        $messages = [];
        $messages[] = $this->createMessage('system', $system);
        foreach ($prompts as $prompt) {
            $messages[] = $this->createMessage('user', $prompt);
        }
        return $messages;
    }
}
