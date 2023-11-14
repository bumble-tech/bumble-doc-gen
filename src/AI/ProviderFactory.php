<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

use BumbleDocGen\AI\Providers\OpenAI\Provider as OpenAIProvider;
use RuntimeException;

final class ProviderFactory
{
    public const VALID_PROVIDERS = [OpenAIProvider::NAME];

    public static function create(string $provider, string $apiKey, ?string $model = null): ProviderInterface
    {
        return match ($provider) {
            OpenAIProvider::NAME => new OpenAIProvider($apiKey, $model),
            default => throw new RuntimeException(
                "Parameter 'ai_provider' not set to valid option (" . implode(',', self::VALID_PROVIDERS) . ")!",
            ),
        };
    }
}
