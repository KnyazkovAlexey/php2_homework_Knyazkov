<?php 

require __DIR__.'/../../autoload.php';

if (isset($_GET['id'])){
    $article = \App\Models\Article::findById((int)$_GET['id']);	
}
else {
	$article = new \App\Models\Article();
}	
	
$view = new \App\View();
$view->article = $article;
$view->authors = \App\Models\Author::findAll();	
$view->display(__DIR__.'/../../App/templates/admin/news/tmp_edit.php');
	
?>	




