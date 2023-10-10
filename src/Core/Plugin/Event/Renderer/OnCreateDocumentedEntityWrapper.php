<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use Symfony\Contracts\EventDispatcher\Event;

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
