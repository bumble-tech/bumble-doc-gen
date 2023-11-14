<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Method;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\BaseEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Psr\Log\LoggerInterface;

/**
 * @implements \IteratorAggregate<int, MethodEntity>
 */
final class MethodEntityCollection extends BaseEntityCollection
{
    public function __construct(
        private ClassEntity $classEntity,
        private PhpHandlerSettings $phpHandlerSettings,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory,
        private LoggerInterface $logger
    ) {
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function loadMethodEntities(): void
    {
        $methodEntityFilter = $this->phpHandlerSettings->getMethodEntityFilter();
        foreach ($this->classEntity->getMethodsData() as $name => $methodImplementingClass) {
            $methodEntity = $this->cacheablePhpEntityFactory->createMethodEntity(
                $this->classEntity,
                $name,
                $methodImplementingClass
            );
            if ($methodEntityFilter->canAddToCollection($methodEntity)) {
                $this->add($methodEntity);
            }
        }

        $docBlock = $this->classEntity->getDocBlock();
        $methodsBlocks = $docBlock->getTagsByName('method');
        if ($methodsBlocks) {
            foreach ($methodsBlocks as $methodsBlock) {
                try {
                    /**@var Method $methodsBlock */
                    $methodEntity = $this->cacheablePhpEntityFactory->createDynamicMethodEntity($this->classEntity, $methodsBlock);
                    $this->add($methodEntity);
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                }
            }
        }
    }

    public function add(MethodEntityInterface $methodEntity, bool $reload = false): MethodEntityCollection
    {
        $methodName = $methodEntity->getName();
        if (!isset($this->entities[$methodName]) || $reload) {
            $this->entities[$methodName] = $methodEntity;
        }
        return $this;
    }

    public function get(string $objectName): ?MethodEntity
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function unsafeGet(string $objectName): ?MethodEntity
    {
        $methodEntity = $this->get($objectName);
        if (!$methodEntity) {
            $methodImplementingClass = $this->classEntity->getMethodsData()[$objectName] ?? null;
            if (!is_null($methodImplementingClass)) {
                return $this->cacheablePhpEntityFactory->createMethodEntity(
                    $this->classEntity,
                    $objectName,
                    $methodImplementingClass
                );
            }
        }
        return $methodEntity;
    }

    public function getInitializations(): MethodEntityCollection
    {
        $methodEntityCollection = clone $this;
        foreach ($this as $objectId => $methodEntity) {
            try {
                /**@var MethodEntity $methodEntity */
                if (!$methodEntity->isInitialization()) {
                    $methodEntityCollection->remove($objectId);
                }
            } catch (\Exception $e) {
                $this->logger->warning($e->getMessage());
            }
        }
        return $methodEntityCollection;
    }

    public function getAllExceptInitializations(): MethodEntityCollection
    {
        $methodEntityCollection = clone $this;
        foreach ($this as $objectId => $methodEntity) {
            try {
                /**@var MethodEntity $methodEntity */
                if ($methodEntity->isInitialization()) {
                    $methodEntityCollection->remove($objectId);
                }
            } catch (\Exception $e) {
                $this->logger->warning($e->getMessage());
            }
        }
        return $methodEntityCollection;
    }
}
