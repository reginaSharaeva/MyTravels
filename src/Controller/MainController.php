<?php

namespace MyTravels\Controller;

use MyTravels;
use MyTravels\Common;
use MyTravels\Service;

class MainController {

	public static function doGet(MyTravels\Application $app) {

        $app['session']->set('accessToken', 'EAACCPoeBKncBAB1NYqmfu2fmBXCZAylwuEpfWgSPpiN6KntZCfL4GDEiyRsXmXFcQYFDnw5Ph88pZCtmP1RR6R3vU9ajyM7TFpZBouYtRo8IMleMX9poXsuZC4FaJgM5uu5acmRBBmpvE83bFz9vLn49CSR5Rg6SGrKKUS9oSRlWJJWtzZAfbTc5ZCLJwDrvYh3UHXNZBZCIyUwZDZD');

    	$currentUserToken = $app['session']->get('accessToken');

        if ($currentUserToken) {

            $gen = new Common\JSGenerate();
            $boundaries = array();

            $currentUser = Service\UserService::get_user_by_token($currentUserToken);

            if ($currentUser) {
                $boundaries = Service\TravelService::get_all_boundaries($currentUser['id']);
            } else {
                $id = Service\UserService::add_user($currentUserToken);
            }

            $gen->generate_js_border_overlay($boundaries);    
        
            return $app['twig']->render('main.twig.html');

        } else {
            return $app->redirect('/');
        }

	}
	
}