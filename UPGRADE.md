# Upgrade Documentation

This document serves as a reference for updating your current version of the BumbleDocGen library regarding deprecation or backward compatibility issues.

## Upgrading from BumbleDocGen 1.6.0 to 2.0.0

* The BetterReflection library and classes that depend on it in the code have been removed:
  * `\BumbleDocGen\Core\Cache\SourceLocatorCacheItemPool`
  * `\BumbleDocGen\Core\Plugin\Event\Parser\OnLoadSourceLocatorsCollection`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\AsyncSourceLocator`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\CustomSourceLocatorInterface`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\CachedSourceLocator`
  * `\BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator\Internal\SystemAsyncSourceLocator`
* Class `\BumbleDocGen\LanguageHandler\Php\Parser\ComposerParser` renamed to `\BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper`
* Doc block parsing has been removed:
    * `\Roave\BetterReflection\Reflection\ReflectionMethod::getDocBlockReturnTypes()`
    * `\Roave\BetterReflection\Reflection\ReflectionFunction::getDocBlockReturnTypes()`
    * `\Roave\BetterReflection\Reflection\ReflectionParameter::getDocBlockTypes()`
    * `\Roave\BetterReflection\Reflection\ReflectionParameter::getDocBlockTypeStrings()`
    * `\Roave\BetterReflection\Reflection\ReflectionProperty::getDocBlockTypes()`
    * `\Roave\BetterReflection\Reflection\ReflectionProperty::getDocBlockTypeStrings()`
* Method `\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity::hasAnnotationKey()` has been removed.
* Method `\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity::getExtends()` has been removed.
* Method `\BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity::getInterfacesString()` has been removed.
* Now documentation for built classes does not load automatically
* Removed the `async_source_loading_enabled` configuration option (Method `\BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings::asyncSourceLoadingEnabled()`)
