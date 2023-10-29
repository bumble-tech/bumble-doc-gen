<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

use BumbleDocGen\AI\Providers\OpenAI\Provider as OpenAIProvider;
use RuntimeException;

final class ProviderFactory
{
    public static function create(): ProviderInterface
    {
        $apiType = getenv('API_TYPE');
        switch ($apiType) {
            case 'openai':
                $apiKey = getenv('OPENAI_API_KEY');
                if (empty($apiKey)) {
                    throw new RuntimeException("Environment variable OPENAI_API_KEY not set!");
                }
                return new OpenAIProvider($apiKey);
            default:
                throw new RuntimeException(
                    "Environment variable API_TYPE not set to valid option (huggingface, openai, ollama)!",
                );
        }
    }
}
