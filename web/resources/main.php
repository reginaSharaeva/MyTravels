<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

$session->set('accessToken', $_REQUEST['token']);
