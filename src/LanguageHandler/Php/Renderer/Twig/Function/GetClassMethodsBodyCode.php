<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Get the code of the specified class methods as a formatted string
 *
 * @example {{ getClassMethodsBodyCode('\\BumbleDocGen\\Renderer\\Twig\\MainExtension', ['getFunctions']) }}
 */
final class GetClassMethodsBodyCode implements CustomFunctionInterface
{
    public function __construct(private RootEntityCollectionsGroup $rootEntityCollectionsGroup)
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
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(string $className, array $methodsNames): ?string
    {
        $classEntityCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::NAME);
        if (!is_a($classEntityCollection, ClassEntityCollection::class)) {
            return null;
        }
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
