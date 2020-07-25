#!/bin/php
<?php

use masch\SemSearch\DI\AppContainerBuilder;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$version = '??';
$name = '??';
try {
    $content = file_get_contents(dirname(__DIR__) . '/composer.json');
    $data = json_decode($content, true);
    $version = $data['version'];
    $name = $data['name'];
} catch(\Throwable $e) {
    echo "[W] " . $e->getMessage() . PHP_EOL;
}

$container = AppContainerBuilder::build();
$app = new Application($name, $version);
$app->setCommandLoader($container->get('console.command_loader'));
$input = new ArgvInput();
$app->run($input);
