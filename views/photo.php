<?php include VIEWS.'header.php' ?>
	<div class = "container">
		<div class="row">
			<div class="col-sm-12">
				<h4>Name: <?php echo $photo['name']; ?></h4>
				<p>
					<strong>Description: </strong><?php echo $photo['description']; ?>
				</p>
				<?php if ($cur_user['id'] == $photo['user_id']): ?>
					<p>
						<a href="<?php echo WEB; ?>photos/<?php echo $photo['id']; ?>/edit">Edit photo</a> | 
						<a href="<?php echo WEB; ?>photos/<?php echo $photo['id']; ?>/delete">Delete photo</a>
					</p>
				<?php endif; ?>
				<img src="<?php echo UPLOAD.$photo['filename']; ?>" class="img-thumbnail img-responsive" />
				<br /><br />
				<p>
					<strong>
						User: 
						<a href="<?php echo WEB; ?>users/<?php echo $photo['user_id']; ?>/photos">
							<?php echo $photo['user']['name']; ?>
						</a>
					</strong>
				</p>
				<p>
					<strong>
						Album: 
						<a href="<?php echo WEB; ?>albums/<?php echo $photo['album_id']; ?>">
							<?php echo $photo['album']['name']; ?>
						</a>
					</strong>
				</p>
			</div>
		</div>
	</div>
</body>
</html>