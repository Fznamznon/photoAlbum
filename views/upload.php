<?php include VIEWS.'header.php' ?>
<div class = "container">
	<h3>Upload new photo</h3>
	<div class="row">
		<div class="col-sm-12">
			<form class = "form-horizontal" style = "padding-top: 10px;" method = "POST" enctype = "multipart/form-data" action = "<?php echo WEB.'photos/upload'; ?>">
<?php if ($errorString !== NULL) echo $errorString?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" class="form-control">
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
				<select name="album" class="form-control">
					<option value="-1"> </option>
					<?php if (count($albums) != 0) : foreach ($albums as $key => $value) : ?>
						
						<option value = "<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>
						
					<?php endforeach; endif;?>

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