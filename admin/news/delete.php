<?php 

require __DIR__.'/../../autoload.php';

if (!empty($_GET['id'])){
    $article = \App\Models\Article::findById((int)$_GET['id']);	
	$article->delete();
}	
header('Location: /admin/news/');		

?>	