<?php include VIEWS.'header.php'; ?>
<?php include VIEWS.'header.php'; ?>
<div class='container'>	
	<div class="row">
		<div class='col-md-12'>
			<h3 class='page-header'>Удаление альбома</h3>
			<form method="POST" action="<?php echo WEB.'albums/'.$album['id'].'/delete'; ?>" class="form-horizontal" style="padding-top: 10px;">
				<input type='hidden' name='album_id' value='<?php echo $album['id']; ?>' />

				<h4>Вы уверены, что хотите удалить альбом <strong><?php echo $album['name']; ?></strong>?</h4>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label> 
					<div class="col-sm-10">
						<label><input type='radio' name='photos_action' value='delete' /> Delete all photos from album</label><br />
						<label><input type='radio' name='photos_action' value='move' checked /> Move all photos to another album</label>	
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Album for move: </label> 
					<div class="col-sm-10">
						<select name='destination_album_id' class='form-control'>
							<?php foreach ($albums as $item): ?>
								<?php if ($item['id'] != $album_id): ?>
									<option value='<?php echo $item['id']; ?>'><?php echo $item['name']; ?></option>
								<?php endif;?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<a href="<?php echo WEB; ?>users/<?php echo $cur_user['id']; ?>/albums" class='btn btn-default'>&larr; Back to albums list</a> 
						<input type='submit' class='btn btn-danger' value='Delete album' />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>