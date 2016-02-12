<?php

require __DIR__.'/autoload.php';

#$url = $_SERVER['REQUEST_URI'];
#var_dump($url);die;

$controllerName = '\App\Controllers\\'.($_GET['ctrl'] ?: 'News');
#проверку сущ-я класса
$controller = new $controllerName();
$action = $_GET['action'] ?: 'Index';
$controller->action($action);

?>		