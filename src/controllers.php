<?php

require_once ('controllers/home.php');
require_once ('controllers/admin.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Home;
use Admin;
//Request::setTrustedProxies(array('127.0.0.1'));

$index = $app['controllers_factory'];

$index->get('/', 'Home\HomeController::indexAction');

$admin = $app['controllers_factory'];

$admin->get('/', 'Admin\AdminController::indexAction');

// $app->error(function (\Exception $e, Request $request, $code) use ($app) {
//     if ($app['debug']) {
//         return;
//     }
//     // 404.html, or 40x.html, or 4xx.html, or error.html
//     $templates = array(
//         'errors/'.$code.'.html.twig',
//         'errors/'.substr($code, 0, 2).'x.html.twig',
//         'errors/'.substr($code, 0, 1).'xx.html.twig',
//         'errors/default.html.twig',
//     );
//     return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
// });

$app->mount('/', $index);
$app->mount('/admin', $admin);