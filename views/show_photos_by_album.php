<?php include VIEWS.'header.php' ?>
	
<div class="container">
	<h3 class='page-header'>Album: <?php echo $album['name']; ?> <?php if ($album['private']): ?><small><span class='glyphicon glyphicon-lock'></span></small><?php endif; ?></h3>
	
	<div class="row">
		<div class='col-md-12'>
			<p>
				<strong>Description: </strong> <?php echo $album['description']; ?>
			</p>
			<?php if ($cur_user['id'] == $album['user_id']): ?>
				<p>
					<a href="<?php echo WEB; ?>albums/<?php echo $album['id']; ?>/edit">Edit album</a> | 
					<a href="<?php echo WEB; ?>albums/<?php echo $album['id']; ?>/delete">Delete album</a>
				</p>
			<?php endif; ?>
		</div>
		<?php if (count($photos) != 0) : foreach($photos as $value) : ?>
			<div class="col-sm-6 photo">
				<label>Name: <?php	echo $value['name']; ?></label>
				<a href="<?php echo WEB.'photos/'.$value['id'];?>">
					<img src="<?php echo UPLOAD.$value['filename']; ?>" class='img-responsive img-thumbnail' />
				</a>
			</div>
		<?php endforeach; else : ?>
			<div class='col-md-12'><label>No photos!</label></div>
		<?php endif ?>
		<br class='clearfix' />
	</div>
</div>

</body>
</html>