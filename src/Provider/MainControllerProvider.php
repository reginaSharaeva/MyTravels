<?php

namespace MyTravels\Provider;

use Silex;
use MyTravels\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainControllerProvider implements \Silex\Api\ControllerProviderInterface {

    public function connect(Silex\Application $app) {

        $controllers = $app['controllers_factory'];

        $controllers->get('/', function() {
            $app = new \MyTravels\Application();
            return Controller\MainController::doGet($app);
        });

        // $controllers->post('/', function() {
        //     $app = new \MyTravels\Application();
        //     return Controller\MainController::doPost($app);
        // });

        return $controllers;
    }

}