<?php

declare(strict_types=1);

namespace SelfDoc\Console\Command;

use BumbleDocGen\DocGeneratorFactory;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Console\Command\Command;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('generate');
    }

    /**
     * @throws SyntaxError
     * @throws NotFoundException
     * @throws RuntimeError
     * @throws DependencyException
     * @throws LoaderError
     * @throws InvalidArgumentException
     */
    protected function execute(
        \Symfony\Component\Console\Input\InputInterface   $input,
        \Symfony\Component\Console\Output\OutputInterface $output
    ): int
    {
        $docGenerator = (new DocGeneratorFactory())->create(
            dirname(__DIR__, 2) . '/Configuration/config.yaml'
        );
        $docGenerator->generate();
        return self::SUCCESS;
    }
}
