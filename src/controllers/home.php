<?php 

namespace Home;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController 
{
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig');
    }
}