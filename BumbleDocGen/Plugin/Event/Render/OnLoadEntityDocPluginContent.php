<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Render;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\LoadPluginsContent;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when class documentation is generated (plugin content loading)
 *
 * @see LoadPluginsContent
 */
final class OnLoadEntityDocPluginContent extends Event
{
    private array $blockContentPluginResults = [];

    public function __construct(
        private string $blockContent,
        private ClassEntity $classEntity,
        private string $blockType,
        private Context $context
    ) {
    }

    public function getClassEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getBlockContent(): string
    {
        return $this->blockContent;
    }

    public function getBlockType(): string
    {
        return $this->blockType;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function addBlockContentPluginResult(string $pluginResult): void
    {
        $this->blockContentPluginResults[] = $pluginResult;
    }

    public function getBlockContentPluginResults(): array
    {
        return $this->blockContentPluginResults;
    }
}
