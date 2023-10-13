<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event occurs before the rendering of entity documents begins, after the main documents have been created
 */
final class BeforeRenderingEntities extends Event
{
}
