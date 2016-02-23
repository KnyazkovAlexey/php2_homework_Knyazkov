<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?> 
	<br>
	<b>Новости:</b>
	<br>	
	<?php foreach($articles as $article): ?>
	    <br>
        <a href="/News/One/?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
		<br>
		<?php if(!empty($article->author)): ?>
		  Автор: <?php echo $article->author->name; ?>
	    <?php endif; ?>
	    <hr>
    <?php endforeach; ?>
    <?php if(!$articles){echo 'список пуст';} ?>		
  </body>
</html>	