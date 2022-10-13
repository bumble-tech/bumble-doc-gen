<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFilterClassParser;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\Plugin\EntityDocRenderPluginInterface;
use BumbleDocGen\Plugin\ClassEntityCollectionPluginInterface;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\EntityDocRender\PhpClassToRst\PhpClassToRstDocRender;
use BumbleDocGen\Render\Twig\MainExtension;
use Roave\BetterReflection\Reflector\Reflector;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigFilterClassParserPlugin implements ClassEntityCollectionPluginInterface, EntityDocRenderPluginInterface
{
    private const TWIG_FILTER_DIRNAME = '/BumbleDocGen/Render/Twig/Filter';
    public const PLUGIN_KEY = 'twigFilterClassParserPlugin';
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates/',
        ]);
        $this->twig = new Environment($loader);
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

    public function afterCreationClassEntityCollection(ClassEntityCollection $classEntityCollection): void
    {
        foreach ($classEntityCollection as $classEntity) {
            if ($this->isCustomTwigFunction($classEntity)) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFilterData($classEntityCollection, $classEntity->getName())
                );
            }
        }
    }

    public function handleTemplateBlockContent(
        string $blockContent,
        ClassEntity $classEntity,
        string $blockType,
        Context $context
    ): string {
        if (
            $blockType == PhpClassToRstDocRender::BLOCK_AFTER_MAIN_INFO && $this->isCustomTwigFunction($classEntity)
        ) {
            return "{$blockContent}\n\n" . $this->twig->render('twigFilterInfoBlock.twig', [
                    'classEntity' => $classEntity,
                ]);
        }
        return $blockContent;
    }
}
