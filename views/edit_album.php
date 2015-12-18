<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	<h4>
	Редактирование альбома <br>
	</h4>
	<a href=<?php echo WEB."albums/".$album['id'];?>>Вернуться к просмотру</a><br>
	<a href=<?php echo WEB."albums/delete/".$album['id'];?>>Удалить альбом</a><br><br>
	<form method="POST" action="<?php echo WEB.'albums/edit/'.$album['id'];?>">
		Название: <input type="text" name="name" value='<?php echo $album['name'];?>'> <br>
		Описание : <input type = "text" name = "description" value='<?php echo $album['description'];?>'> <br>
		Приватный : <input type="checkbox" name="privacy" <?php if ($album['private'] ==1) echo "checked='checked'";?> value=1> <br>
		<input type="submit">
		<h4> Отредактийте фото: </h4>
	<?php

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				echo "Название: <input type='text' name='edited_photos[".$value['id']."]' value='".$value['name']."'><br>" ;
				echo "Описание: <input type='text' name='edited_photos_desc[".$value['id']."]' value='".$value['description']."'><br>" ;
				echo "Удалить? <input type='checkbox' name='photos_to_delete[]' value=".$value['id']."><br>";
				echo "Перенести в <select name='to_album[".$value['id']."]'>" ;

				if (count($albums) !== 0) {
					foreach ($albums as $alb) {
						echo "<option value = ".$alb['id'];
						if ($album['id'] == $alb['id']) echo " selected='selected'";
						echo ">".$alb['name']."</option>";
					}
				}

				echo "</select><br>";
				echo "<img src = '".UPLOAD."{$value['filename']}' width = '150'> ";
				echo "<br><br>";
			}
		}
		else
		{
			echo "Нет фото";
		}

	?>
	</form>
</body>
</html>