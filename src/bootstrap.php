<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Monolog\Logger;

$app = new Application();

$app['environment'] = 'development';

$app['config'] = require_once __DIR__ . '/../config/' . $app['environment'] . '.php';

$app->register(new TwigServiceProvider(), [
    'twig.path' => $app['config']['path']['views']
]);

$app->register(new MonologServiceProvider(), [
    'monolog.logfile' => $app['config']['path']['logs'] . 'temp.log',
    'monolog.level' => Logger::WARNING,
    'monolog.permission' => 0777
]);

$app['debug'] = $app['config']['application']['debug'];

$app->register(new ServiceControllerServiceProvider());

return $app;