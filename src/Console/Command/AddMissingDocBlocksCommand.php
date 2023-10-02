<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\Command;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tectalic\OpenAi\ClientException;

final class AddMissingDocBlocksCommand extends BaseCommand
{
    protected function getCustomConfigOptionsMap(): array
    {
        return [
            'project_root' => 'Path to the directory of the documented project',
            'cache_dir' => 'Configuration parameter: Path to the directory where the documentation generator cache will be saved',
        ];
    }

    protected function configure(): void
    {
        $this->setName('ai-add-missing-doc-blocks')
            ->setDescription('Add missing doc blocks in documented code using LLMs tools');
    }

    /**
     * @throws DependencyException
     * @throws ReflectionException
     * @throws ClientException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $this->createDocGenInstance($input, $output)->addMissingDocBlocks();
        return self::SUCCESS;
    }
}
