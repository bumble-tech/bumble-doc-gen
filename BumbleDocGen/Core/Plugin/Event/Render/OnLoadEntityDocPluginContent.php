<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Render;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Twig\Function\LoadPluginsContent;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
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
        private RootEntityInterface $entity,
        private string $blockType,
        private Context $context
    ) {
    }

    public function getEntity(): ClassEntity
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
