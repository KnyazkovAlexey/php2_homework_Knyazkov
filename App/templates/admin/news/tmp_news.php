<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?> 
    <a href="/admin/?ctrl=Admin\News&action=Edit">Добавить новость</a>	
	<br><br>
	<b>Список новостей:</b>
	<br><br>
	<?php foreach ($articles as $article): ?>
        Название: <a href="/admin/?ctrl=Admin\News&action=Edit&id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
		<br>
		<?php if(!empty($article->author)): ?>
		  Автор: <?php echo $article->author->name; ?>
		  <br>
	    <?php endif; ?>
		<a href="/admin/?ctrl=Admin\News&action=Delete&id=<?php echo $article->id; ?>">Удалить</a>
	    <hr><br>
    <?php endforeach; ?>
	
  </body>
</html>	