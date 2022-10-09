<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;

/**
 * Plugin for working with templates of documented entities
 *
 * @see LoadPluginsContent
 */
interface BaseTemplatePluginInterface extends PluginInterface
{
    public const BLOCK_AFTER_MAIN_INFO = 'after_main_info';
    public const BLOCK_AFTER_HEADER = 'after_header';
    public const BLOCK_BEFORE_DETAILS = 'before_details';

    public function handleTemplateBlockContent(
        string $blockContent,
        ClassEntity $classEntity,
        string $blockType,
        Context $context
    ): string;
}
