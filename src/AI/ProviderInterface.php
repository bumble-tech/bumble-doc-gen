<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

interface ProviderInterface
{
    public function getName(): string;

    public function getSystemPrompt(string $fileName): string;

    public function sendPrompts(array $prompts, string $system): string;

    public function formatDataPrompt(string $title, string $content): string;
}
