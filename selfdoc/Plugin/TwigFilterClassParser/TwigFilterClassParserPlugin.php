<?php

declare(strict_types=1);

namespace SelfDocConfig\Plugin\TwigFilterClassParser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnLoadEntityDocPluginContent;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Twig\Filter\CustomFilterInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd\PhpClassToMdDocRenderer;
use DI\DependencyException;
use DI\NotFoundException;

final class TwigFilterClassParserPlugin implements PluginInterface
{
    private const TWIG_FILTER_DIR_NAMES = [
        '/src/Core/Renderer/Twig/Filter',
        '/src/LanguageHandler/Php/Renderer/Twig/Filter'
    ];
    public const PLUGIN_KEY = 'twigFilterClassParserPlugin';

    public function __construct(
        private FilterClassPluginTwigEnvironment $twigEnvironment,
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
        if (
            $event->getBlockType() !== PhpClassToMdDocRenderer::BLOCK_AFTER_MAIN_INFO
        ) {
            return;
        }

        $entity = $event->getEntity();
        if (!is_a($entity, ClassLikeEntity::class) || !$this->isCustomTwigFilter($event->getEntity())) {
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
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function afterLoadingClassEntityCollection(AfterLoadingClassEntityCollection $event): void
    {
        foreach ($event->getClassEntityCollection() as $classEntity) {
            if ($this->isCustomTwigFilter($classEntity)) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFilterData($event->getClassEntityCollection(), $classEntity->getName()) ?? []
                );
            }
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function isCustomTwigFilter(ClassLikeEntity $classEntity): bool
    {
        foreach (self::TWIG_FILTER_DIR_NAMES as $dirName) {
            if (!$classEntity->isEntityDataCanBeLoaded()) {
                continue;
            }
            if (str_starts_with($classEntity->getRelativeFileName(), $dirName) && $classEntity->implementsInterface(CustomFilterInterface::class)) {
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
    private function getAllUsedFilters(): array
    {
        static $filters = null;
        if (is_null($filters)) {
            $filters = [];
            $twigFilters = iterator_to_array($this->configuration->getTwigFilters());
            foreach ($this->configuration->getLanguageHandlersCollection() as $languageHandler) {
                $twigFilters = array_merge($twigFilters, iterator_to_array($languageHandler->getCustomTwigFilters($this->context)));
            }
            foreach ($twigFilters as $filter) {
                $filters[$filter::class] = $filter::getName();
            }
        }
        return $filters;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    private function getFilterData(ClassEntityCollection $entityCollection, string $className): ?array
    {
        static $filtersData = [];
        if (!array_key_exists($className, $filtersData)) {
            $filters = $this->getAllUsedFilters();
            if (!isset($filters[$className])) {
                return null;
            }

            $functionData['name'] = $filters[$className];
            $entity = $entityCollection->getEntityByClassName($className);
            $method = $entity->getMethodEntityCollection()->get('__invoke');
            $functionData['parameters'] = $method->getParameters();
            $filtersData[$className] = $functionData;
        }
        return $filtersData[$className];
    }
}
