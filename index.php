<?php
define('__HOME__', $_SERVER['DOCUMENT_ROOT']);
require_once 'Route/Router.php';

$router = new Router();
$router->route();