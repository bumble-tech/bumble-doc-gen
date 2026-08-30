<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Parser;

use Symfony\Contracts\EventDispatcher\Event;

final class BeforeParsingProcess extends Event
{
    public function __construct()
    {
    }
}
