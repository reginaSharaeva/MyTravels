<?php

namespace MyTravels;

use Silex\Application as BaseApplication;
use Silex;
use MyTravels\Provider;
use Symfony\Component\HttpFoundation\Request;

class Application extends BaseApplication {


    public function __construct(){
        parent::__construct();
        $this['debug'] = true;
        $this->registerProviders();
        $this->mountControllers();
    }

    public function registerProviders() {
        $this->register(new Silex\Provider\TwigServiceProvider(), [
            "twig.path" => __DIR__ . '/views'
        ]);

        $this->register(new Silex\Provider\SessionServiceProvider());

    }

    function mountControllers() {
        $this->mount('/', new Provider\LoginControllerProvider());
        $this->mount('/main', new Provider\MainControllerProvider());  
    }
}
