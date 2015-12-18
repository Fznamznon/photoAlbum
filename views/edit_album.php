<?php _header();?>
<div class="row">
	<div class="col-md-12">
		<h4 class='page-header'>Редактирование альбома</h4>
		<a href=<?php echo WEB."albums/".$album['id'];?>>Вернуться к просмотру</a><br>
		<a href=<?php echo WEB."albums/delete/".$album['id'];?>>Удалить альбом</a><br><br>
		<form method="POST" action="<?php echo WEB.'albums/edit/'.$album['id'];?>" class='form form-horizontal'>
			<div class="form-group">
				<label for="" class="control-label col-sm-2">Название: </label>
				<div class="col-sm-10">
					<input type="text" name="name" value='<?php echo $album['name'];?>' class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-sm-2">Описание : </label>
				<div class="col-sm-10">
					<input type = "text" name = "description" value='<?php echo $album['description'];?>' class='form-control'>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="checkbox" name="privacy" <?php if ($album['private'] ==1) echo "checked='checked'";?> value=1> Приватный
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class='btn btn-default'>
					<a href="<?php echo WEB; ?>" class='btn btn-default'>Отмена</a>
				</div>
			</div>
			
			<hr />

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<h4> Отредактируйте фото: </h4>
				</div>
			</div>

			
		<?php

			if (count($photo) != 0)
			{
				foreach($photo as $value)
				{
					?>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo "<img src = '".UPLOAD."{$value['filename']}' width = '150' class='img-thumbnail'> "; ?>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-sm-2">Название: </label>
						<div class="col-sm-10">
							<input type='text' name='edited_photos[<?php echo $value['id']; ?>]' value='<?php echo $value['name']; ?>' class='form-control'>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-sm-2">Описание: </label>
						<div class="col-sm-10">
							<input type='text' name='edited_photos_desc[<?php echo $value['id']; ?>]' value='<?php echo $value['description']; ?>' class='form-control'>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<label>Удалить? <input type='checkbox' name='photos_to_delete[]' value="<?php echo $value['id']; ?>"></label>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-sm-2">Перенести в </label>
						<div class="col-sm-10">
							<select name='to_album[<?php echo $value['id']; ?>]' class='form-control'>
								<?php 
									if (count($albums) !== 0) {
										foreach ($albums as $alb) {
											echo "<option value = ".$alb['id'];
											if ($album['id'] == $alb['id']) echo " selected='selected'";
											echo ">".$alb['name']."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
			<?php
				}
			}
			else
			{
				echo "<div class='form-group'><div class='col-sm-10 col-sm-offset-2'>Нет фото</div></div>";
			}

		?>
		</form>
	</div>
</div>

</body>
</html>