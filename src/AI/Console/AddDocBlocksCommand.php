<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Console;

use BumbleDocGen\AI\Traits\SharedCommandLogicTrait;
use BumbleDocGen\Console\Command\BaseCommand;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
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
        ];
    }

    protected function configure(): void
    {
        $this->setName(self::NAME)
            ->setDescription('Leverage AI to insert missing doc blocks in code.');
        $this->addSharedCommandOptions();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws GuzzleException
     * @throws JsonException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $configuration = $this->getConfigurationFromInput($input);
        $provider = $this->getAIProvider($input, $configuration);
        $apiKey = $this->getAIApiKey($input, $output, $configuration, $provider);
        $model = $this->getAIModel($input, $output, $configuration, $provider, $apiKey);
        $systemPrompt = $this->getValueFromOptionOrConfig($input, $configuration, 'system-prompt');

        $this->createDocGenInstance($input, $output)->addDocBlocks(
            $provider,
            $apiKey,
            $model,
            $systemPrompt
        );

        return self::SUCCESS;
    }
}
