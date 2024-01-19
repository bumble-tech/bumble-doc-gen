<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;

/**
 * This plugin changes the algorithm for saving entity documents. The standard system stores each file
 * in a directory next to the file where it was requested. This behavior changes and all documents are saved
 * in a separate directory structure, so they are not duplicated.
 */
final class EntityDocUnifiedPlacePlugin implements PluginInterface
{
    private const TEMPLATES_FOLDER = __DIR__ . DIRECTORY_SEPARATOR . 'templates';
    public const ENTITY_DOC_STRUCTURE_DIR_NAME = '__structure';

    public function __construct(
        PhpHandlerSettings $phpHandlerSettings
    ) {
        $phpHandlerSettings->changePropRefsInternalLinksMode(true);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            OnCreateDocumentedEntityWrapper::class => 'onCreateDocumentedEntityWrapper',
            OnGetTemplatePathByRelativeDocPath::class => 'onGetTemplatePathByRelativeDocPath',
            OnGetProjectTemplatesDirs::class => 'onGetProjectTemplatesDirs'
        ];
    }

    public function onCreateDocumentedEntityWrapper(OnCreateDocumentedEntityWrapper $event): void
    {
        // Here we replace the parent document for all entities so that they are all in the same directory.
        $structureDirName = self::ENTITY_DOC_STRUCTURE_DIR_NAME;
        $event->getDocumentedEntityWrapper()->setParentDocFilePath("/{$structureDirName}/readme.md");
    }

    public function onGetTemplatePathByRelativeDocPath(OnGetTemplatePathByRelativeDocPath $event): void
    {
        // When getting the path to the template file,
        // we need to take into account that it is located in the plugin directory, and not the standard one.
        if (str_starts_with($event->getTemplateName(), '/' . self::ENTITY_DOC_STRUCTURE_DIR_NAME)) {
            $event->setCustomTemplateFilePath(self::TEMPLATES_FOLDER . $event->getTemplateName());
        }
    }

    public function onGetProjectTemplatesDirs(OnGetProjectTemplatesDirs $event): void
    {
        $event->addTemplatesDir(self::TEMPLATES_FOLDER);
    }
}
