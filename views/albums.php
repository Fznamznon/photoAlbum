<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	<a href='<?php echo WEB.'albums/add'; ?>'>Создать альбом</a> &nbsp;
	<a href='<?php echo WEB."photos/upload"; ?>'>Загрузить фотографию</a> <br>
	<h4>Мои альбомы: </h4>

	<?php

		if (count($albums) != 0)
		{
			foreach($albums as $album)
			{
				echo "<a href = '".WEB.'albums/'.$album['id']."'> ".$album['name']."</a> (".$album['numberofphotos']." фото)<br>";
			}
		}
		else
		{
			echo "Нет альбомов";
		}

	?>
</body>
</html>