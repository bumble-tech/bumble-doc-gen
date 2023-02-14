<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFilterClassParser;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Plugin\Event\Parser\AfterCreationClassEntityCollection;
use BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent;
use BumbleDocGen\Plugin\PluginInterface;
use BumbleDocGen\Render\EntityDocRender\PhpClassToMd\PhpClassToMdDocRender;
use BumbleDocGen\Render\Twig\MainExtension;
use Roave\BetterReflection\Reflector\Reflector;
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

    private function getAllUsedFilters(Reflector $reflector): array
    {
        static $filters = null;
        if (is_null($filters)) {
            $filters = [];
            $mainExtensionReflection = $reflector->reflectClass(MainExtension::class);
            $bodyCode = $mainExtensionReflection->getMethod('getFilters')->getBodyCode();
            preg_match_all('/(TwigFilter\(\')(\w+)([\', ]+)(\'|new )(.*?)(\(|\')/', $bodyCode, $matches);
            foreach ($matches[5] as $k => $match) {
                $filters[$match] = [
                    'name' => $matches[2][$k],
                ];
            }
        }
        return $filters;
    }

    private function getFilterData(ClassEntityCollection $classEntityCollection, string $className): ?array
    {
        static $filtersData = [];
        $reflector = $classEntityCollection->getReflector();
        if (!array_key_exists($className, $filtersData)) {
            $filters = $this->getAllUsedFilters($reflector);
            if (!str_starts_with($className, '\\')) {
                $className = "\\{$className}";
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
