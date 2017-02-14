<?php
//FRONT CONTROLLER
define('ROOT', __DIR__);
require_once ROOT.'/components/Router.php';

session_start();

$router = new Route();
$router->run();