<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called before the content of the documentation document is saved to a file
 */
final class BeforeCreatingDocFile extends Event
{
    public function __construct(
        private string $content,
        private string $outputFilePatch,
        private readonly RendererContext $context
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

    public function getContext(): RendererContext
    {
        return $this->context;
    }
}
