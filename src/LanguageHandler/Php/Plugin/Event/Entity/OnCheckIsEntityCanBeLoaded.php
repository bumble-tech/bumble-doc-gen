<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use Symfony\Contracts\EventDispatcher\Event;

final class OnCheckIsEntityCanBeLoaded extends Event
{
    public bool $isEntityCanBeLoaded = true;

    public function __construct(private RootEntityInterface $entity)
    {
    }

    public function getEntity(): RootEntityInterface
    {
        return $this->entity;
    }

    public function disableEntityLoading(): void
    {
        $this->isEntityCanBeLoaded = false;
    }

    public function isEntityCanBeLoaded(): bool
    {
        return $this->isEntityCanBeLoaded;
    }
}
