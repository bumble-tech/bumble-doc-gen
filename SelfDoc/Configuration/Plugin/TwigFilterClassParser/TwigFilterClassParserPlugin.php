<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFilterClassParser;

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

final class TwigFilterClassParserPlugin implements PluginInterface
{
    private const TWIG_FILTER_DIRNAME = '/BumbleDocGen/Renderer/Twig/Filter';
    public const PLUGIN_KEY = 'twigFilterClassParserPlugin';

    public function __construct(
        private FilterClassPluginTwigEnvironment $twigEnvironment
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
        if (
            $event->getBlockType() !== PhpClassToMdDocRenderer::BLOCK_AFTER_MAIN_INFO
        ) {
            return;
        }

        $entity = $event->getEntity();
        if (!is_a($entity, ClassEntity::class) || !$this->isCustomTwigFunction($event->getEntity())) {
            return;
        }

        try {
            $pluginResult = $this->twigEnvironment->render('twigFilterInfoBlock.twig', [
                'classEntity' => $entity,
            ]);
        } catch (\Exception) {
            $pluginResult = '';
        }

        $event->addBlockContentPluginResult($pluginResult);
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function afterLoadingClassEntityCollection(AfterLoadingClassEntityCollection $event): void
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

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    private function isCustomTwigFunction(ClassEntity $classEntity): bool
    {
        return str_starts_with($classEntity->getFileName(), self::TWIG_FILTER_DIRNAME);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws DependencyException
     * @throws ReflectionException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
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
