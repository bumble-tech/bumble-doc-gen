<?php

declare(strict_types=1);

use Bramus\Monolog\Formatter\ColoredLineFormatter;
use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueResolver\InternalValueResolver;
use BumbleDocGen\Core\Configuration\ValueResolver\RefValueResolver;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use SelfDoc\Configuration\Configuration;

return [
    ConfigurationInterface::class => \DI\get(Configuration::class),
    Logger::class => \DI\autowire(Logger::class)
        ->constructor(
            name: 'Bumble doc gen',
            handlers: [
                \DI\autowire(StreamHandler::class)
                    ->constructor(
                        stream: 'php://stdout',
                        level: Logger::INFO
                    )
                    ->method(
                        'setFormatter',
                        \DI\autowire(ColoredLineFormatter::class)
                            ->constructor(
                                colorScheme: null,
                                format: '%level_name%: %message%'
                            )
                    )
            ]
        ),
    LoggerInterface::class => \DI\get(Logger::class),
    ConfigurationParameterBag::class => \DI\autowire(ConfigurationParameterBag::class)
        ->constructor(
            \DI\autowire(InternalValueResolver::class)
                ->constructor(
                    internalValuesMap: [
                        'SCRIPT_COMMAND_DIR' => __DIR__
                    ]
                ),
            \DI\autowire(RefValueResolver::class)
        )
];
