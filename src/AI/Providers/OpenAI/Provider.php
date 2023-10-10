<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Providers\OpenAI;

use BumbleDocGen\AI\ProviderInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

final class Provider implements ProviderInterface
{
    private Client $client;
    private string $endpoint;
    private float $temperature;
    private float $frequencyPenalty;
    private ?int $maxTokens;
    private int $topP;
    private string $model;

    public function __construct($bearerToken)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $bearerToken
        ];

        $organisation = getenv('OPENAI_ORG') ?: null;
        if ($organisation !== null) {
            $headers['OpenAI-Organization'] = $organisation;
        }

        $client = new Client(
            [
                'headers' => $headers
            ]
        );
        $this->client = $client;
        $this->endpoint = getenv('OPENAI_ENDPOINT') ?: 'https://api.openai.com/v1/chat/completions';
        $this->temperature = getenv('OPENAI_TEMPERATURE') ?: 0.7;
        $this->model = getenv('OPENAI_GPT_MODEL') ?: 'gpt-3.5-turbo';
        $this->frequencyPenalty = getenv('OPENAI_FREQUENCY_PENALTY') ?: 0;
        $this->maxTokens = getenv('OPENAI_MAX_TOKENS') ?: null;
        $this->topP = getenv('OPENAI_TOP_P') ?: 1;
    }

    public function generateMissingPHPDocBlocs(string $prompt): string
    {
        $systemPrompt = $this->getSystemPrompt('missingDocBlockGeneration');
        $prompts = [$prompt];
        return $this->sendPrompt($prompts, $systemPrompt);
    }

    public function generateReadMeFileContent(array $prompts): string
    {
        $systemPrompt = $this->getSystemPrompt('readmeTemplateFiller');
        return $this->sendPrompt($prompts, $systemPrompt);
    }

    public function generateTemplateContent(array $prompts): string
    {
        $systemPrompt = $this->getSystemPrompt('templateGeneration');
        return $this->sendPrompt($prompts, $systemPrompt);
    }

    public function generateTemplateStructure(array $namespacesList, ?string $additionalPrompt): string
    {
        $systemPrompt = $this->getSystemPrompt('structureGeneration');

        $prompts = [];
        if ($additionalPrompt) {
            $prompts[] = "Additional Information: {$additionalPrompt}";
        }

        $prompts[] = implode("\n", $namespacesList);

        return $this->sendPrompt($prompts, $systemPrompt);
    }

    public function getName(): string
    {
        return 'OpenAI';
    }

    public function sendPrompt(array $prompts, string $system): string
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
            $response = $this->client->request('POST', $this->endpoint, [
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
        } catch (\JsonException $e) {
            throw new RuntimeException(
                '[' . $e->getCode() . '] Failed to decode JSON response: ' . $e->getMessage()
            );
        }
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

    private function getSystemPrompt(string $fileName): string
    {
        $systemPrompt = getenv('PROMPT_' . $fileName) ?: null;
        return $systemPrompt ?? file_get_contents(__DIR__ . '/Prompts/' . $fileName);
    }
}
