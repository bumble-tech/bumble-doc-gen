<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal;

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
        Locator $astLocator,
        private array $psr4FileMap,
        private array $classMap
    ) {
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

    public static function getClassLoader(array $psr4FileMap, array $classMap): \Composer\Autoload\ClassLoader
    {
        static $classLoaders = [];
        $key = md5(serialize($psr4FileMap) . serialize($classMap));
        if (!array_key_exists($key, $classLoaders)) {
            $classLoader = new \Composer\Autoload\ClassLoader();
            foreach ($psr4FileMap as $prefix => $path) {
                $classLoader->addPsr4($prefix, $path);
            }
            $classLoader->addClassMap($classMap);
            $classLoaders[$key] = $classLoader;
        } else {
            $classLoader = $classLoaders[$key];
        }
        return $classLoader;
    }

    public function getLocatedSource(string $className): ?LocatedSource
    {
        $classLoader = self::getClassLoader($this->psr4FileMap, $this->classMap);
        if ($fileName = $classLoader->findFile($className)) {
            return new LocatedSource(
                file_get_contents($fileName), $className, $fileName
            );
        }
        return null;
    }
}
