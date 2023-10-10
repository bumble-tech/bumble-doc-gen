<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Providers\Ollama;

use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\AI\Traits\JsonExtractorTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

final class Provider implements ProviderInterface
{
    use JsonExtractorTrait;

    public bool $extractFirstJsonObject = false;
    private Client $client;
    private string $model;
    private string $endpoint;
    /**
     * The temperature of the model.
     * Increasing the temperature will make the model answer more creatively. (Default: 0.8)
     */
    private float $temperature;
    /**
     * Sets how strongly to penalize repetitions.
     * A higher value (e.g., 1.5) will penalize repetitions more strongly, while a lower value (e.g., 0.9)
     * will be more lenient. (Default: 1.1)
     */
    private float $repeatPenalty;

    /**
     * Reduces the probability of generating nonsense. A higher value (e.g. 100) will give more diverse answers,
     * while a lower value (e.g. 10) will be more conservative. (Default: 40)
     */
    private int $topP;

    /**
     * Works together with top-k. A higher value (e.g., 0.95) will lead to more diverse text,
     * while a lower value (e.g., 0.5) will generate more focused and conservative text. (Default: 0.9)
     */
    private float $topK;

    public function __construct()
    {
        $client = new Client();
        $this->client = $client;
        $this->endpoint = getenv('OLLAMA_ENDPOINT') ?: 'http://localhost:11434/api/generate';
        $this->temperature = getenv('OLLAMA_TEMPERATURE') ?: 0.8;
        $this->model = getenv('OLLAMA_MODEL') ?: 'llama2';
        $this->topP = getenv('OLLAMA_TOP_P') ?: 10;
        $this->topK = getenv('OLLAMA_TOP_K') ?: 0.9;
        $this->repeatPenalty = getenv('OPENAI_REPEAT_PENALTY') ?: 1.1;
    }

    public function generateMissingPHPDocBlocs(string $prompt): string
    {
        $systemPrompt = $this->getSystemPrompt('missingDocBlockGeneration');
        return $this->sendPrompt([$prompt], $systemPrompt);
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

        $this->extractFirstJsonObject = true;
        return $this->sendPrompt($prompts, $systemPrompt);
    }

    public function getName(): string
    {
        return 'Ollama';
    }

    /**
     * @see https://github.com/jmorganca/ollama/blob/main/docs/api.md#generate-a-completion
     * @see https://github.com/jmorganca/ollama/blob/main/docs/modelfile.md#valid-parameters-and-values
     */
    public function sendPrompt(array $prompts, string $system): string
    {
        $requestData = [
            'prompt' => implode("\n\n", $prompts),
            'system' => $system,
            'model' => $this->model,
            'options' => [
                'temperature' => $this->temperature,
                'top_p' => $this->topP,
                'top_k' => $this->topK,
                'repeat_penalty' => $this->repeatPenalty,
            ],
        ];

        try {
            $response = $this->client->request('POST', $this->endpoint, [
                'json' => $requestData,
            ]);

            $responseParsed = $this->processResponse($response);

            if ($this->extractFirstJsonObject) {
                return $this->extractFirstJsonObjectFromText($responseParsed);
            }
            return $responseParsed;
        } catch (GuzzleException $e) {
            throw new RuntimeException('[' . $e->getCode() . ']' . $e->getMessage());
        }
    }

    private function processResponse($guzzleResponse): string
    {
        $content = (string)$guzzleResponse->getBody();

        // Split the content by lines, as each line represents a JSON object
        $lines = explode("\n", $content);

        $fullResponse = "";

        foreach ($lines as $line) {
            try {
                $jsonObject = json_decode($line, true, 512, JSON_THROW_ON_ERROR);
                if ($jsonObject['done']) {
                    // todo: $jsonObject has key 'context' which is an encoding of the conversation and can be sent
                    // in the next request to keep conversational memory.
                    break;
                }
                $fullResponse .= $jsonObject['response'];
            } catch (\JsonException $e) {
                throw new RuntimeException(
                    '[' . $e->getCode() . '] Failed to decode JSON response: ' . $e->getMessage()
                );
            }
        }

        return $fullResponse;
    }

    private function getSystemPrompt(string $fileName): string
    {
        $systemPrompt = getenv('PROMPT_' . $fileName) ?: null;
        return $systemPrompt ?? file_get_contents(__DIR__ . '/Prompts/' . $fileName);
    }
}
