<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

final class ConfigurationKey
{
    public const PROJECT_ROOT = 'project_root';
    public const TEMPLATES_DIR = 'templates_dir';
    public const OUTPUT_DIR = 'output_dir';
    public const OUTPUT_DIR_BASE_URL = 'output_dir_base_url';
    public const CACHE_DIR = 'cache_dir';
    public const PAGE_LINK_PROCESSOR = 'page_link_processor';
    public const GIT_CLIENT_PATH = 'git_client_path';
    public const USE_SHARED_CACHE = 'use_shared_cache';
    public const CHECK_FILE_IN_GIT_BEFORE_CREATING_DOC = 'check_file_in_git_before_creating_doc';
    public const SOURCE_LOCATORS = 'source_locators';
    public const LANGUAGE_HANDLERS = 'language_handlers';
    public const PLUGINS = 'plugins';
    public const TWIG_FUNCTIONS = 'twig_functions';
    public const TWIG_FILTERS = 'twig_filters';
    public const ADDITIONAL_CONSOLE_COMMANDS = 'additional_console_commands';
}
