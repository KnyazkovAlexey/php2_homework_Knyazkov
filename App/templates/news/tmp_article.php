<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?>  
	<b>Название: <?php echo $article->title; ?></b>
	<br><hr>
	<?php echo nl2br($article->content); ?>
	<br><hr>
    <?php if(!empty($article->author)): ?>
	    Автор: <?php echo $article->author->name; ?>
	<?php endif; ?>
  </body>
</html>	