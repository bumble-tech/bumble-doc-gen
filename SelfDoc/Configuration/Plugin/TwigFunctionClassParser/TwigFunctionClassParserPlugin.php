<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\TwigFunctionClassParser;

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

final class TwigFunctionClassParserPlugin implements ClassEntityCollectionPluginInterface, EntityDocRenderPluginInterface
{
    private const TWIG_FUNCTION_DIRNAME = '/BumbleDocGen/Render/Twig/Function';
    public const PLUGIN_KEY = 'twigFunctionClassParserPlugin';
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
        return str_starts_with($classEntity->getFileName(), self::TWIG_FUNCTION_DIRNAME);
    }

    private function getAllUsedFunctions(Reflector $reflector): array
    {
        static $functions = null;
        if (is_null($functions)) {
            $functions = [];
            $mainExtensionReflection = $reflector->reflectClass(MainExtension::class);
            $bodyCode = $mainExtensionReflection->getMethod('getFunctions')->getBodyCode();
            preg_match_all('/(TwigFunction\(\')(\w+)(.*?)(new )(.*?)(\()/', $bodyCode, $matches);
            foreach ($matches[5] as $k => $match) {
                $functions[$match] = [
                    'name' => $matches[2][$k],
                ];
            }
        }
        return $functions;
    }

    private function getFunctionData(ClassEntityCollection $classEntityCollection, string $className): ?array
    {
        static $functionsData = [];
        $reflector = $classEntityCollection->getReflector();
        if (!array_key_exists($className, $functionsData)) {
            $functions = $this->getAllUsedFunctions($reflector);
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

    public function afterCreationClassEntityCollection(ClassEntityCollection $classEntityCollection): void
    {
        foreach ($classEntityCollection as $classEntity) {
            if ($this->isCustomTwigFunction($classEntity)) {
                $classEntity->loadPluginData(
                    self::PLUGIN_KEY,
                    $this->getFunctionData($classEntityCollection, $classEntity->getName())
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
            return "{$blockContent}\n\n" . $this->twig->render('twigFunctionInfoBlock.twig', [
                    'classEntity' => $classEntity,
                ]);
        }
        return $blockContent;
    }
}
