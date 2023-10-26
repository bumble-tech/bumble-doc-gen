<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

final class ConfigurationKey
{
    public const SOURCE_LOCATORS = 'source_locators';
    public const LANGUAGE_HANDLERS = 'language_handlers';
    public const PLUGINS = 'plugins';
    public const TWIG_FUNCTIONS = 'twig_functions';
    public const TWIG_FILTERS = 'twig_filters';
    public const ADDITIONAL_CONSOLE_COMMANDS = 'additional_console_commands';
}
