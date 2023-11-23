<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;

/**
 * PHP Class
 *
 * @see https://www.php.net/manual/en/language.oop5.php
 */
class ClassEntity extends ClassLikeEntity
{
    /**
     * @inheritDoc
     */
    public function isClass(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     *
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
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isAbstract(): bool
    {
        return $this->getAst()->isAbstract();
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassNames(): array
    {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }
        try {
            $parentClass = $this->getParentClass();
            if ($name = $parentClass?->getName()) {
                return array_unique(array_merge([$name], $parentClass->getParentClassNames()));
            }
        } catch (\Exception $e) {
            $this->logger->warning($e->getMessage());
        }
        return [];
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassName(): ?string
    {
        if (!$this->isEntityDataCanBeLoaded()) {
            return null;
        }
        return $this->getAst()->extends?->toString();
    }

    /**
     * @inheritDoc
     *
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
     * @inheritDoc
     *
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
