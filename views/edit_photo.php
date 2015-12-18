<?php include VIEWS.'header.php'; ?>
<div class='container'>	
	<div class="row">
		<div class='col-md-12'>
			<h3 class='page-header'>Edit photo</h3>
			<form method="POST" action="<?php echo WEB.'photos/'.$photo['id'].'/edit'; ?>" class="form-horizontal" style="padding-top: 10px;">
				<input type='hidden' name='photo_id' value=<?php echo $photo['id']; ?> />
				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" value="<?php echo $photo['name']; ?>" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Description: </label> 
					<div class="col-sm-10">
						<textarea name="description" rows='3' class='form-control'><?php echo $photo['description']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<label><input type='checkbox' name='move' value='1' /> Move to another album</label><br />
						<select name='destination_album_id' class='form-control'>
							<?php foreach ($albums as $item): ?>
								<?php if ($item['id'] != $photo['album_id']): ?>
									<option value='<?php echo $item['id']; ?>'><?php echo $item['name']; ?></option>
								<?php endif;?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<input type='submit' class='btn btn-default' />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>