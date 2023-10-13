<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Providers\HuggingFace;

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
    private string $endpoint;
    private int $maxNewTokens;
    private float $topP;
    private float $temperature;

    public function __construct($bearerToken, $apiEndpoint)
    {
        $client = new Client(
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $bearerToken
                ]
            ]
        );
        $this->client = $client;
        $this->endpoint = $apiEndpoint;
        $this->maxNewTokens = getenv('HUGGINGFACE_MAX_NEW_TOKENS') ?: 1024;
        $this->topP = getenv('HUGGINGFACE_TOP_P') ?: 0.5;
        $this->temperature = getenv('HUGGINGFACE_TEMPERATURE') ?: 0.1;
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

        $messages = [];
        if ($additionalPrompt) {
            $messages[] = "Additional Information: {$additionalPrompt}";
        }

        $messages[] = "The namespace list is:\n";
        $messages[] = implode("\n", $namespacesList);
        $messages[] = "\nThe JSON object for the structure of the documentation should be:";
        $this->extractFirstJsonObject = true;

        return $this->sendPrompt($messages, $systemPrompt);
    }

    public function getName(): string
    {
        return 'HuggingFace';
    }

    public function sendPrompt(array $prompts, string $system): string
    {
        $input = $system . "\n_____\n" . implode(' ', $prompts);
        try {
            $response = $this->client->request('POST', $this->endpoint, [
                'json' => [
                    // Todo: add more parameters
                    'inputs' => $input,
                    'parameters' => [
                        'max_new_tokens' => $this->maxNewTokens,
                        'top_p' => $this->topP,
                        'temperature' => $this->temperature
                    ]
                ]
            ]);

            $responseData = json_decode(
                $response->getBody()->getContents(),
                true,
                512,
                JSON_THROW_ON_ERROR
            );

            if (isset($responseData[0]['generated_text'])) {
                if ($this->extractFirstJsonObject) {
                    return $this->extractFirstJsonObjectFromText($responseData[0]['generated_text']);
                }
                return $responseData[0]['generated_text'];
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

    private function getSystemPrompt(string $fileName): string
    {
        $systemPrompt = getenv('PROMPT_' . $fileName) ?: null;
        return $systemPrompt ?? file_get_contents(__DIR__ . '/Prompts/' . $fileName);
    }
}
