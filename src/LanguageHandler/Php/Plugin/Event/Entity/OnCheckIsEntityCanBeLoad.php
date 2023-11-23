<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use Symfony\Contracts\EventDispatcher\Event;

final class OnCheckIsEntityCanBeLoad extends Event
{
    public bool $classCanBeLoad = true;

    public function __construct(private ClassLikeEntity $entity)
    {
    }

    public function getEntity(): ClassLikeEntity
    {
        return $this->entity;
    }

    public function disableClassLoading(): void
    {
        $this->classCanBeLoad = false;
    }

    public function isClassCanBeLoad(): bool
    {
        return $this->classCanBeLoad;
    }
}
