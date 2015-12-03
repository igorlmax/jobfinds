<!-- foreach act as a "for loop" -->
<?php foreach ($jobs as $job) : ?>
	<p><?php echo $job['Job']['title']?></p>
<?php endforeach; ?>