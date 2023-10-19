<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueTransformer;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;

use function BumbleDocGen\Core\is_associative_array;

/**
 * Standard text-to-class transformer
 *
 * @example # The list of class names will be converted to an array of objects
 *  someKey:
 *      - class: \Namespace\ClassName
 *      - class: \Namespace\ClassName2
 *
 *
 * @example # One class in configuration will be converted to one object
 *  someKey:
 *      class: \Namespace\ClassName
 *
 * @example # One class in configuration will be converted to one object. The constructor takes arguments to be passed (not via DI)
 *   someKey:
 *       class: \Namespace\ClassName
 *       arguments:
 *           - arg1: value1
 *           - arg2: value2
 *
 */
final class ValueToClassTransformer implements ValueTransformerInterface
{
    public function __construct(private Container $diContainer)
    {
    }

    public function canTransform(mixed $value): bool
    {
        return $this->isClassValue($value) && is_string($value['class']) && class_exists($value['class']);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function transform(mixed $value): ?object
    {
        if (!$this->canTransform($value)) {
            return null;
        }

        if (!isset($value['arguments'])) {
            return $this->diContainer->get($value['class']);
        }

        $arguments = [];
        foreach ($value['arguments'] as $k => $argument) {
            if ($this->isClassValue($argument)) {
                $argument = $this->transform($argument);
                if (is_null($argument)) {
                    return null;
                }
            }
            $arguments[$k] = $argument;
        }
        if (!is_associative_array($arguments)) {
            return new $value['class'](...$arguments);
        }
        return $this->diContainer->make($value['class'], $arguments);
    }

    private function isClassValue(mixed $value): bool
    {
        return is_array($value) && isset($value['class']);
    }
}
