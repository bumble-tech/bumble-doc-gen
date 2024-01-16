<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\Daux;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\AfterRenderingEntities;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingDocFile;
use BumbleDocGen\Core\Plugin\Event\Renderer\BeforeCreatingEntityDocFile;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnCreateDocumentedEntityWrapper;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetTemplatePathByRelativeDocPath;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;

/**
 * @internal
 */
final class Daux implements PluginInterface
{
    private const TEMPLATES_FOLDER = __DIR__ . DIRECTORY_SEPARATOR . 'templates';
    public const ENTITY_DOC_STRUCTURE_DIR_NAME = '-Project_Structure';

    public function __construct(
        private readonly Configuration $configuration,
        private readonly BreadcrumbsHelper $breadcrumbsHelper
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            OnCreateDocumentedEntityWrapper::class => 'onCreateDocumentedEntityWrapper',
            OnGetTemplatePathByRelativeDocPath::class => 'onGetTemplatePathByRelativeDocPath',
            OnGetProjectTemplatesDirs::class => 'onGetProjectTemplatesDirs',
            BeforeCreatingDocFile::class => 'beforeCreatingDocFile',
            BeforeCreatingEntityDocFile::class => 'beforeCreatingDocFile',
            AfterRenderingEntities::class => 'afterRenderingEntities'
        ];
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    final public function beforeCreatingDocFile(BeforeCreatingDocFile|BeforeCreatingEntityDocFile $event): void
    {
        $content = str_replace(
            "{$this->configuration->getOutputDirBaseUrl()}/",
            '/',
            $event->getContent()
        );

        // MD links are not always converted to HTML correctly. This hack fixes that
        $content = preg_replace('/\[([^\[]+)\]\((.*)\)/', '<a href="$2">$1</a>', $content);

        // Hack to make images work in generated HTML
        $content = preg_replace_callback('/(src=("|\')\/)([^"\']+)/', function (array $elements): string {
            return explode('?', $elements[0])[0];
        }, $content);

        $content = preg_replace('/(\/readme.md)("|\')/i', '/index.md$2', $content);
        $event->setContent($content);

        $outputFileName = $event->getOutputFilePatch();
        $outputFileName = preg_replace('/\/(readme.md)$/i', '/index.md', $outputFileName);
        $event->setOutputFilePatch($outputFileName);
    }

    public function onCreateDocumentedEntityWrapper(OnCreateDocumentedEntityWrapper $event): void
    {
        // Here we replace the parent document for all entities so that they are all in the same directory.
        $structureDirName = self::ENTITY_DOC_STRUCTURE_DIR_NAME;
        $event->getDocumentedEntityWrapper()->setParentDocFilePath("/{$structureDirName}/index.md");
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function afterRenderingEntities(): void
    {
        $indexFile = $this->breadcrumbsHelper->getNearestIndexFile('/');
        $frontMatter = $this->breadcrumbsHelper->getTemplateFrontMatter($indexFile);

        $dauxConfig = self::TEMPLATES_FOLDER . DIRECTORY_SEPARATOR . 'config.json';
        $config = json_decode(file_get_contents($dauxConfig), true);
        $config = array_merge_recursive($config, $frontMatter);
        $outputConfigFile = $this->configuration->getOutputDir() . DIRECTORY_SEPARATOR . 'config.json';
        file_put_contents($outputConfigFile, json_encode($config));
    }
}
