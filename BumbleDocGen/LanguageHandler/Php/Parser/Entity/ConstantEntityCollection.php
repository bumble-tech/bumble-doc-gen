<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;

final class ConstantEntityCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassEntity               $classEntity,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function createByClassEntity(
        ClassEntity               $classEntity,
        CacheablePhpEntityFactory $cacheablePhpEntityFactory
    ): ConstantEntityCollection
    {
        $constantEntityCollection = new ConstantEntityCollection($classEntity, $cacheablePhpEntityFactory);
        $classConstantEntityFilter = $classEntity->getPhpHandlerSettings()->getClassConstantEntityFilter();
        foreach ($classEntity->getConstantsData() as $name => $constantData) {
            $constantEntity = $cacheablePhpEntityFactory->createConstantEntity(
                $classEntity,
                $name,
                $constantData['declaringClass'],
                $constantData['implementingClass']
            );
            if ($classConstantEntityFilter->canAddToCollection($constantEntity)) {
                $constantEntityCollection->add($constantEntity);
            }
        }
        return $constantEntityCollection;
    }

    public function add(ConstantEntity $constantEntity, bool $reload = false): ConstantEntityCollection
    {
        $key = $constantEntity->getName();
        if (!isset($this->entities[$key]) || $reload) {
            $this->entities[$key] = $constantEntity;
        }
        return $this;
    }

    public function get(string $key): ?ConstantEntity
    {
        return $this->entities[$key] ?? null;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->entities);
    }

    public function unsafeGet(string $key): ?ConstantEntity
    {
        $constantEntity = $this->get($key);
        if (!$constantEntity) {
            $constantsData = $this->classEntity->getConstantsData()[$key] ?? null;
            if (is_array($constantsData)) {
                return $this->cacheablePhpEntityFactory->createConstantEntity(
                    $this->classEntity,
                    $key,
                    $constantsData['declaringClass'],
                    $constantsData['implementingClass']
                );
            }
        }
        return $constantEntity;
    }
}
