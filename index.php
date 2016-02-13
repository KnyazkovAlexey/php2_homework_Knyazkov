<?php

require __DIR__.'/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$path_parts = array_filter(explode('/', $path));
$actionName = array_pop($path_parts) ?: 'Index'; 
$controllerName = '\App\Controllers\\'.(implode('\\', $path_parts) ?: 'News');
#проверку сущ-я класса
$controller = new $controllerName();
$action = $actionName ?: 'Index';
$controller->action($action);

?>		