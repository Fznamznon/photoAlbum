<?php _header(); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (!is_null($errorString)): ?>
			<div class="alert alert-danger"><strong>Ошибка! </strong><?php echo $errorString; ?></div>
		<?php endif; ?>
		<form method="POST" action="<?php echo WEB.'register'; ?>" class='form form-horizontal'>
			<div class='form-group'>
				<label for="" class="control-label col-sm-2">
					Имя: 
				</label>
				<div class="col-sm-10">
					<input type = "text" name = "name" class='form-control'> 
				</div>
			</div>

			<div class='form-group'>
				<label for="" class="control-label col-sm-2">
					Логин: 
				</label>
				<div class="col-sm-10">
					<input type = "text" name = "login" class='form-control'> 
				</div>
			</div>

			<div class='form-group'>
				<label for="" class="control-label col-sm-2">
					Пароль: 
				</label>
				<div class="col-sm-10">
					<input type = "password" name = "password" class='form-control'>
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
</bpdy>
</html>