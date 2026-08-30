<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Console;

use BumbleDocGen\AI\Traits\SharedCommandLogicTrait;
use BumbleDocGen\Console\Command\BaseCommand;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use DI\DependencyException;
use DI\NotFoundException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AddDocBlocksCommand extends BaseCommand
{
    use SharedCommandLogicTrait;

    public const NAME = 'ai:add-doc-blocks';

    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'templates_dir' => 'Path to directory with documentation templates',
            'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
            'ai_provider' => 'The AI service to use, options: openai',
            'ai_api_key' => 'The API key to use when interacting with the AI',
            'ai_model' => 'The AI model to use',
        ];
    }

    protected function configure(): void
    {
        $this->setName(self::NAME)
            ->setDescription('Leverage AI to insert missing doc blocks in code.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     * @throws GuzzleException
     * @throws JsonException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        // Initialise AI provider from params/config
        $aiProvider = $this->initAiProvider($input, $output);

        // Generate doc blocks
        $this->createDocGenInstance($input, $output)->addDocBlocks($aiProvider);

        return self::SUCCESS;
    }
}
