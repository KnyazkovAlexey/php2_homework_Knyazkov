<!DOCTYPE HTML>
<html>
  <body>
    <?php include __DIR__.'/../header.html'; ?>

	<form action="/admin/Admin/News/Save" method="post">
	  <input type="hidden" name="id" value="<?php echo $article->id; ?>"/>
	  <table>
        <tr>
          <td>
            Название:
          </td>
	      <td>
            <input type="text" name="title" value="<?php echo $article->title; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            Текст:
          </td>
	      <td>
            <textarea rows="10" name="content"><?php echo $article->content; ?></textarea>			
          </td>
        </tr>
        <tr>
          <td>
            Автор:
          </td>
	      <td>
		    <select name="author_id">
	          <option value="">Не выбран</option>			
	          <?php foreach ($authors as $author): ?>
	            <option <?php if ($author->id == $article->author_id) {echo 'selected';} ?> value="<?php echo $author->id; ?>">
				  <?php echo $author->name; ?>
				</option>
              <?php endforeach; ?>			
            </select>
          </td>
        </tr>		
	    <tr>
	      <td>
	        <input type="submit" value="Сохранить"/>
	      </td>
	    </tr>
      </table>
	</form>
  </body>
</html>	