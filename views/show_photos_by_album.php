<?php include VIEWS.'header.php' ?>
	
<div class="container">
<h3>Album <?php echo $album['name']; ?> : </h3>
	
	<div class="row">
	<?php	if (count($photo) != 0) : foreach($photo as $value) : ?>
		
		<div class="col-sm-6 photo ">
		<label>Name: <?php	echo "{$value['name']}"; ?></label>
		<a href="<?php echo WEB.'photos/'."{$value['id']}";?>"><?php	echo "<img src = '".UPLOAD."{$value['filename']}' class = 'img-responsive img-thumbnail'> "; ?></a>
		</div>
		
	<?php endforeach; else : ?>
	<label>No photos!</label>
	<?php endif ?>
	</div>
</div>

</body>
</html>