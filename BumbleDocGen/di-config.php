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
            resolvers: [
                \DI\autowire(InternalValueResolver::class)
                    ->constructor(
                        internalValuesMap: [
                            'WORKING_DIR' => getcwd(),
                            'TMP_DIR' => sys_get_temp_dir() . '/bumbleDocGen',
                            'DOC_GEN_VERSION' => \BumbleDocGen\DocGenerator::VERSION,
                            'DOC_GEN_LIB_PATH' => dirname(__DIR__),
                            'DOC_DEFAULT_CONFIG_PATH' => \BumbleDocGen\Core\Configuration\Configuration::DEFAULT_SETTINGS_FILE,
                            'UNIX_TIMESTAMP' => time(),
                            'PHP_VERSION' => phpversion(),
                        ]
                    ),
                \DI\autowire(RefValueResolver::class)
            ]
        ),
    PluginEventDispatcher::class => \DI\autowire(PluginEventDispatcher::class)->lazy(),
];
