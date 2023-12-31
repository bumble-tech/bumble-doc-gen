<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

use BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use Psr\Cache\InvalidArgumentException;
use Roave\BetterReflection\Identifier\Identifier;
use Roave\BetterReflection\Identifier\IdentifierType;
use Roave\BetterReflection\Reflection\Reflection;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Located\LocatedSource;
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

    public function __construct(
        private SourceLocator $sourceLocator,
        private Configuration $configuration,
        private SourceLocatorCacheItemPool $cache
    ) {
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
     */
    public function locateIdentifier(Reflector $reflector, Identifier $identifier): ?Reflection
    {
        $cacheKey = $this->identifierToCacheKey($identifier);
        if (array_key_exists($cacheKey, $this->cacheByIdentifierKeyAndOid)) {
            return $this->cacheByIdentifierKeyAndOid[$cacheKey];
        }

        $locateIdentifier = null;
        if ($this->cache->hasItem($cacheKey)) {
            $cachedData = $this->cache->getItem($cacheKey)->get();

            $actualFileName = null;
            if ($cachedData['fileName']) {
                $actualFileName = $this->configuration->getProjectRoot() . $cachedData['fileName'];
            }

            if (
                (!$actualFileName ||
                    file_exists($actualFileName) && md5_file($actualFileName) === $cachedData['fileHash']) &&
                isset($cachedData['locatedSourceSource']) && isset($cachedData['locatedSourceName'])
            ) {
                $locatedSource = new LocatedSource(
                    $cachedData['locatedSourceSource'],
                    $cachedData['locatedSourceName'],
                    $actualFileName
                );

                $locateIdentifier = $cachedData['className']::createFromNode(
                    $reflector,
                    $cachedData['node'],
                    $locatedSource,
                    $cachedData['namespaceAst']
                );
            } else {
                $this->cache->deleteItem($cacheKey);
            }
        }

        if (is_null($locateIdentifier)) {
            $locateIdentifier = $this->sourceLocator->locateIdentifier($reflector, $identifier);
            if (is_a($locateIdentifier, ReflectionClass::class)) {
                $node = $locateIdentifier->getAst();
                $locatedSource = $locateIdentifier->getLocatedSource();
                $namespaceAst = $locateIdentifier->getDeclaringNamespaceAst();
                $className = get_class($locateIdentifier);
                $cacheItem = $this->cache->getItem($cacheKey);
                $actualFileName = $locateIdentifier->getFileName() ? str_replace($this->configuration->getProjectRoot(), '', $locateIdentifier->getFileName()) : null;
                $cacheItem->set([
                    'className' => $className,
                    'node' => $node,
                    'locatedSource' => $locatedSource,
                    'namespaceAst' => $namespaceAst,
                    'fileName' => $actualFileName,
                    'locatedSourceName' => $locateIdentifier->getLocatedSource()->getName(),
                    'locatedSourceSource' => $locateIdentifier->getLocatedSource()->getSource(),
                    'fileHash' => $locateIdentifier->getFileName() ? md5_file($locateIdentifier->getFileName()) : null,
                ]);
                if (!$locateIdentifier->getFileName()) {
                    $cacheItem->expiresAfter(604800);
                }
                $this->cache->save($cacheItem);
            }
        }
        return $this->cacheByIdentifierKeyAndOid[$cacheKey] = $locateIdentifier;
    }

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

        return $this->cacheByIdentifierTypeKeyAndOid[$cacheKey] = $this->sourceLocator->locateIdentifiersByType(
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
