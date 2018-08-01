<?php

use Xervice\Twig\TwigConfig;

$config[TwigConfig::MODULE_PATHS] = [
    dirname(__DIR__) . '/src/Xervice',
    dirname(__DIR__) . '/tests/Xervice'
];