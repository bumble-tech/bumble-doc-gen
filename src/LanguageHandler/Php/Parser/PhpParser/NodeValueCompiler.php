<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\PhpParser;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Constant\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
use DI\DependencyException;
use DI\NotFoundException;
use PhpParser\ConstExprEvaluationException;
use PhpParser\ConstExprEvaluator;
use PhpParser\Node;
use PhpParser\PrettyPrinter\Standard;

final class NodeValueCompiler
{
    private function __construct()
    {
    }

    /**
     * Compile an expression from a node into a value if it possible
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    public static function compile(
        Node\Stmt\Expression|Node $node,
        MethodEntity|PropertyEntity|ConstantEntity|ClassLikeEntity $entity
    ): mixed {
        if (is_a($node, \PhpParser\Node\Expr\Array_::class)) {
            $compiledValue = [];
            foreach ($node->items as $k => $item) {
                $key = !$item->key ? $k : self::compile($item->key, $entity);
                $value = self::compile($item->value, $entity);
                $compiledValue[$key] = $value;
            }
            return $compiledValue;
        }
        if ($node instanceof Node\Stmt\Expression) {
            return self::compile($node->expr, $entity);
        }
        $constExprEvaluator = new ConstExprEvaluator(function (Node\Expr $node) use ($entity): mixed {
            $className = get_class($node);
            return match ($className) {
                Node\Expr\ClassConstFetch::class => self::getClassConstantValue($node, $entity),
                Node\Scalar\MagicConst\Dir::class => dirname($entity->getRelativeFileName()),
                Node\Scalar\MagicConst\File::class => $entity->getRelativeFileName(),
                Node\Scalar\MagicConst\Class_::class => is_a($entity, ClassLikeEntity::class) ? $entity->getName() : $entity->getRootEntity()->getName(),
                Node\Scalar\MagicConst\Line::class => $node->getLine(),
                Node\Scalar\MagicConst\Namespace_::class => $entity->getNamespaceName(),
                Node\Scalar\MagicConst\Method::class => is_a($entity, MethodEntity::class) ? $entity->getRootEntity()->getName() . '::' . $entity->getName() : '',
                Node\Scalar\MagicConst\Trait_::class => $entity->isTrait() ? $entity->getName() : '',
                Node\Scalar\MagicConst\Function_::class => is_a($entity, MethodEntity::class) ?  $entity->getName() : '',
                Node\Expr\StaticCall::class => self::getStaticCallValue($node, $entity),
                Node\Expr\StaticPropertyFetch::class => self::getStaticPropertyValue($node, $entity),
                Node\Expr\FuncCall::class => self::getFuncCallValue($node),
                Node\Expr\New_::class => throw new \RuntimeException('Unable to compile initializer'),
                default => throw new \RuntimeException('Not supported operation')
            };
        });

        try {
            return $constExprEvaluator->evaluateSilently($node);
        } catch (\Exception) {
        }
        $astPrinter = new Standard();
        return $astPrinter->prettyPrint([$node]);
    }

    private static function getFuncCallValue(Node\Expr\FuncCall $node): mixed
    {
        if (
            $node->name instanceof Node\Name &&
            $node->name->toLowerString() === 'constant' &&
            $node->args[0] instanceof Node\Arg &&
            $node->args[0]->value instanceof Node\Scalar\String_ &&
            defined($node->args[0]->value->value)
        ) {
            return constant($node->args[0]->value->value);
        }
        throw new \RuntimeException('Not supported operation');
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    private static function getStaticCallValue(
        Node\Expr\StaticCall $node,
        MethodEntity|PropertyEntity|ConstantEntity|ClassLikeEntity $entity
    ): mixed {
        $className = self::resolveClassName($node->class->toString(), $entity);
        if ($entity->getName() !== $className) {
            $entity = $entity->getRootEntityCollection()->getLoadedOrCreateNew($className);
        }
        if (!$entity->isEntityDataCanBeLoaded()) {
            throw new \RuntimeException('Entity cannot be loaded');
        }
        $methodEntity = $entity->getMethod($node->name->toString(), true);
        if (!$methodEntity) {
            return null;
        }
        return $methodEntity->getFirstReturnValue();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    private static function getStaticPropertyValue(
        Node\Expr\StaticPropertyFetch $node,
        MethodEntity|PropertyEntity|ConstantEntity|ClassLikeEntity $entity
    ): mixed {
        $className = self::resolveClassName($node->class->toString(), $entity);
        if ($entity->getName() !== $className) {
            $entity = $entity->getRootEntityCollection()->getLoadedOrCreateNew($className);
        }
        if (!$entity->isEntityDataCanBeLoaded()) {
            throw new \RuntimeException('Entity cannot be loaded');
        }
        return $entity->getPropertyEntity($node->name->toString())->getDefaultValue();
    }

    /**
     * @throws DependencyException
     * @throws ConstExprEvaluationException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private static function getClassConstantValue(
        Node\Expr\ClassConstFetch $node,
        MethodEntity|PropertyEntity|ConstantEntity|ClassLikeEntity $entity
    ): mixed {

        $className = self::resolveClassName($node->class->toString(), $entity);
        $constantName = $node->name->toString();

        if (!$entity instanceof ClassLikeEntity) {
            $entity = $entity->getRootEntity();
        }
        if ($entity->getName() !== $className) {
            $entity = $entity->getRootEntityCollection()->getLoadedOrCreateNew($className);
        }

        if ($entity->isEnum()) {
            return $entity->getEnumCaseValue($constantName);
        }

        if ($constantName === 'class') {
            return $className;
        }

        if (!$entity->isEntityDataCanBeLoaded()) {
            throw new \RuntimeException('Entity cannot be loaded');
        }

        return $entity->getConstantValue($constantName);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private static function resolveClassName(
        string $className,
        MethodEntity|PropertyEntity|ConstantEntity|ClassLikeEntity $entity
    ): string {
        if ($className !== 'self' && $className !== 'static' && $className !== 'parent') {
            return $className;
        }
        $classEntity = $entity;
        if (!$entity instanceof ClassLikeEntity) {
            $classEntity = $entity->getRootEntity();
        }
        return $className === 'parent' ? $classEntity->getParentClassName() : $classEntity->getName();
    }
}
