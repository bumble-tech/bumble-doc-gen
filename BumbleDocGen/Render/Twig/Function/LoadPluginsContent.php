<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;

final class LoadPluginsContent
{
    public function __construct(private Context $context)
    {
    }

    public function __invoke(string $content, ClassEntity $classEntity, string $blockType): string
    {
        $configuration = $this->context->getConfiguration();
        foreach ($configuration->getPlugins()->getOnlyForTemplates() as $plugin) {
            /**@var \BumbleDocGen\Plugin\BaseTemplatePluginInterface $plugin */
            $content = $plugin->handleTemplateBlockContent($content, $classEntity, $blockType, $this->context);
        }
        return $content;
    }
}
