<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\CorePlugin\LastPageCommitter;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Context\RendererContext;

/**
 * Plugin for adding a block with information about the last commit and date of page update to the generated document
 */
final class LastPageCommitter implements PluginInterface
{
    public function __construct(
        private readonly RendererContext $context,
        private readonly Configuration $configuration
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeCreatingDocFile::class => 'beforeCreatingDocFile',
        ];
    }

    final public function beforeCreatingDocFile(BeforeCreatingDocFile $event): void
    {
        try {
            $gitClientPath = $this->configuration->getGitClientPath();
            $filePath = str_replace(
                "{$this->configuration->getProjectRoot()}/",
                '',
                "{$this->configuration->getTemplatesDir()}{$this->context->getCurrentTemplateFilePatch()}"
            );

            exec("{$gitClientPath} log --no-merges -1 {$filePath} 2>/dev/null", $output);

            $content = $event->getContent();
            if (isset($output[2]) && str_contains($output[2], 'Date: ')) {
                $author = str_replace('Author:', '**Last page committer:**', htmlspecialchars($output[1]));
                $date = str_replace('Date:', '**Last modified date:**', $output[2]);
                $contentRegenerationDate = '**Page content update date:** ' . date('D M d Y');
                $content .= "\n\n---\n\n{$author}<br>{$date}<br>{$contentRegenerationDate}<br>Made with [Bumble Documentation Generator](https://github.com/bumble-tech/bumble-doc-gen/blob/master/docs/README.md)";
            }
            $event->setContent($content);
        } catch (\Exception) {
        }
    }
}
