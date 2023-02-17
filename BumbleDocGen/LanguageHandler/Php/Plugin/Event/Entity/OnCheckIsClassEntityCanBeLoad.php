<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use Symfony\Contracts\EventDispatcher\Event;

final class OnCheckIsClassEntityCanBeLoad extends Event
{
    public bool $classCanBeLoad = true;

    public function __construct(private ClassEntity $entity)
    {
    }

    public function getEntity(): ClassEntity
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
