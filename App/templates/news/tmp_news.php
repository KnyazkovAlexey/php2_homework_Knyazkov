<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?> 
	<br>
	<b>Новости:</b>
	<br>	
	<?php foreach($articles as $article): ?>
	    <br>
        <a href="/?ctrl=News&action=One&id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
		<br>
		<?php if(!empty($article->author)): ?>
		  Автор: <?php echo $article->author->name; ?>
	    <?php endif; ?>
	    <hr>
    <?php endforeach; ?>	
  </body>
</html>	