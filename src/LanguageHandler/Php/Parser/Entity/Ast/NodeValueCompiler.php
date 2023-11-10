<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
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
    public static function compile(Node\Stmt\Expression|Node $node, MethodEntity|PropertyEntity|ClassEntity $entity): mixed
    {
        if ($node instanceof Node\Stmt\Expression) {
            return self::compile($node->expr, $entity);
        }

        $constExprEvaluator = new ConstExprEvaluator(function (Node\Expr $node) use ($entity): mixed {
            try {
                $className = get_class($node);
                return match ($className) {
                    Node\Expr\ClassConstFetch::class => self::getClassConstantValue($node, $entity),
                    Node\Scalar\MagicConst\Dir::class => dirname($entity->getRelativeFileName()),
                    Node\Scalar\MagicConst\File::class => $entity->getRelativeFileName(),
                    Node\Scalar\MagicConst\Class_::class => is_a($entity, ClassEntity::class) ? $entity->getName() : $entity->getRootEntity()->getName(),
                    Node\Scalar\MagicConst\Line::class => $node->getLine(),
                    Node\Scalar\MagicConst\Namespace_::class => $entity->getNamespaceName(),
                    Node\Scalar\MagicConst\Method::class => is_a($entity, MethodEntity::class) ? $entity->getRootEntity()->getName() . '::' . $entity->getName() : '',
                    Node\Scalar\MagicConst\Trait_::class => $entity->isTrait() ? $entity->getName() : '',
                    Node\Scalar\MagicConst\Function_::class => is_a($entity, MethodEntity::class) ?  $entity->getName() : '',
                    Node\Expr\FuncCall::class => self::getFuncCallValue($node),
                    Node\Expr\New_::class => throw new \RuntimeException('Unable to compile initializer'),
                    default => throw new \RuntimeException('Not supported operation')
                };
            } catch (\Exception) {
            }

            $astPrinter = new Standard();
            $value = $astPrinter->prettyPrint([$node]);
            $op = array_reverse(explode('\\', get_class($node)))[0];
            $op = str_replace('Fetch', '', $op);
            if (str_ends_with($op, '_')) {
                return '[MagicConst:' . $value . ']';
            }
            return "[{$op}:{$value}]";
        });

        return $constExprEvaluator->evaluateDirectly($node);
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
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    private static function getClassConstantValue(
        Node\Expr\ClassConstFetch $node,
        MethodEntity|PropertyEntity|ClassEntity $entity
    ): mixed {

        $className = self::resolveClassName($node->class->toString(), $entity);
        $constantName = $node->name->toString();

        if (!$entity instanceof ClassEntity) {
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
        return $entity->getConstantValue($constantName);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private static function resolveClassName(string $className, MethodEntity|PropertyEntity|ClassEntity $entity): string
    {
        if ($className !== 'self' && $className !== 'static' && $className !== 'parent') {
            return $className;
        }
        $classEntity = $entity;
        if (!$entity instanceof ClassEntity) {
            $classEntity = $entity->getRootEntity();
        }
        return $className === 'parent' ? $classEntity->getParentClassName() : $classEntity->getName();
    }
}
