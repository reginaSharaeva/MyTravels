<?php 

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

$currentUser = \MyTravels\Service\UserService::get_user_by_token($session->get('accessToken'));

$country = $_REQUEST['country'];

\MyTravels\Service\TravelService::add_travel($currentUser['id'], $country);

$gen = new \MyTravels\Common\JSGenerate();
$boundaries = \MyTravels\Service\TravelService::get_all_boundaries($currentUser['id']);
//var_dump($boundaries);
$gen->generate_js_border_overlay($boundaries);