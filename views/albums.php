<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href='<?php echo WEB.'logout'; ?>'> Выйти</a> &nbsp;
	<a href='<?php echo WEB.'albums'; ?>'> Мои альбомы</a> &nbsp;
	<input type="button" value="Загрузить фотографию" onClick="location.href='<?php echo WEB.'photos/upload'; ?>';">
	<br>
	<h3>Привет, <?php echo $user['name']; ?>!</h3>
	<a href='<?php echo WEB.'albums/add'; ?>'> Создать альбом </a> <br>
	<h4>Твои альбомы:</h4>

	<?php

		if (count($albums) != 0)
		{
			foreach($albums as $album)
			{
				echo "<a href = '".WEB.'albums/'.$album['id']."'> ".$album['name']."</a><br>";
			}
		}
		else
		{
			echo "Нет альбомов";
		}

	?>
</body>
</html>