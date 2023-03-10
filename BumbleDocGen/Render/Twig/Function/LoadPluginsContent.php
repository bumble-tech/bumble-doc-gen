<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent;
use BumbleDocGen\Render\Context\Context;

/**
 * Process class template blocks with plugins. The method returns the content processed by plugins.
 *
 * @internal
 *
 * @example {{ loadPluginsContent('some text', entity, constant('BumbleDocGen\\Plugin\\BaseTemplatePluginInterface::BLOCK_AFTER_HEADER')) }}
 */
final class LoadPluginsContent implements CustomFunctionInterface
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
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
        $pluginEventDispatcher = $this->context->getPluginEventDispatcher();

        $blockContentPluginResults = $pluginEventDispatcher->dispatch(
            new OnLoadEntityDocPluginContent(
                $content, $entity, $blockType, $this->context
            )
        )->getBlockContentPluginResults();

        foreach ($blockContentPluginResults as $blockContentPluginResult) {
            $content .= "\n\n{$blockContentPluginResult}";
        }
        return $content;
    }
}
