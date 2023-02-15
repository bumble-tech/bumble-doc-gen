<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Render;

use BumbleDocGen\Render\Context\Context;
use Symfony\Contracts\EventDispatcher\Event;

final class OnGettingResourceLink extends Event
{
    private ?string $resourceUrl = null;

    public function __construct(
        private string $resourceName, private Context $context
    )
    {
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): void
    {
        $this->resourceUrl = $resourceUrl;
    }
}
