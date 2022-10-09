<?php

namespace SelfDoc\Console;

use SelfDoc\Console\Command\GenerateCommand;
use Symfony\Component\Console\Application;

class App extends Application
{
    const VERSION = 1;

    public function __construct()
    {
        parent::__construct('Bumble Doc Gen - self documentation', self::VERSION);
        $this->add(new GenerateCommand());
    }
}
