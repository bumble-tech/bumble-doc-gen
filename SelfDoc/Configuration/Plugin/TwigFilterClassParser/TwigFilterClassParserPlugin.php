<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFilterClassParser;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterCreationClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent;
use BumbleDocGen\Plugin\PluginInterface;
use BumbleDocGen\Render\Twig\MainExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigFilterClassParserPlugin implements PluginInterface
{
    private const TWIG_FILTER_DIRNAME = '/BumbleDocGen/Render/Twig/Filter';
    public const PLUGIN_KEY = 'twigFilterClassParserPlugin';

    public static function getSubscribedEvents()
    {
        return [
            AfterCreationClassEntityCollection::class => 'afterCreationClassEntityCollection',
            OnLoadEntityDocPluginContent::class => 'onLoadEntityDocPluginContentEvent',
        ];
    }

    public function onLoadEntityDocPluginContentEvent(OnLoadEntityDocPluginContent $event): void
    {
        if (
            $event->getBlockType() !== PhpClassToMdDocRender::BLOCK_AFTER_MAIN_INFO ||
            !$this->isCustomTwigFunction($event->getClassEntity())
        ) {
            return;
        }

        try {
            $pluginResult = $this->getTwig()->render('twigFilterInfoBlock.twig', [
                'classEntity' => $event->getClassEntity(),
            ]);
        } catch (\Exception) {
            $pluginResult = '';
        }

        $event->addBlockContentPluginResult($pluginResult);
    }

    public function afterCreationClassEntityCollection(AfterCreationClassEntityCollection $event): void
    {
        foreach ($event->getClassEntityCollection() as $classEntity) {
            if ($this->isCustomTwigFunction($classEntity)) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFilterData($event->getClassEntityCollection(), $classEntity->getName()) ?? []
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
        return str_starts_with($classEntity->getFileName(), self::TWIG_FILTER_DIRNAME);
    }

    private function getAllUsedFilters(ClassEntityCollection $classEntityCollection): array
    {
        static $filters = null;
        if (is_null($filters)) {
            $filters = [];
            $mainExtensionReflection = $classEntityCollection->getLoadedOrCreateNew(MainExtension::class);
            $bodyCode = $mainExtensionReflection->getMethodEntity('setDefaultFilters')->getBodyCode();
            preg_match_all('/(new )([^(]+)/', $bodyCode, $matches);
            foreach ($matches[2] as $match) {
                $filters[$match] = [
                    'name' => $match::getName(),
                ];
            }
        }
        return $filters;
    }

    private function getFilterData(ClassEntityCollection $classEntityCollection, string $className): ?array
    {
        static $filtersData = [];
        if (!array_key_exists($className, $filtersData)) {
            $filters = $this->getAllUsedFilters($classEntityCollection);
            if (!str_starts_with($className, '\\')) {
                $className = "\\{$className}";
            }

            if (!isset($filters[$className])) {
                return null;
            }

            $functionData = $filters[$className];
            $entity = $classEntityCollection->getEntityByClassName($className);
            $method = $entity->getMethodEntityCollection()->get('__invoke');
            $functionData['parameters'] = $method->getParameters();
            $filtersData[$className] = $functionData;
        }
        return $filtersData[$className];
    }
}
