<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator\Internal;

use Psr\Cache\CacheItemPoolInterface;
use Roave\BetterReflection\Identifier\Identifier;
use Roave\BetterReflection\Identifier\IdentifierType;
use Roave\BetterReflection\Reflection\Reflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

use function array_key_exists;
use function spl_object_hash;
use function sprintf;

/**
 * @internal
 */
final class CachedSourceLocator implements SourceLocator
{
    /** @var array<string, Reflection|null> indexed by reflector key and identifier cache key */
    private array $cacheByIdentifierKeyAndOid = [];

    /** @var array<string, list<Reflection>> indexed by reflector key and identifier type cache key */
    private array $cacheByIdentifierTypeKeyAndOid = [];

    public function __construct(private SourceLocator $wrappedSourceLocator, private CacheItemPoolInterface $cache)
    {
    }

    public function locateIdentifier(Reflector $reflector, Identifier $identifier): ?Reflection
    {
        $cacheKey = $this->identifierToCacheKey($identifier);
        if (array_key_exists($cacheKey, $this->cacheByIdentifierKeyAndOid)) {
            return $this->cacheByIdentifierKeyAndOid[$cacheKey];
        }

        $locateIdentifier = null;
        if ($this->cache->hasItem($cacheKey)) {
            $cachedData = $this->cache->getItem($cacheKey)->get();
            if (file_exists($cachedData['fileName']) && md5_file($cachedData['fileName']) === $cachedData['fileHash']) {
                $locateIdentifier = $cachedData['className']::createFromNode(
                    $reflector,
                    $cachedData['node'],
                    $cachedData['locatedSource'],
                    $cachedData['namespaceAst']
                );
            } else {
                $this->cache->deleteItem($cacheKey);
            }
        }

        if (is_null($locateIdentifier)) {
            $locateIdentifier = $this->wrappedSourceLocator->locateIdentifier($reflector, $identifier);
            if (is_a($locateIdentifier, ReflectionClass::class)) {
                $node = $locateIdentifier->getAst();
                $locatedSource = $locateIdentifier->getLocatedSource();
                $namespaceAst = $locateIdentifier->getDeclaringNamespaceAst();
                $className = get_class($locateIdentifier);
                $cacheItem = $this->cache->getItem($cacheKey);
                $cacheItem->set([
                    'className' => $className,
                    'node' => $node,
                    'locatedSource' => $locatedSource,
                    'namespaceAst' => $namespaceAst,
                    'fileName' => $locateIdentifier->getFileName(),
                    'fileHash' => md5_file($locateIdentifier->getFileName()),
                ]);
                $this->cache->save($cacheItem);
            }
        }
        return $this->cacheByIdentifierKeyAndOid[$cacheKey] = $locateIdentifier;
    }

    /**
     * @return list<Reflection>
     */
    public function locateIdentifiersByType(Reflector $reflector, IdentifierType $identifierType): array
    {
        $cacheKey = sprintf(
            '%s_%s',
            $this->reflectorCacheKey($reflector),
            $this->identifierTypeToCacheKey($identifierType)
        );

        if (array_key_exists($cacheKey, $this->cacheByIdentifierTypeKeyAndOid)) {
            return $this->cacheByIdentifierTypeKeyAndOid[$cacheKey];
        }

        return $this->cacheByIdentifierTypeKeyAndOid[$cacheKey] = $this->wrappedSourceLocator->locateIdentifiersByType(
            $reflector,
            $identifierType
        );
    }

    private function reflectorCacheKey(Reflector $reflector): string
    {
        return sprintf('type:%s#oid:%s', $reflector::class, spl_object_hash($reflector));
    }

    private function identifierToCacheKey(Identifier $identifier): string
    {
        $nameElements = explode('\\', $identifier->getName());
        $name = array_pop($nameElements);
        return str_replace(
            ['\\', '/'],
            '_',
            sprintf(
                '%s' . DIRECTORY_SEPARATOR . '%s_name_%s',
                implode(DIRECTORY_SEPARATOR, $nameElements),
                $this->identifierTypeToCacheKey($identifier->getType()),
                $name,
            )
        );
    }

    private function identifierTypeToCacheKey(IdentifierType $identifierType): string
    {
        return sprintf('type_%s', $identifierType->getName());
    }
}
