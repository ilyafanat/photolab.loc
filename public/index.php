<?php 

$app = require_once 'bootstrap.php';

$index = $app['controllers_factory'];

$index->get('/', function () use ($app) {
    return $app['twig']->render('base.twig');
});

$app->mount('/', $index);

$app->run();