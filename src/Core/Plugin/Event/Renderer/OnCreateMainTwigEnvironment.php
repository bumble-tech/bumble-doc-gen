<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;
use Twig\Loader\FilesystemLoader;

final class OnCreateMainTwigEnvironment extends Event
{
    public function __construct(private FilesystemLoader $filesystemLoader)
    {
    }

    public function getFilesystemLoader(): FilesystemLoader
    {
        return $this->filesystemLoader;
    }
}
