<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\Twig\Function\LoadPluginsContent;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when entity documentation is generated (plugin content loading)
 *
 * @see LoadPluginsContent
 */
final class OnLoadEntityDocPluginContent extends Event
{
    private array $blockContentPluginResults = [];

    public function __construct(
        private string $blockContent,
        private RootEntityInterface $entity,
        private string $blockType
    ) {
    }

    public function getEntity(): RootEntityInterface
    {
        return $this->entity;
    }

    public function getBlockContent(): string
    {
        return $this->blockContent;
    }

    public function getBlockType(): string
    {
        return $this->blockType;
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
