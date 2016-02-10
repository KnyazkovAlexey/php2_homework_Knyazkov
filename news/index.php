<?php

require __DIR__.'/../autoload.php';

$view = new \App\View();
$view->articles = \App\Models\Article::findLast(4);			
$view->display(__DIR__.'/../App/templates/news/tmp_news.php');

?>		