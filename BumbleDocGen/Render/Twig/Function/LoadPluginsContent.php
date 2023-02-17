<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\Plugin\Event\Render\OnLoadEntityDocPluginContent;
use BumbleDocGen\Render\Context\Context;

/**
 * Process class template blocks with plugins. The method returns the content processed by plugins.
 *
 * @internal
 *
 * @example {{ loadPluginsContent('some text', classEntity, constant('BumbleDocGen\\Plugin\\BaseTemplatePluginInterface::BLOCK_AFTER_HEADER')) }}
 */
final class LoadPluginsContent
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    /**
     * @param string $content Content to be processed by plugins
     * @param ClassEntity $classEntity The entity for which we process the content block
     * @param string $blockType Content block type. @see BaseTemplatePluginInterface::BLOCK_*
     * @return string
     */
    public function __invoke(string $content, ClassEntity $classEntity, string $blockType): string
    {
        $pluginEventDispatcher = $this->context->getPluginEventDispatcher();

        $blockContentPluginResults = $pluginEventDispatcher->dispatch(
            new OnLoadEntityDocPluginContent(
                $content, $classEntity, $blockType, $this->context
            )
        )->getBlockContentPluginResults();

        foreach ($blockContentPluginResults as $blockContentPluginResult) {
            $content .= "\n\n{$blockContentPluginResult}";
        }
        return $content;
    }
}
