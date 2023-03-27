<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueTransformer;

use DI\Container;

final class ValueToClassTransformer implements ValueTransformerInterface
{
    public function __construct(private Container $diContainer)
    {
    }

    public function canTransform(mixed $value): bool
    {
        return is_array($value) && isset($value['class']) && class_exists($value['class']);
    }

    public function transform(mixed $value): ?object
    {
        if (!$this->canTransform($value)) {
            return null;
        }

        try {
            if (!isset($value['arguments'])) {
                return $this->diContainer->get($value['class']);
            }

            $arguments = [];
            foreach ($value['arguments'] as $k => $argument) {
                if($this->canTransform($argument)){
                    $argument = $this->transform($argument);
                }
                $arguments[$k] = $argument;
            }

            return new $value['class'](...$arguments);
        } catch (\Exception $e) {
            var_dump($e->getMessage());die();
        }
        return null;
    }
}
