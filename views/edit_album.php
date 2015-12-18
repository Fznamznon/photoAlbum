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
	<a href=<?php echo WEB."albums/delete/".$album['id'];?>>Удалить альбом</a> &nbsp;
	<form method="POST" action="<?php echo WEB.'albums/edit/'.$album['id'];?>">
		Название: <input type="text" name="name" value=<?php echo $album['name'];?>> <br>
		Описание : <input type = "text" name = "description" value=<?php echo $album['description'];?>> <br>
		Приватный : <input type="checkbox" name="privacy" <?php if ($album['private'] ==1) echo "checked='checked'";?> value=1> <br>
		<input type="submit"> <br> <br>
		Выберите фото для удаления: <br>
	<?php

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				echo "<input type='checkbox' name='photos_to_delete[]' value=".$value['id']."> &nbsp".$value['name']."<br>" ;
				echo "<img src = '".UPLOAD."{$value['filename']}' width = '150'> ";
				echo "<br>";
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