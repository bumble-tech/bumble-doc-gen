<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnLoadEntityDocPluginContent;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

/**
 * Process entity template blocks with plugins. The method returns the content processed by plugins.
 *
 * @internal
 *
 * @example {{ loadPluginsContent('some text', entity, constant('BumbleDocGen\\Plugin\\BaseTemplatePluginInterface::BLOCK_AFTER_HEADER')) }}
 */
final class LoadPluginsContent implements CustomFunctionInterface
{
    public function __construct(private PluginEventDispatcher $pluginEventDispatcher)
    {
    }

    public static function getName(): string
    {
        return 'loadPluginsContent';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $content Content to be processed by plugins
     * @param RootEntityInterface $entity The entity for which we process the content block
     * @param string $blockType Content block type. @see BaseTemplatePluginInterface::BLOCK_*
     * @return string
     */
    public function __invoke(string $content, RootEntityInterface $entity, string $blockType): string
    {
        $blockContentPluginResults = $this->pluginEventDispatcher->dispatch(
            new OnLoadEntityDocPluginContent(
                $content,
                $entity,
                $blockType
            )
        )->getBlockContentPluginResults();

        foreach ($blockContentPluginResults as $blockContentPluginResult) {
            $content .= "\n\n{$blockContentPluginResult}";
        }
        return $content;
    }
}
