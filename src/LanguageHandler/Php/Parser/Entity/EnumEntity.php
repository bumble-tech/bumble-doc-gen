<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\NodeValueCompiler;
use PhpParser\ConstExprEvaluationException;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\EnumCase as EnumCaseNode;

/**
 * Enumeration
 *
 * @see https://www.php.net/manual/en/language.enumerations.php
 */
class EnumEntity extends ClassLikeEntity
{
    public function isEnum(): bool
    {
        return true;
    }

    public function getInterfaceNames(): array
    {
        return [];
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getEnumCases(): array
    {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }

        $enumCases = [];
        /** @var EnumCaseNode[] $enumCaseNodes */
        $enumCaseNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Stmt $stmt): bool => $stmt instanceof EnumCaseNode,
        );

        foreach ($enumCaseNodes as $enumCaseNode) {
            $enumCases[$enumCaseNode->name->toString()] = $enumCaseNode->expr ? NodeValueCompiler::compile($enumCaseNode->expr, $this) : null;
        }
        return $enumCases;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    public function getCasesNames(): array
    {
        return array_keys($this->getEnumCases());
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    public function getEnumCaseValue(string $name): mixed
    {
        return $this->getEnumCases()[$name] ?? null;
    }

    public function getModifiersString(): string
    {
        return 'enum';
    }
}
