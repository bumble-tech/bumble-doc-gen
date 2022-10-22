<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Render;

use BumbleDocGen\Render\Context\Context;
use Symfony\Contracts\EventDispatcher\Event;

final class BeforeCreatingDocFile extends Event
{
    public function __construct(private string $content, private Context $context)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContext(): Context
    {
        return $this->context;
    }
}
