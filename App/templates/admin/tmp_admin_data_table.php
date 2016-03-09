<?php $counter = 0; ?>	
<table border="1">		
  <?php foreach ($models as $model): ?>
  	  <?php $counter++; ?>
	  <tr>
        <?php foreach ($functions as $function): ?>
	        <td>
              <?php echo $function($model); ?>
		    </td>
	    <?php endforeach; ?>
	  </tr>
  <?php endforeach; ?>
</table>
<?php if(!$counter){echo 'список пуст';} ?>		
