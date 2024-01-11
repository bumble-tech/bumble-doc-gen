<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\AI\Generators\DocBlocksGenerator;
use BumbleDocGen\AI\Generators\ReadmeTemplateGenerator;
use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Console\ProgressBar\ProgressBarFactory;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationKey;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Parser\ProjectParser;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\Core\Renderer\Renderer;
use BumbleDocGen\Core\Renderer\Twig\Filter\AddIndentFromLeft;
use BumbleDocGen\Core\Renderer\Twig\MainTwigEnvironment;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Exception;
use Generator;
use Monolog\Logger;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Style\OutputStyle;
use Symfony\Component\Finder\Finder;

use function BumbleDocGen\Core\get_class_short;

/**
 * Class for generating documentation.
 */
final class DocGenerator
{
    public const VERSION = '2.0.0';
    public const LOG_FILE_NAME = 'last_run.log';

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function __construct(
        private readonly OutputStyle $io,
        private readonly Configuration $configuration,
        private readonly PluginEventDispatcher $pluginEventDispatcher,
        private readonly ProjectParser $parser,
        private readonly ParserHelper $parserHelper,
        private readonly Renderer $renderer,
        private readonly GenerationErrorsHandler $generationErrorsHandler,
        private readonly RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private readonly ProgressBarFactory $progressBarFactory,
        private readonly Container $diContainer,
        private readonly LocalObjectCache $localObjectCache,
        private readonly Logger $logger
    ) {
        if (file_exists(self::LOG_FILE_NAME)) {
            unlink(self::LOG_FILE_NAME);
        }

        foreach ($configuration->getPlugins() as $plugin) {
            $pluginEventDispatcher->addSubscriber($plugin);
        }
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function addPlugin(PluginInterface|string $plugin): void
    {
        if (is_string($plugin)) {
            $plugin = $this->diContainer->get($plugin);
        }

        $this->configuration->getPlugins()->add($plugin);
        $this->pluginEventDispatcher->addSubscriber($plugin);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function parseAndGetRootEntityCollectionsGroup(): RootEntityCollectionsGroup
    {
        $this->parser->parse();
        return $this->rootEntityCollectionsGroup;
    }

    /**
     * Generate missing docBlocks with LLM for project class methods that are available for documentation
     *
     * @api
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws \JsonException
     */
    public function addDocBlocks(
        ProviderInterface $aiProvider,
    ): void {
        if (!$this->io->confirm("This command will change the source code of your project. Continue?")) {
            return;
        }

        $this->parser->parse();
        $entitiesCollection = $this->rootEntityCollectionsGroup->get(PhpEntitiesCollection::NAME);
        $missingDocBlocksGenerator = new DocBlocksGenerator($aiProvider, $this->parserHelper);

        $alreadyProcessedEntities = [];
        $getEntities = function (PhpEntitiesCollection|array $entitiesCollection) use (
            &$getEntities,
            &$alreadyProcessedEntities
        ): Generator {
            foreach ($entitiesCollection as $classEntity) {
                /**@var ClassLikeEntity $classEntity */
                if (
                    !$classEntity->isEntityDataCanBeLoaded() || array_key_exists(
                        $classEntity->getName(),
                        $alreadyProcessedEntities
                    )
                ) {
                    continue;
                }
                $interfaces = $classEntity->getInterfacesEntities();
                if ($interfaces) {
                    yield from $getEntities($interfaces);
                }
                $parentClass = $classEntity->getParentClass();
                if ($parentClass) {
                    yield from $getEntities([$parentClass]);
                }
                $alreadyProcessedEntities[$classEntity->getName()] = 1;
                yield $classEntity;
            }
        };

        foreach ($getEntities($entitiesCollection) as $entity) {
            /**@var ClassLikeEntity $entity */
            if (!$missingDocBlocksGenerator->hasMethodsWithoutDocBlocks($entity)) {
                $this->logger->notice("Skipping `{$entity->getName()}`class. All methods are already documented");
            }
            if (!$this->io->confirm("Start processing class `{$entity->getName()}`? Choose `no` to skip")) {
                continue;
            }
            $this->logger->notice("Processing `{$entity->getName()}` class");
            $newBocBlocks = $missingDocBlocksGenerator->generateDocBlocksForMethodsWithoutIt($entity);

            $classFileContent = $entity->getFileContent();
            $toReplace = [];
            $classFileLines = explode("\n", $classFileContent);
            foreach ($newBocBlocks as $method => $docBlock) {
                $methodEntity = $entity->getMethod($method, true);
                $lineNumber = $docCommentLine = $methodEntity->getDocComment() ? $methodEntity->getDocBlock()->getLocation()?->getLineNumber() : null;
                $lineNumber = $lineNumber ?: $methodEntity->getStartLine();

                foreach (file($entity->getAbsoluteFileName(), FILE_IGNORE_NEW_LINES) as $line => $lineContent) {
                    if ($line + 1 === $lineNumber) {
                        $classFileLines[$line] = "[%docBlock%{$method}%]{$lineContent}";
                        break;
                    }
                }
                $docBlock = (new AddIndentFromLeft())->__invoke($docBlock, $methodEntity->getStartColumn() - 1);
                $toReplace["/(?:\[%docBlock%{$method}%\] *\/\*\*.*?(?= *\/)\/)|\[%docBlock%{$method}%\]/s"] = $docBlock . ($docCommentLine ? '' : "\n");
            }

            $classFileContent = implode("\n", $classFileLines);
            $classFileContent = preg_replace(array_keys($toReplace), $toReplace, $classFileContent);
            file_put_contents($entity->getAbsoluteFileName(), $classFileContent);
            $this->logger->notice("DocBlocks added");
        }
    }

    /**
     * Creates a `README.md` template filled with basic information using LLM
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function generateReadmeTemplate(
        ProviderInterface $aiProvider,
    ): void {
        $this->io->note("Project analysis");
        $this->parser->parse();
        $entitiesCollection = $this->rootEntityCollectionsGroup->get(PhpEntitiesCollection::NAME);

        $finder = new Finder();
        $finder
            ->files()
            ->in($this->configuration->getProjectRoot())
            ->ignoreVCS(true)
            ->ignoreVCSIgnored(true)
            ->ignoreDotFiles(true);

        $composerJsonFile = array_keys(iterator_to_array($finder->name('composer.json')))[0] ?? null;
        $this->logger->info("Composer settings file found: `{$composerJsonFile}`");
        $this->io->note("The project has been analyzed. Preparing to generate a document");

        $entryPoints = [];
        do {
            $entityName = $this->io->ask(
                "Enter the name of the class that is the entry point of the documented project (or just skip this step)"
            );
            if ($entityName) {
                $entity = $entitiesCollection->findEntity($entityName, false);
                if (!$entity) {
                    $this->io->text("Class `{$entityName}` not found, please try again");
                    $action = 'Add more';
                    continue;
                }
                $entryPoints[$entity->getName()] = $entity;
            }
            $action = null;
            if ($entryPoints) {
                do {
                    $this->io->text(
                        array_merge(
                            ["Entry-point classes:"],
                            array_map(function ($v) {
                                static $n = 0;
                                ++$n;
                                return "{$n}) {$v}";
                            },
                                array_keys($entryPoints))
                        )
                    );

                    $action = $this->io->choice("Choose your next action", ['Continue', 'Add more', 'Remove last']);
                    if ($action === 'Remove last') {
                        array_pop($entryPoints);
                    }
                } while ($action === 'Remove last');
            }
        } while ($action !== 'Continue');

        $additionalPrompt = $this->io->ask(
            'Write instructions for more accurate documentation generation ( or just skip this step )'
        );

        $readmeTemplateFiller = new ReadmeTemplateGenerator($aiProvider);
        $this->io->note("Sending " . $aiProvider->getName() . " request");
        $readmeFileContent = $readmeTemplateFiller->generateReadmeFileContent(
            $entitiesCollection,
            $entryPoints,
            $composerJsonFile,
            $additionalPrompt,
        );

        $fileContent = "---\ntitle: About the project\n---\n{$readmeFileContent}";
        $this->io->note("readme.md.twig file content generated:");
        $this->io->text($fileContent);
        if ($this->io->confirm('Save file?')) {
            $readmeFilePath = $this->configuration->getTemplatesDir() . '/readme.md.twig';
            file_put_contents($readmeFilePath, $fileContent);
            $this->logger->notice("{$readmeFilePath} file saved.");
        }
    }

    /**
     * Generates documentation using configuration
     *
     * @api
     *
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function generate(): void
    {
        $start = microtime(true);
        $memory = memory_get_usage(true);

        try {
            $pb = $this->progressBarFactory->createStylizedProgressBar();
            $result = $this->parser->parse($pb);

            $resSummary = $result->getSummary();
            $this->io->table([], [
                ['Processed files:', "<options=bold,underscore>{$resSummary->getProcessedFilesCount()}</>"],
                ['Processed entities:', "<options=bold,underscore>{$resSummary->getProcessedEntitiesCount()}</>"],
                ['Skipped entities:', "<options=bold,underscore>{$resSummary->getSkippedEntitiesCount()}</>"],
                ['Entities added by plugins:', "<options=bold,underscore>{$resSummary->getEntitiesAddedByPluginsCount()}</>"],
                ['Total added entities:', "<options=bold,underscore>{$resSummary->getTotalAddedEntities()}</>"],
            ]);

            $this->renderer->run();
        } catch (Exception $e) {
            $this->logger->critical(
                "{$e->getFile()}:{$e->getLine()} {$e->getMessage()} \n\n{$e->getTraceAsString()}"
            );
            throw $e;
        }

        $time = microtime(true) - $start;
        $memory = memory_get_usage(true) - $memory;

        $warningMessages = $this->generationErrorsHandler->getRecords();

        if (empty($warningMessages)) {
            $this->io->writeln("<info>Documentation successfully generated</>");
        } else {
            $this->io->writeln("<comment>Generation completed with errors</>");

            $this->io->getFormatter()->setStyle('warning', new OutputFormatterStyle('yellow'));
            $badErrorStyle = new OutputFormatterStyle('red', '#ff0', ['bold']);
            $this->io->getFormatter()->setStyle('critical', $badErrorStyle);
            $this->io->getFormatter()->setStyle('alert', $badErrorStyle);
            $this->io->getFormatter()->setStyle('emergency', $badErrorStyle);
            $table = $this->io->createTable();

            $rows = [];
            $warningMessagesCount = count($warningMessages);
            foreach ($warningMessages as $i => $warningMessage) {
                $tag = strtolower($warningMessage['type']);
                $rows[] = ["<{$tag}>{$warningMessage['type']}</>", "<{$tag}>{$warningMessage['msg']}</>"];
                if ($warningMessage['isRenderingError']) {
                    $rows[] = [
                        '',
                        '<options=conceal,underscore>This error occurs during the document rendering process</>'
                    ];
                }
                $rows[] = ['', $warningMessage['initiator']];
                if ($warningMessagesCount - $i !== 1) {
                    $rows[] = new TableSeparator();
                }
            }
            $table->setStyle('box');
            $table->addRows($rows);
            $table->render();
            $this->io->newLine();
        }

        $this->io->writeln("<info>Performance</>");
        $this->io->table([], [
            ['Execution time:', "<options=bold,underscore>{$time} sec.</>"],
            ['Allocated memory:', '<options=bold,underscore>' . Helper::formatMemory(memory_get_usage(true)) . '</>'],
            ['Command memory usage:', '<options=bold,underscore>' . Helper::formatMemory($memory) . '</>']
        ]);
    }

    /**
     * Serve documentation
     *
     * @api
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function serve(
        ?callable $afterPreparation = null,
        ?callable $afterDocChanged = null,
        int $timeout = 1000000
    ): void {
        $templatesDir = $this->configuration->getTemplatesDir();
        $event = $this->pluginEventDispatcher->dispatch(new OnGetProjectTemplatesDirs([$templatesDir]));
        $templatesDirs = $event->getTemplatesDirs();

        $checkedFiles = [];
        $checkIsTemplatesChanged = function () use ($templatesDirs, &$checkedFiles) {
            $finder = Finder::create()
                ->ignoreVCS(true)
                ->ignoreDotFiles(true)
                ->ignoreUnreadableDirs()
                ->sortByName()
                ->in($templatesDirs)
                ->files();

            $files = [];
            foreach ($finder as $f) {
                try {
                    $files[$f->getPathname()] = $f->getMTime();
                } catch (\Exception) {
                }
            }
            $changed = $checkedFiles !== $files;
            $checkedFiles = $files;
            return $changed;
        };

        $pb = $this->progressBarFactory->createStylizedProgressBar();
        $this->parser->parse($pb);
        $this->renderer->run();
        $checkIsTemplatesChanged();
        if ($afterPreparation) {
            call_user_func($afterPreparation);
        }

        while (true) {
            if ($checkIsTemplatesChanged()) {
                try {
                    $this->localObjectCache->clear();
                    $this->renderer->run();
                    if ($afterDocChanged) {
                        call_user_func($afterDocChanged);
                    }
                    $this->io->success('Documentation updated');
                } catch (\Exception $e) {
                    $this->io->error($e->getMessage());
                }
            }
            usleep($timeout);
        }
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getConfigurationKeys(): void
    {
        foreach (ConfigurationKey::all() as $key) {
            $this->getConfigurationKey($key);
        }
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getConfigurationKey(string $key): void
    {
        $entityMapFn = static fn (object $locator): array => [
            get_class_short(get_class($locator)),
            get_class($locator),
        ];
        $keyMapFn = static fn (string $key): array => [
            get_class_short($key),
            $key,
        ];
        $boolWrapFn = static fn (bool $value): string => $value ? 'yes' : 'no';

        $result = match ($key) {
            ConfigurationKey::PROJECT_ROOT => [
                [
                    'Project root',
                    $this->configuration->getProjectRoot(),
                ],
            ],
            ConfigurationKey::TEMPLATES_DIR => [
                [
                    'Templates directory',
                    $this->configuration->getTemplatesDir(),
                ],
            ],
            ConfigurationKey::OUTPUT_DIR => [
                [
                    'Output directory',
                    $this->configuration->getOutputDir(),
                ],
            ],
            ConfigurationKey::OUTPUT_DIR_BASE_URL => [
                [
                    'Output directory base url',
                    $this->configuration->getOutputDirBaseUrl(),
                ],
            ],
            ConfigurationKey::CACHE_DIR => [
                [
                    'Cache directory',
                    $this->configuration->getCacheDir() ?: '',
                ],
            ],
            ConfigurationKey::PAGE_LINK_PROCESSOR => [
                [
                    get_class_short(get_class($this->configuration->getPageLinkProcessor())),
                    get_class($this->configuration->getPageLinkProcessor()),
                ],
            ],
            ConfigurationKey::GIT_CLIENT_PATH => [
                [
                    'Git client path',
                    $this->configuration->getGitClientPath(),
                ],
            ],
            ConfigurationKey::USE_SHARED_CACHE => [
                [
                    'Use shared cache',
                    $boolWrapFn($this->configuration->useSharedCache()),
                ],
            ],
            ConfigurationKey::RENDER_WITH_FRONT_MATTER => [
                [
                    'Do not remove the front matter block from templates when creating documents',
                    $boolWrapFn($this->configuration->renderWithFrontMatter()),
                ],
            ],
            ConfigurationKey::CHECK_FILE_IN_GIT_BEFORE_CREATING_DOC => [
                [
                    'Check file in Git before creating doc',
                    $boolWrapFn($this->configuration->isCheckFileInGitBeforeCreatingDocEnabled()),
                ],
            ],
            ConfigurationKey::SOURCE_LOCATORS => array_map(
                $entityMapFn,
                iterator_to_array($this->configuration->getSourceLocators())
            ),
            ConfigurationKey::LANGUAGE_HANDLERS => array_map(
                $keyMapFn,
                $this->configuration->getLanguageHandlersCollection()->keys()
            ),
            ConfigurationKey::PLUGINS => array_map(
                $keyMapFn,
                $this->configuration->getPlugins()->keys()
            ),
            ConfigurationKey::TWIG_FUNCTIONS => array_map(
                $keyMapFn,
                $this->configuration->getTwigFunctions()->keys()
            ),
            ConfigurationKey::TWIG_FILTERS => array_map(
                $keyMapFn,
                $this->configuration->getTwigFilters()->keys()
            ),
            ConfigurationKey::ADDITIONAL_CONSOLE_COMMANDS => array_map(
                $entityMapFn,
                iterator_to_array($this->configuration->getAdditionalConsoleCommands())
            ),
            default => throw new \InvalidArgumentException('Unsupported config key provided: ' . $key)
        };

        $this->io->table([], $result);
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }
}
