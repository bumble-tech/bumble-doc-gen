<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\DocBlockFactoryInterface;
use phpDocumentor\Reflection\Exception\PcreException;
use phpDocumentor\Reflection\FqsenResolver;
use phpDocumentor\Reflection\PseudoType;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Utils;

/**
 * Adding links to the documentation of PHP classes in the \phpDocumentor namespace
 */
final class PhpDocumentorStubberPlugin implements PluginInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
            OnCheckIsClassEntityCanBeLoad::class => 'onCheckIsClassEntityCanBeLoad',
        ];
    }

    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = $event->getResourceName();
            if (!str_starts_with($resourceName, '\\')) {
                $resourceName = "\\{$resourceName}";
            }
            if (str_starts_with($resourceName, '\\phpDocumentor\\Reflection\\')) {
                $resourceName = explode('::', $resourceName)[0];
                if (
                    in_array(ltrim($resourceName, '\\'), [
                        DocBlock::class,
                        DocBlockFactory::class,
                        DocBlockFactoryInterface::class,
                        Utils::class,
                        PcreException::class,
                    ]) || str_starts_with($resourceName, '\\phpDocumentor\\Reflection\\DocBlock\\')
                ) {
                    $resource = str_replace(['\\phpDocumentor\\Reflection\\', '\\'], ['', '/'], $resourceName);
                    $event->setResourceUrl("https://github.com/phpDocumentor/ReflectionDocBlock/blob/master/src/{$resource}.php");
                    return;
                }

                if (
                    in_array(ltrim($resourceName, '\\'), [
                        Type::class,
                        TypeResolver::class,
                        PseudoType::class,
                        FqsenResolver::class,
                    ]) ||
                    str_starts_with($resourceName, '\\phpDocumentor\\Reflection\\Types\\') ||
                    str_starts_with($resourceName, '\\phpDocumentor\\Reflection\\PseudoTypes\\')
                ) {
                    $resource = str_replace(['\\phpDocumentor\\Reflection\\', '\\'], ['', '/'], $resourceName);
                    $event->setResourceUrl("https://github.com/phpDocumentor/TypeResolver/blob/master/src/{$resource}.php");
                }
            }
        }
    }

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'phpDocumentor\\') ||
            str_starts_with($event->getEntity()->getName(), '\\phpDocumentor\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
