<?php

declare(strict_types=1);

use Bramus\Monolog\Formatter\ColoredLineFormatter;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueResolver\InternalValueResolver;
use BumbleDocGen\Core\Configuration\ValueResolver\RefValueResolver;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Configuration\Configuration;

return [
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
            [
                \DI\autowire(InternalValueResolver::class)
                    ->constructor(
                        internalValuesMap: [
                            'DOC_GEN_LIB_PATH' => dirname(__DIR__),
                            'UNIX_TIMESTAMP' => time(),
                            'PHP_VERSION' => phpversion(),
                        ]
                    ),
                \DI\autowire(RefValueResolver::class)
            ]
        ),
    PluginEventDispatcher::class => \DI\autowire(PluginEventDispatcher::class)->lazy(),
];
