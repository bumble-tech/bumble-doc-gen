<?php

declare(strict_types=1);

namespace SelfDocConfig\Plugin\TwigFunctionClassParser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnLoadEntityDocPluginContent;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd\PhpClassToMdDocRenderer;
use DI\DependencyException;
use DI\NotFoundException;

final class TwigFunctionClassParserPlugin implements PluginInterface
{
    private const TWIG_FUNCTION_DIR_NAMES = [
        '/src/Core/Renderer/Twig/Function',
        '/src/LanguageHandler/Php/Renderer/Twig/Function'
    ];
    public const PLUGIN_KEY = 'twigFunctionClassParserPlugin';

    public function __construct(
        private FunctionClassPluginTwigEnvironment $twigEnvironment,
        private RendererContext $context,
        private Configuration $configuration,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterLoadingClassEntityCollection::class => 'afterLoadingClassEntityCollection',
            OnLoadEntityDocPluginContent::class => 'onLoadEntityDocPluginContentEvent',
        ];
    }

    /**
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
     * @throws InvalidConfigurationParameterException
     */
    public function afterLoadingClassEntityCollection(AfterLoadingClassEntityCollection $event): void
    {
        foreach ($event->getClassEntityCollection() as $classEntity) {
            if ($this->isCustomTwigFunction($classEntity) && $classEntity->isInstantiable()) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFunctionData($event->getClassEntityCollection(), $classEntity->getName()) ?? []
                );
            }
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function isCustomTwigFunction(ClassEntity $classEntity): bool
    {
        foreach (self::TWIG_FUNCTION_DIR_NAMES as $dirName) {
            if ($classEntity->implementsInterface(CustomFunctionInterface::class) && str_starts_with($classEntity->getFileName(), $dirName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    private function getAllUsedFunctions(): array
    {
        static $functions = null;
        if (is_null($functions)) {
            $functions = [];
            $twigFunctions = iterator_to_array($this->configuration->getTwigFunctions());
            foreach ($this->configuration->getLanguageHandlersCollection() as $languageHandler) {
                $twigFunctions = array_merge($twigFunctions, iterator_to_array($languageHandler->getCustomTwigFunctions($this->context)));
            }
            foreach ($twigFunctions as $function) {
                $functions[$function::class] = $function::getName();
            }
        }
        return $functions;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private function getFunctionData(ClassEntityCollection $classEntityCollection, string $className): ?array
    {
        static $functionsData = [];
        if (!array_key_exists($className, $functionsData)) {
            $functions = $this->getAllUsedFunctions();
            if (!isset($functions[$className])) {
                return null;
            }
            $entity = $classEntityCollection->getEntityByClassName($className);
            if (str_starts_with($entity->getFileName(), '/selfdoc')) {
                return null;
            }

            $functionData['name'] = $functions[$className];
            $method = $entity->getMethodEntityCollection()->get('__invoke');
            $functionData['parameters'] = $method->getParameters();
            $functionsData[$className] = $functionData;
        }
        return $functionsData[$className];
    }
}
