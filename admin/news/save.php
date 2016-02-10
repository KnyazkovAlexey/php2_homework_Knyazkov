<?php 

require __DIR__.'/../../autoload.php';

if (!empty($_POST['id'])){
    $article = \App\Models\Article::findById((int)$_POST['id']);	
}
else {	
	$article = new \App\Models\Article();
}
$article->title = $_POST['title'];
$article->content = $_POST['content'];
if (!empty($_POST['author_id'])){
    $article->author = \App\Models\Author::findById((int)$_POST['author_id']);
}		
else{
	$article->author_id = null;
}	
$article->save();

header('Location: /admin/news/');		

?>	