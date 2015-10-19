<?php if ( isset($message) && is_array($message)) : ?>
<?php foreach ($message as $value):?>
  <p class="bg-danger"><?php echo $value; ?></p>      
 <?php endforeach; ?>  
<?php endif; ?>
