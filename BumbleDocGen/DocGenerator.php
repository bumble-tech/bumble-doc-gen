<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Parser\ProjectParser;
use BumbleDocGen\Core\Renderer\Renderer;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\TemplateGenerator\ChatGpt\TemplatesStructureGenerator;
use DI\DependencyException;
use DI\NotFoundException;
use Monolog\Logger;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Console\Style\OutputStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Tectalic\OpenAi\ClientException;
use function BumbleDocGen\Core\bites_int_to_string;

/**
 * Class for generating documentation.
 */
final class DocGenerator
{
    public const VERSION = '1.0.0';

    public function __construct(
        private Filesystem                 $fs,
        private OutputStyle                $io,
        private Configuration              $configuration,
        private ProjectParser              $parser,
        private Renderer                   $render,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private Logger                     $logger
    )
    {
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
     * @throws ClientException
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function generateProjectTemplatesStructure(): void
    {
        $this->parser->parse();
        $entitiesCollection = $this->rootEntityCollectionsGroup->get(ClassEntityCollection::getEntityCollectionName());

        $openaiKey = getenv('OPENAI_API_KEY') ?: $this->io->askHidden('Enter the key to work with ChatGpt');
        $openaiClient = \Tectalic\OpenAi\Manager::build(
            new \GuzzleHttp\Client(),
            new \Tectalic\OpenAi\Authentication($openaiKey)
        );

        $templatesStructureGenerator = new TemplatesStructureGenerator($openaiClient);

        do {
            $additionalPrompt = $this->io->ask('Write instructions for more accurate documentation generation ( or just skip this step )') ?: null;
            $this->logger->notice("Sending ChatGPT request");
            $structure = $templatesStructureGenerator->generateStructureByEntityCollection($entitiesCollection, $additionalPrompt);
            $structureAsString = implode("\n", array_map(fn($v, $k) => "{$k} => {$v}", $structure, array_keys($structure)));
            $action = $this->io->choice("The proposed documentation structure is as follows:\n\n{$structureAsString}", ['Save', 'Regenerate', 'Cancel']);
        } while ($action == 'Regenerate');

        if ($action === 'Save') {
            $templatesDir = $this->configuration->getTemplatesDir();
            $finder = new Finder();
            $finder->files()->in($this->configuration->getTemplatesDir());
            if (
                $finder->hasResults() &&
                $this->io->confirm("Directory `{$templatesDir}` already contains files. Clean before saving new ones?")
            ) {
                $this->fs->remove([$templatesDir]);
            }

            foreach ($structure as $fileName => $title) {
                $fileName = $templatesDir . $fileName;
                if (str_ends_with($fileName, 'readme.md.twig')) {
                    $this->fs->appendToFile($fileName, "{% set title = '{$title}' %}\n");
                } else {
                    $this->fs->appendToFile($fileName, "{% set title = '{$title}' %}\n{{ generatePageBreadcrumbs(title, _self) }}\n");
                }
                $this->logger->notice("Creating `{$fileName}` template");
            }
        }
    }

    /**
     * Generates documentation using configuration
     *
     * @throws InvalidArgumentException
     */
    public function generate(): void
    {
        $start = microtime(true);
        $memory = memory_get_usage();

        try {
            $this->parser->parse();
            $this->render->run();
        } catch (\Exception $e) {
            $this->logger->critical("{$e->getFile()}:{$e->getLine()} {$e->getMessage()} \n\n{{$e->getTraceAsString()}}");
        }

        $time = microtime(true) - $start;
        $this->logger->notice("Time of execution: {$time} sec.");
        $memory = memory_get_usage() - $memory;
        $this->logger->notice('Memory:' . bites_int_to_string($memory));
    }
}
