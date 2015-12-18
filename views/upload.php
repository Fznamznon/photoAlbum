<?php _header(); ?>
<div class="row">
	<div class="col-md-12">
		<form method = "POST" enctype = "multipart/form-data" action = "<?php echo WEB.'photos/upload'; ?>" class='form form-horizontal'>
			<?php if (!is_null($errorString)): ?>
				<div class="alert alert-danger"><strong>Ошибка! </strong><?php echo $errorString; ?></div>
			<?php endif; ?>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Название: </label>
				<div class="col-sm-10">
					<input type = "text" name = "name" class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Описание: </label>
				<div class="col-sm-10">
					<input type = "text" name = "description" class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Фото: </label>
				<div class="col-sm-10">
					<input type = "file" name = "file">
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Aльбом: </label>
				<div class="col-sm-10">
					<select name="album" class='form-control'>
						<?php if (count($albums) != 0) : foreach ($albums as $key => $value) : ?>		
							<option value = "<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>		
						<?php endforeach; endif;?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type = "submit" class='btn btn-default'>
					<a href='<?php echo WEB;?>' class='btn btn-default'>Отмена</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>