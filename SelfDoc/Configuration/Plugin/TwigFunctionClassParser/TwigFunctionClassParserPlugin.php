<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFunctionClassParser;

use BumbleDocGen\Core\Plugin\Event\Render\OnLoadEntityDocPluginContent;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Render\Twig\MainExtension;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigFunctionClassParserPlugin implements PluginInterface
{
    private const TWIG_FUNCTION_DIRNAME = '/BumbleDocGen/Render/Twig/Function';
    public const PLUGIN_KEY = 'twigFunctionClassParserPlugin';

    public static function getSubscribedEvents()
    {
        return [
            AfterLoadingClassEntityCollection::class => 'afterLoadingClassEntityCollection',
            OnLoadEntityDocPluginContent::class => 'onLoadEntityDocPluginContentEvent',
        ];
    }

    public function onLoadEntityDocPluginContentEvent(OnLoadEntityDocPluginContent $event): void
    {
        if ($event->getBlockType() !== PhpClassToMdDocRender::BLOCK_AFTER_MAIN_INFO) {
            return;
        }

        $entity = $event->getEntity();
        if (!is_a($entity, ClassEntity::class) || !$this->isCustomTwigFunction($event->getEntity())) {
            return;
        }

        try {
            $pluginResult = $this->getTwig()->render('twigFunctionInfoBlock.twig', [
                'classEntity' => $entity,
            ]);
        } catch (\Exception) {
            $pluginResult = '';
        }

        $event->addBlockContentPluginResult($pluginResult);
    }

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

    private function getTwig(): Environment
    {
        static $twig;
        if (!$twig) {
            $loader = new FilesystemLoader([
                __DIR__ . '/templates/',
            ]);
            $twig = new Environment($loader);
        }
        return $twig;
    }

    private function isCustomTwigFunction(ClassEntity $classEntity): bool
    {
        return str_starts_with($classEntity->getFileName(), self::TWIG_FUNCTION_DIRNAME);
    }

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
