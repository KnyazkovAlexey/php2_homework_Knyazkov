<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?> 
    <a href="/admin/news/edit.php">Добавить новость</a>	
	<br><br>
	<b>Список новостей:</b>
	<br><br>
	<?php foreach ($articles as $article): ?>
        Название: <a href="/admin/news/edit.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
		<br>
		<?php if(!empty($article->author)): ?>
		  Автор: <?php echo $article->author->name; ?>
		  <br>
	    <?php endif; ?>
		<a href="/admin/news/delete.php?id=<?php echo $article->id; ?>">Удалить</a>
	    <hr><br>
    <?php endforeach; ?>
	
  </body>
</html>	