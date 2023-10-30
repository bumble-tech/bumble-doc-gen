<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

use BumbleDocGen\AI\Providers\OpenAI\Provider as OpenAIProvider;
use RuntimeException;

final class ProviderFactory
{
    private const VALID_PROVIDERS = [OpenAIProvider::NAME];

    public static function create(string $handler, string $apiKey, string $model): ProviderInterface
    {
        return match ($handler) {
            OpenAIProvider::NAME => new OpenAIProvider($apiKey, $model),
            default => throw new RuntimeException(
                "Parameter 'ai-handler' not set to valid option (" . implode(',', self::VALID_PROVIDERS) . ")!",
            ),
        };
    }
}
