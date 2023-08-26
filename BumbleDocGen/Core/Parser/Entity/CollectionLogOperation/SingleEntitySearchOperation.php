<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class SingleEntitySearchOperation implements OperationInterface
{
    private int $usageCount = 0;
    private ?string $entityName = null;

    public function __construct(
        private string $functionName,
        private array $args,
        ?RootEntityInterface $entity
    ) {
        if ($entity?->entityDataCanBeLoaded()) {
            $this->entityName = $entity->getObjectId();
        }
    }

    public function getFunctionName(): string
    {
        return $this->functionName;
    }

    public function getArgs(): array
    {
        return $this->args;
    }

    public function getEntityName(): ?string
    {
        return $this->entityName;
    }

    public function getArgsHash(): string
    {
        return md5(json_encode($this->args));
    }

    public function getRequestedEntityName(): string
    {
        if ($this->entityName) {
            return $this->entityName;
        }

        $className = ltrim(str_replace('\\\\', '\\', $this->args[0] ?? ''), '\\');
        return explode(':', $className)[0];
    }

    public function getKey(): string
    {
        return "{$this->functionName}{$this->getArgsHash()}";
    }

    public function incrementUsageCount(): void
    {
        ++$this->usageCount;
    }

    public function call(RootEntityCollection $rootEntityCollection): ?RootEntityInterface
    {
        return call_user_func_array([$rootEntityCollection, $this->functionName], $this->args);
    }
}
