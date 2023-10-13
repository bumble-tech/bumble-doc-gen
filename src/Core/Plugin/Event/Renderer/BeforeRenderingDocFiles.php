<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event occurs before the main documents begin rendering
 */
final class BeforeRenderingDocFiles extends Event
{
}
