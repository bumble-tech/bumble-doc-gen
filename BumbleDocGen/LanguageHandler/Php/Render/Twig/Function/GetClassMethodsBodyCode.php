<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Render\Twig\Function\CustomFunctionInterface;

/**
 * Get the code of the specified class methods as a formatted string
 *
 * @example {{ getClassMethodsBodyCode('\\BumbleDocGen\\Render\\Twig\\MainExtension', ['getFunctions']) }}
 */
final class GetClassMethodsBodyCode implements CustomFunctionInterface
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    public static function getName(): string
    {
        return 'getClassMethodsBodyCode';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $className
     *  The name of the class whose methods are to be retrieved
     *
     * @param array $methodsNames
     *  List of class methods whose code needs to be retrieved
     */
    public function __invoke(string $className, array $methodsNames): ?string
    {
        $classEntityCollection = $this->context->getClassEntityCollection();
        $classEntity = $classEntityCollection->getLoadedOrCreateNew($className);
        if ($classEntity->entityDataCanBeLoaded()) {
            $methodsCode = [];
            $methodEntityCollection = $classEntity->getMethodEntityCollection();
            $addIndentFromLeft = new AddIndentFromLeft();
            foreach ($methodsNames as $methodName) {
                $method = $methodEntityCollection->unsafeGet($methodName);
                if ($method) {
                    $bodyCode = "{$method->getModifiersString()} {$method->getName()}({$method->getParametersString()}): {$method->getReturnType()}\n";
                    $bodyCode .= "{\n";
                    $bodyCode .= "{$addIndentFromLeft($method->getBodyCode(), 4)}\n";
                    $bodyCode .= "}";
                    $methodsCode[] = $bodyCode;
                }
            }
            return implode("\n\n", $methodsCode);
        }
        return null;
    }
}
