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

final class GenerateReadMeTemplateCommand extends BaseCommand
{
    use SharedCommandLogicTrait;

    public const NAME = 'ai:generate-readme-template';

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
            ->setDescription('Leverage AI to generate content for a project readme.md file.');
    }


    /**
     * @throws NotFoundException
     * @throws GuzzleException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws JsonException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        // Initialise AI provider from params/config
        $aiProvider = $this->initAiProvider($input, $output);

        // Generate Read me
        $this->createDocGenInstance($input, $output)->generateReadmeTemplate($aiProvider);

        return self::SUCCESS;
    }
}
