<?php

require __DIR__.'/../autoload.php';

$controllerName = '\App\Controllers\\'.($_GET['ctrl'] ?: 'Admin\News');
$controller = new $controllerName();
$action = $_GET['action'] ?: 'Index';
$controller->action($action);

?>		