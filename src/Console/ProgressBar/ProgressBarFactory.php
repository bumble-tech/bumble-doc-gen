<?php

declare(strict_types=1);

namespace BumbleDocGen\Console\ProgressBar;

use Symfony\Component\Console\Style\OutputStyle;

final class ProgressBarFactory
{
    public function __construct(private OutputStyle $io)
    {
    }

    public function createStylizedProgressBar(): StylizedProgressBar
    {
        return new StylizedProgressBar($this->io);
    }
}
