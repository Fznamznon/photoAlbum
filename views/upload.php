<?php include VIEWS.'header.php' ?>
<div class = "container">
	<h3 class='page-header'>Upload new photo</h3>
	<div class="row">
		<div class="col-sm-12">
			<form class = "form-horizontal" style = "padding-top: 10px;" method = "POST" enctype = "multipart/form-data" action = "<?php echo WEB.'photos/upload'; ?>">
				<?php if (!is_null($errorString)): ?>
					<div class="alert alert-danger">
						<strong>Ошибка! </strong> <?php echo $errorString; ?>
					</div>
				<?php endif; ?>

				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Description: </label> 
					<div class="col-sm-10">
						<textarea rows='3' name='description' class='form-control'></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<label>File input</label>
						<input type = "file" name = "file">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Album: </label> 
					<div class="col-sm-10">
						<select name="album_id" class="form-control">
							<?php foreach ($albums as $value): ?>
								<option value = "<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
							<?php endforeach; ?>

						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type = "submit" class="btn btn-default" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</html>