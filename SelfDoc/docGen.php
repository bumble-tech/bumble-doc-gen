#!/usr/bin/env php
<?php

ini_set('memory_limit', '-1');

require_once __DIR__ . '/../vendor/autoload.php';

(new \SelfDoc\Console\App())->run();