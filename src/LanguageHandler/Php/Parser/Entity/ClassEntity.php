<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;

class ClassEntity extends ClassLikeEntity
{
    public function isClass(): bool
    {
        return true;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isInstantiable(): bool
    {
        if ($this->isAbstract()) {
            return false;
        }
        return $this->getAst()->getMethod('__construct')?->isPublic() ?? true;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isAbstract(): bool
    {
        return $this->getAst()->isAbstract();
    }

    /**
     * @return string[]
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassNames(): array
    {
        if (!$this->entityDataCanBeLoaded()) {
            return [];
        }
        try {
            $parentClass = $this->getParentClass();
            if ($name = $parentClass?->getName()) {
                return array_unique(array_merge(["\\{$name}"], $parentClass->getParentClassNames()));
            }
        } catch (\Exception $e) {
            $this->logger->warning($e->getMessage());
        }
        return [];
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassName(): ?string
    {
        if (!$this->entityDataCanBeLoaded()) {
            return null;
        }
        if ($parentClassName = $this->getAst()->extends?->toString()) {
            return '\\' . $parentClassName;
        }
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getParentClass(): ?ClassLikeEntity
    {
        $parentClassName = $this->getParentClassName();
        if (!$parentClassName) {
            return null;
        }
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($parentClassName);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];
        if ($this->getAst()->isFinal()) {
            $modifiersString[] = 'final';
        } elseif ($this->isAbstract()) {
            $modifiersString[] = 'abstract';
        }

        $modifiersString[] = 'class';
        return implode(' ', $modifiersString);
    }
}
