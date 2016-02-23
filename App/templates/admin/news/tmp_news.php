<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?> 
    <a href="/admin/News/Edit">Добавить новость</a>	
	<br><br>
	<b>Список новостей:</b>
	<br>
	<?php foreach ($articles as $article): ?>
		<br>	
        Название: <a href="/admin/News/Edit?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
		<br>
		<?php if(!empty($article->author)): ?>
		  Автор: <?php echo $article->author->name; ?>
		  <br>
	    <?php endif; ?>
		<a href="/admin/News/Delete?id=<?php echo $article->id; ?>">Удалить</a>
	    <hr><br>
    <?php endforeach; ?>
	<?php if(!$articles){echo 'список пуст';} ?>	
  </body>
</html>	