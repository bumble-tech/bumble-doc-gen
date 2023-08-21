<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use Composer\Autoload\ClassLoader;
use InvalidArgumentException;
use Roave\BetterReflection\Identifier\Identifier;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Exception\InvalidFileLocation;
use Roave\BetterReflection\SourceLocator\Located\LocatedSource;
use Roave\BetterReflection\SourceLocator\Type\AbstractSourceLocator;

/**
 * @internal
 */
final class SystemAsyncSourceLocator extends AbstractSourceLocator
{
    public function __construct(
        Locator                  $astLocator,
        private LocalObjectCache $localObjectCache,
        private array            $psr4FileMap,
        private array            $classMap
    )
    {
        parent::__construct($astLocator);
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException
     * @throws InvalidFileLocation
     */
    protected function createLocatedSource(Identifier $identifier): ?LocatedSource
    {
        if (!$identifier->isClass()) {
            return null;
        }
        return $this->getLocatedSource($identifier->getName());
    }

    public function getClassLoader(array $psr4FileMap, array $classMap): ClassLoader
    {
        $key = md5(serialize($psr4FileMap) . serialize($classMap));
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $key);
        } catch (ObjectNotFoundException) {
        }
        $classLoader = new ClassLoader();
        foreach ($psr4FileMap as $prefix => $path) {
            $classLoader->addPsr4($prefix, $path);
        }
        $classLoader->addClassMap($classMap);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $key, $classLoader);
        return $classLoader;
    }

    public function getLocatedSource(string $className): ?LocatedSource
    {
        $classLoader = $this->getClassLoader($this->psr4FileMap, $this->classMap);
        if ($fileName = $classLoader->findFile($className)) {
            return new LocatedSource(
                file_get_contents($fileName), $className, $fileName
            );
        }
        return null;
    }
}
