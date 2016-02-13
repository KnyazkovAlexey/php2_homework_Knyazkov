<?php

require __DIR__.'/../autoload.php';

#echo 'админка';
$path = str_replace('/admin', '', parse_url($_SERVER['REQUEST_URI'])['path']);
$path_parts = array_filter(explode('/', $path));
$action = array_pop($path_parts) ?: 'Index'; 
$controllerName = '\App\Controllers\\'.(implode('\\', $path_parts) ?: 'Admin\News');
$controller = new $controllerName();
$controller->action($action);

?>		