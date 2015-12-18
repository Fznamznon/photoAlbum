<?php include VIEWS.'header.php' ?>

<div class="container">
	<h3>Hello, <?php echo $cur_user['name']; ?>! All photos:</h3>

	<div class="row">
		<?php if (count($photo) != 0): ?>
			<?php foreach($photo as $value) : ?>
				<div class="col-sm-6 photo">
					<strong>Name: <?php	echo $value['name']; ?></strong>
					<a href="<?php echo WEB.'photos/'.$value['id']; ?>">
						<img src="<?php echo UPLOAD.$value['filename']; ?>" class="img-responsive img-thumbnail" />
					</a>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="col-md-12">
				<strong>No photos!</strong>
			</div>
		<?php endif; ?>
	</div>
</div>

</body>
</html>