<?php

declare(strict_types=1);

namespace BumbleDocGen\Console;

use BumbleDocGen\Console\Command\GenerateCommand;
use Symfony\Component\Console\Application;

class App extends Application
{
    public function __construct()
    {
        parent::__construct('Bumble Doc Gen', \BumbleDocGen\DocGenerator::VERSION);
        $this->add(new GenerateCommand());
    }
}
