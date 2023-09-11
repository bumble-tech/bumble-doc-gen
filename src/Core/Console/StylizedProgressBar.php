<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Console;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Style\OutputStyle;

final class StylizedProgressBar
{
    private ProgressBar $progressBar;
    private string $name = '';
    private string $stepDescription = '';

    public function __construct(OutputStyle $io)
    {
        $this->progressBar = $io->createProgressBar();
        $this->progressBar->setBarCharacter('<fg=bright-green>▓</>');
        $this->progressBar->setEmptyBarCharacter("<fg=bright-red>▓</>");
        $this->progressBar->setProgressCharacter("<fg=bright-white>▓</>");
        $this->resetFormat();
    }

    private function resetFormat(): void
    {
        $namePart = '';
        if ($this->name) {
            $namePart = "<fg=bright-blue;bg=gray;options=bold> %name:-45s%</>\n";
        }

        $stepDescriptionPart = '';
        if ($this->stepDescription) {
            $stepDescriptionPart = "\n<fg=white;options=underscore>%stepDescription%</>";
        }

        $this->progressBar->setFormat(
            "{$namePart}[%bar%] %percent:3s%% | %current% items\n🏁 %estimated:-20s%  %memory:20s%{$stepDescriptionPart}\n\n"
        );
    }


    public function setName(string $name): void
    {
        $this->name = $name;
        $this->resetFormat();
        $this->progressBar->setMessage($name, 'name');
    }

    public function setStepDescription(string $stepDescription): void
    {
        $this->stepDescription = $stepDescription;
        $this->resetFormat();
        $this->progressBar->setMessage($stepDescription, 'stepDescription');
    }

    public function iterate(iterable $iterable, ?int $max = null): \Generator
    {
        $i = 0;
        foreach ($this->progressBar->iterate($iterable, $max) as $key => $item) {
            $lastIterationNumber = is_countable($iterable) ? \count($iterable) : 0;
            yield $key => $item;
            if ($lastIterationNumber == ++$i) {
                $this->setStepDescription('');
            }
        }
    }

    public function start(?int $max = null): void
    {
        $this->progressBar->start($max);
    }

    public function setMaxSteps(int $maxSteps): void
    {
        $this->progressBar->setMaxSteps($maxSteps);
    }

    public function advance(int $step): void
    {
        $this->progressBar->advance($step);
    }

    public function finish(): void
    {
        $this->progressBar->finish();
    }
}
