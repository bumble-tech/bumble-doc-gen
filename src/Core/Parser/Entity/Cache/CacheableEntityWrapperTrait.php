<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;

trait CacheableEntityWrapperTrait
{
    use CacheableEntityTrait;

    #[Inject] private GenerationErrorsHandler $generationErrorsHandler;
    private bool $noCacheMode = false;

    abstract public function isEntityFileCanBeLoad(): bool;

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    final protected function getWrappedMethodResult(
        string $methodName,
        array $funcArgs,
        string $getCacheKeyGeneratorClassName,
        string $cacheNamespace,
        int $cacheExpiresAfter
    ) {
        if ($this->noCacheMode) {
            return call_user_func_array([parent::class, $methodName], $funcArgs);
        }

        $cacheKey = $getCacheKeyGeneratorClassName::generateKey(
            $cacheNamespace,
            $this,
            $funcArgs
        );

        if ($this->hasEntityCacheValue($cacheKey) && !$this->entityCacheIsOutdated()) {
            $methodReturnValue = $this->getEntityCacheValue($cacheKey);
        } else {
            $errorsBeforeGenerationCount = count($this->generationErrorsHandler->getRecords());
            $methodReturnValue = call_user_func_array([parent::class, $methodName], $funcArgs);
            $this->noCacheMode = true;
            $errorsCount = count($this->generationErrorsHandler->getRecords());
            if ($errorsCount === $errorsBeforeGenerationCount && $this->isEntityFileCanBeLoad()) {
                $this->addEntityValueToCache($cacheKey, $methodReturnValue, $cacheExpiresAfter);
            }
            $this->noCacheMode = false;
        }
        return $methodReturnValue;
    }
}
