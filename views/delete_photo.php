<?php include VIEWS.'header.php'; ?>
<?php include VIEWS.'header.php'; ?>
<div class='container'>	
	<div class="row">
		<div class='col-md-12'>
			<h3 class='page-header'>Delete photo</h3>
			<form method="POST" action="<?php echo WEB.'photos/'.$photo['id'].'/delete'; ?>" class="form-horizontal" style="padding-top: 10px;">
				<input type='hidden' name='photo_id' value='<?php echo $photo['id']; ?>' />

				<h4>Вы уверены, что хотите удалить фото <strong><?php echo $photo['name']; ?></strong>?</h4>

				<!-- <img src="<?php echo UPLOAD.$photo['filename']; ?>" class='img-responsive img-thumbnail' /> -->

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<a href="<?php echo WEB; ?>users/<?php echo $cur_user['id']; ?>/photos" class='btn btn-default'>&larr; Back to photos list</a> 
						<input type='submit' class='btn btn-danger' value='Delete photo' />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>