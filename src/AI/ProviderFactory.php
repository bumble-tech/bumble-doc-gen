<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

use BumbleDocGen\AI\Providers\HuggingFace\Provider as HuggingFaceProvider;
use BumbleDocGen\AI\Providers\OpenAI\Provider as OpenAIProvider;
use RuntimeException;

final class ProviderFactory
{
    public static function create(): OpenAIProvider|HuggingFaceProvider
    {
        $apiType = getenv('API_TYPE');
        switch ($apiType) {
            case 'huggingface':
                $endpoint = getenv('HUGGINGFACE_ENDPOINT');
                $apiKey = getenv('HUGGINGFACE_API_KEY');
                if (empty($endpoint)) {
                    throw new RuntimeException("Environment variable HUGGINGFACE_ENDPOINT not set!");
                }
                if (empty($apiKey)) {
                    throw new RuntimeException("Environment variable HUGGINGFACE_TOKEN not set!");
                }
                return new HuggingFaceProvider($apiKey, $endpoint);
            case 'openai':
                $apiKey = getenv('OPENAI_API_KEY');
                if (empty($apiKey)) {
                    throw new RuntimeException("Environment variable OPENAI_GPT_MODEL not set!");
                }
                return new OpenAIProvider($apiKey);
            default:
                throw new RuntimeException(
                    "Environment variable API_TYPE not set to valid option (openai, huggingface)!",
                );
        }
    }
}
