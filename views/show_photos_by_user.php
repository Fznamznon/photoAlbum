<?php include VIEWS.'header.php' ?>
<div class="container">
	<h3 class='page-header'><?php echo $user['name']; ?>'s photos: </h3>
	
	<div class="row">
		<?php if (count($photos) != 0) : foreach($photos as $value) : ?>
			<div class="col-sm-6 photo ">
				<label>Name: <?php	echo "{$value['name']}"; ?></label>
				<a href="<?php echo WEB."photos/{$value['id']}";?>"><?php echo "<img src = '".UPLOAD."{$value['filename']}' class = 'img-responsive img-thumbnail'>"; ?></a>
			</div>
		<?php endforeach; else : ?>
			<div class="col-sm-2">
				<p><strong>No photos!</strong></p>
			</div>
		<?php endif ?>
	</div>
</div>

</body>
</html>