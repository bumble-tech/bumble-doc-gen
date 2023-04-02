<?php

declare(strict_types=1);

namespace BumbleDocGen;

use BumbleDocGen\Core\Parser\ProjectParser;
use BumbleDocGen\Core\Render\Render;
use Monolog\Logger;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use function BumbleDocGen\Core\bites_int_to_string;

/**
 * Class for generating documentation.
 */
final class DocGenerator
{
    public function __construct(
        private ProjectParser $parser,
        private Render        $render,
        private Logger        $logger
    )
    {
    }

    /**
     * Generates documentation using configuration
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function generate(): void
    {
        $start = microtime(true);
        $memory = memory_get_usage();

        $this->parser->parse();
        $this->render->run();

        $time = microtime(true) - $start;
        $this->logger->notice("Time of execution: {$time} sec.");
        $memory = memory_get_usage() - $memory;
        $this->logger->notice('Memory:' . bites_int_to_string($memory));
    }
}
