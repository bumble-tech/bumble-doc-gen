<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\EntityDocUnifiedPlace;

use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeLoadAllPagesLinks;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeRenderingDocFiles;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateMainTwigEnvironment;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\RendererIteratorFactory;
use BumbleDocGen\Core\Renderer\TemplateFile;
use Symfony\Component\Finder\Finder;
use Twig\Error\LoaderError;

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
        private RendererIteratorFactory $rendererIteratorFactory,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            OnCreateDocumentedEntityWrapper::class => 'onCreateDocumentedEntityWrapper',
            OnCreateMainTwigEnvironment::class => 'onCreateMainTwigEnvironment',
            BeforeRenderingDocFiles::class => 'beforeRenderingDocFiles',
            OnGetTemplatePathByRelativeDocPath::class => 'onGetFilePathByRelativeDocPath',
            BeforeLoadAllPagesLinks::class => 'beforeLoadAllPagesLinks'
        ];
    }

    public function onCreateDocumentedEntityWrapper(OnCreateDocumentedEntityWrapper $event): void
    {
        $structureDirName = self::ENTITY_DOC_STRUCTURE_DIR_NAME;
        $event->getDocumentedEntityWrapper()->setParentDocFilePath("/{$structureDirName}/readme.md");
    }

    public function onGetFilePathByRelativeDocPath(OnGetTemplatePathByRelativeDocPath $event): void
    {
        if (str_starts_with($event->getTemplateName(), '/' . self::ENTITY_DOC_STRUCTURE_DIR_NAME)) {
            $event->setCustomTemplateFilePath(self::TEMPLATES_FOLDER . $event->getTemplateName());
        }
    }

    /**
     * @throws LoaderError
     */
    public function onCreateMainTwigEnvironment(OnCreateMainTwigEnvironment $event): void
    {
        $event->getFilesystemLoader()->addPath(self::TEMPLATES_FOLDER);
    }

    public function beforeRenderingDocFiles(BeforeRenderingDocFiles $event): void
    {
        $finder = Finder::create()
            ->in(self::TEMPLATES_FOLDER)
            ->ignoreDotFiles(true)
            ->ignoreVCSIgnored(true)
            ->reverseSorting()
            ->sortByName()
            ->files();

        foreach ($finder as $templateFile) {
            $docFileRelativeName = str_replace(
                self::TEMPLATES_FOLDER,
                '',
                $templateFile->getRealPath()
            );
            $this->rendererIteratorFactory->addExtraTemplate(new TemplateFile($templateFile->getRealPath(), $docFileRelativeName));
        }
    }

    public function beforeLoadAllPagesLinks(BeforeLoadAllPagesLinks $event): void
    {
        $event->addTemplatesDir(self::TEMPLATES_FOLDER);
    }
}
