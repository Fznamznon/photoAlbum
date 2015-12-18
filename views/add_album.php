<?php _header(); ?>
<div class="row">
	<div class="col-md-12">
		<form method="POST" action="<?php echo WEB.'albums/add';?>" class='form form-horizontal'>
			<div class="form-group">
				<label for="" class="control-label col-sm-2">Название : </label>
				<div class="col-sm-10">
					<input type="text" name="name" class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Описание : </label>
				<div class="col-sm-10">
					<input type = "text" name = "description" class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<label><input type="checkbox" name="privacy" value=1> Приватный</label>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type = "submit">
					<a href='<?php echo WEB;?>' class='btn btn-default'>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>