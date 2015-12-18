<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="button" value="Выйти" onClick="location.href='<?php echo WEB.'logout'; ?>';">
	<input type="button" value="Cоздать альбом" onClick="location.href='<?php echo WEB.'albums/add'; ?>';">
	<input type="button" value="Загрузить фотографию" onClick="location.href='<?php echo WEB.'photos/upload'; ?>';">
	<br>
	<h3>Привет, <?php echo $user['name']; ?>!</h3>

	<?php

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				echo "{$value['name']} <br>" ;
				echo "<img src = '".UPLOAD."{$value['filename']}' width = '600'> ";
				echo "<br>";
			}
		}
		else
		{
			echo "Нет фото";
		}

	?>
</body>
</html>