<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

final class BeforeCreatingEntityDocFile extends Event
{
    public function __construct(
        private string $content,
        private string $outputFilePatch
    ) {
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getOutputFilePatch(): string
    {
        return $this->outputFilePatch;
    }

    public function setOutputFilePatch(string $outputFilePatch): void
    {
        $this->outputFilePatch = $outputFilePatch;
    }
}
