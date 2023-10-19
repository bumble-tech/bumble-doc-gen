<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event occurs when an entity is added to the list for documentation
 */
final class OnCreateDocumentedEntityWrapper extends Event
{
    public function __construct(
        private DocumentedEntityWrapper $documentedEntityWrapper
    ) {
    }

    public function getDocumentedEntityWrapper(): DocumentedEntityWrapper
    {
        return $this->documentedEntityWrapper;
    }
}
