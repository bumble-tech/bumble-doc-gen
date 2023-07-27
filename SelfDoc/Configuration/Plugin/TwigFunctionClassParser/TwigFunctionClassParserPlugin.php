<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFunctionClassParser;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnLoadEntityDocPluginContent;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Twig\MainExtension;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd\PhpClassToMdDocRenderer;
use DI\DependencyException;
use DI\NotFoundException;

final class TwigFunctionClassParserPlugin implements PluginInterface
{
    private const TWIG_FUNCTION_DIR_NAMES = [
        '/BumbleDocGen/Core/Renderer/Twig/Function',
        '/BumbleDocGen/LanguageHandler/Php/Renderer/Twig/Function'
    ];
    public const PLUGIN_KEY = 'twigFunctionClassParserPlugin';

    public function __construct(
        private FunctionClassPluginTwigEnvironment $twigEnvironment
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterLoadingClassEntityCollection::class => 'afterLoadingClassEntityCollection',
            OnLoadEntityDocPluginContent::class => 'onLoadEntityDocPluginContentEvent',
        ];
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function onLoadEntityDocPluginContentEvent(OnLoadEntityDocPluginContent $event): void
    {
        if ($event->getBlockType() !== PhpClassToMdDocRenderer::BLOCK_AFTER_MAIN_INFO) {
            return;
        }

        $entity = $event->getEntity();
        if (!is_a($entity, ClassEntity::class) || !$this->isCustomTwigFunction($event->getEntity())) {
            return;
        }

        try {
            $pluginResult = $this->twigEnvironment->render('twigFunctionInfoBlock.twig', [
                'classEntity' => $entity,
            ]);
        } catch (\Exception) {
            $pluginResult = '';
        }

        $event->addBlockContentPluginResult($pluginResult);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function afterLoadingClassEntityCollection(AfterLoadingClassEntityCollection $event): void
    {
        foreach ($event->getClassEntityCollection() as $classEntity) {
            if ($this->isCustomTwigFunction($classEntity)) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFunctionData($event->getClassEntityCollection(), $classEntity->getName()) ?? []
                );
            }
        }
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    private function isCustomTwigFunction(ClassEntity $classEntity): bool
    {
        foreach (self::TWIG_FUNCTION_DIR_NAMES as $dirName) {
            if (str_starts_with($classEntity->getFileName(), $dirName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    private function getAllUsedFunctions(ClassEntityCollection $classEntityCollection): array
    {
        static $functions = null;
        if (is_null($functions)) {
            $functions = [];
            $mainExtensionReflection = $classEntityCollection->getLoadedOrCreateNew(MainExtension::class);
            $bodyCode = $mainExtensionReflection->getMethodEntity('setDefaultFunctions')->getBodyCode();
            preg_match_all('/(new )([^(]+)/', $bodyCode, $matches);
            foreach ($matches[2] as $match) {
                $functions[$match] = [
                    'name' => $match::getName(),
                ];
            }
        }
        return $functions;
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private function getFunctionData(ClassEntityCollection $classEntityCollection, string $className): ?array
    {
        static $functionsData = [];
        if (!array_key_exists($className, $functionsData)) {
            $functions = $this->getAllUsedFunctions($classEntityCollection);
            if (!str_starts_with($className, '\\')) {
                $className = "\\{$className}";
            }

            if (!isset($functions[$className])) {
                return null;
            }

            $functionData = $functions[$className];
            $entity = $classEntityCollection->getEntityByClassName($className);
            $method = $entity->getMethodEntityCollection()->get('__invoke');
            $functionData['parameters'] = $method->getParameters();
            $functionsData[$className] = $functionData;
        }
        return $functionsData[$className];
    }
}
