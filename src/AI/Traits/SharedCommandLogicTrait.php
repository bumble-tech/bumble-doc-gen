<?php

namespace BumbleDocGen\AI\Traits;

use BumbleDocGen\AI\Providers\OpenAI\Provider as OpenAIProvider;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

trait SharedCommandLogicTrait
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    protected function getConfigurationFromInput(InputInterface $input): Configuration
    {
        return (new DocGeneratorFactory())->createConfiguration($input->getOption('config'));
    }

    protected function addSharedCommandOptions($nonInteractiveAvailable = true): void
    {
        if ($nonInteractiveAvailable) {
            $this->addOption(
                'non-interactive',
                '',
                InputOption::VALUE_NONE,
                "Use non-interactive mode, doesn't prompt for additional information.",
            );
        }
        $this->addOption(
            'provider',
            '',
            InputOption::VALUE_REQUIRED,
            'The AI service to use, options: openai',
        );
        $this->addOption(
            'api-key',
            '',
            InputOption::VALUE_REQUIRED,
            'The API key to use when interacting with the AI',
        );
        $this->addOption(
            'model',
            '',
            InputOption::VALUE_OPTIONAL,
            'The AI model to use',
        );
        $this->addOption(
            'system-prompt',
            '',
            InputOption::VALUE_OPTIONAL,
            'A path to a file containing the system prompt, defaults available in `src/AI/Prompts`',
        );
    }

    protected function getAIProvider(InputInterface $input, Configuration $configuration): string
    {
        $handler = $this->getValueFromOptionOrConfig($input, $configuration, 'provider');
        if (empty($handler)) {
            $handler = OpenAIProvider::NAME;
        }
        return $handler;
    }

    protected function getAIApiKey(
        InputInterface $input,
        OutputInterface $output,
        Configuration $configuration,
        string $provider
    ) {
        $apiKey = $this->getValueFromOptionOrConfig($input, $configuration, 'api-key');
        if (empty($apiKey) && $provider === OpenAIProvider::NAME) {
            $question = new Question('Please provide the API key: ');
            $helper = $this->getHelper('question');
            $apiKey = $helper->ask($input, $output, $question);
        }
        return $apiKey;
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    protected function getAIModel(
        InputInterface $input,
        OutputInterface $output,
        Configuration $configuration,
        string $provider,
        string $apiKey,
    ): string {
        $model = $this->getValueFromOptionOrConfig($input, $configuration, 'model');
        if (empty($model) && $provider === OpenAIProvider::NAME) {
            $openAiProvider = new OpenAIProvider($apiKey, null);
            $models = $openAiProvider->getAvailableModels();

            $question = new ChoiceQuestion(
                'Please choose one of the available models:',
                $models,
                0
            );
            $question->setErrorMessage('Model %s is invalid.');

            $helper = $this->getHelper('question');
            $model = $helper->ask($input, $output, $question);
        }
        return $model;
    }

    protected function getValueFromOptionOrConfig(
        InputInterface $input,
        Configuration $configuration,
        $key
    ): string|bool|null {
        $value = $input->getOption($key);
        if ($value) {
            return $value;
        }
        $aiConfig = $configuration->getAIConfig();
        $key = str_replace('-', '_', $key);
        return $aiConfig[$key] ?? null;
    }
}
