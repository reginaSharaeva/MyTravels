<?php

namespace MyTravels\Controller;

use MyTravels;
use MyTravels\Common;
use MyTravels\Service;

class LoginController {

	public static function doGet(MyTravels\Application $app) { 
    	return $app['twig']->render('login.twig.html');
	}
	
}