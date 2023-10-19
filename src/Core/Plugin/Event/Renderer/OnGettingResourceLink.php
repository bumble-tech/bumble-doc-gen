<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event occurs when a reference to an entity (resource) is received
 */
final class OnGettingResourceLink extends Event
{
    private ?string $resourceUrl = null;

    public function __construct(private string $resourceName)
    {
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
