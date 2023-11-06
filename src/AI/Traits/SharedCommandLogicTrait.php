<?php

namespace BumbleDocGen\AI\Traits;

use BumbleDocGen\AI\ProviderFactory;
use BumbleDocGen\AI\ProviderInterface;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

trait SharedCommandLogicTrait
{
    /**
     * @throws NotFoundException
     * @throws GuzzleException
     * @throws DependencyException
     * @throws JsonException
     */
    protected function initAiProvider(
        InputInterface $input,
        OutputInterface $output,
    ): ProviderInterface {
        $config = (new DocGeneratorFactory())->createConfiguration($input->getOption('config'));
        $configParams = $this->getCustomConfigurationParameters($input);

        // Get Provider, request if not found
        $provider = $this->getValueFromParamOrConfig($configParams, $config, 'ai_provider');
        if ($provider === null) {
            $provider = $this->askForAiProvider($input, $output);
        }

        // Get API Key, request if not found
        $apiKey = $this->getValueFromParamOrConfig($configParams, $config, 'ai_api_key');
        if ($apiKey === null) {
            $apiKey = $this->askForAiApiKey($input, $output);
        }

        // Test API key is valid
        $aiProvider = ProviderFactory::create($provider, $apiKey);
        $apiKeyTest = $this->testProviderAPIKey($aiProvider);
        if (!$apiKeyTest) {
            throw new \RuntimeException('Parameter/config: `ai_api_key` is invalid!');
        }

        // Get model, request if not found
        $model = $this->getValueFromParamOrConfig($configParams, $config, 'ai_model');
        if ($model === null) {
            $model = $this->askForAIModel($input, $output, $aiProvider);
        }

        // Return finalised provider
        return ProviderFactory::create($provider, $apiKey, $model);
    }

    private function askForAiApiKey(
        InputInterface $input,
        OutputInterface $output,
    ) {
        $question = new Question('Please provide the API key: ');
        return $this->getHelper('question')->ask($input, $output, $question);
    }

    private function askForAiProvider(
        InputInterface $input,
        OutputInterface $output,
    ) {
        $question = new ChoiceQuestion(
            'Please choose one of the available AI providers:',
            ProviderFactory::VALID_PROVIDERS,
        );
        $question->setErrorMessage('Provider %s is invalid.');
        return $this->getHelper('question')->ask($input, $output, $question);
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    private function askForAIModel(
        InputInterface $input,
        OutputInterface $output,
        ProviderInterface $provider
    ): ?string {
        if (method_exists($provider, 'getAvailableModels')) {
            $models = $provider->getAvailableModels();

            $question = new ChoiceQuestion(
                'Please choose one of the available models:',
                $models,
            );
            $question->setErrorMessage('Model %s is invalid.');

            return $this->getHelper('question')->ask($input, $output, $question);
        }
        throw new \RuntimeException('Missing parameter/config: `ai_model`');
    }

    private function testProviderAPIKey(ProviderInterface $provider): bool
    {
        if (method_exists($provider, 'getAvailableModels')) {
            try {
                $provider->getAvailableModels();
            } catch (JsonException | GuzzleException) {
                return false;
            }
        }
        return true;
    }

    private function getValueFromParamOrConfig(array $configParams, Configuration $configuration, $key): ?string
    {
        if (array_key_exists($key, $configParams)) {
            return $configParams[$key];
        }
        return $configuration->getIfExists($key);
    }
}
