<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;

/**
 * Checking the existence of an entity in the specified directories
 */
final class LocatedInCondition implements ConditionInterface
{
    public function __construct(
        private Configuration             $configuration,
        private ConfigurationParameterBag $parameterBag,
        private array                     $directories = [],
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function canAddToCollection(EntityInterface $entity): bool
    {
        $fileName = $entity->getAbsoluteFileName();
        foreach ($this->directories as $directory) {
            $directory = $this->parameterBag->resolveValue($directory);
            if (!str_starts_with($directory, DIRECTORY_SEPARATOR)) {
                $directory = rtrim($this->configuration->getProjectRoot(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $directory;
            }
            $directory = realpath($directory);
            if ($directory && str_starts_with($fileName, $directory)) {
                return true;
            }
        }
        return false;
    }
}
