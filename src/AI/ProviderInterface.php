<?php

declare(strict_types=1);

namespace BumbleDocGen\AI;

interface ProviderInterface
{
    public function generateTemplateStructure(array $namespacesList, ?string $additionalPrompt): string;

    public function generateMissingPHPDocBlocs(string $prompt): string;

    public function generateTemplateContent(array $prompts): string;

    public function generateReadMeFileContent(array $prompts): string;

    public function sendPrompt(array $prompts, string $system): string;

    public function getName(): string;
}
