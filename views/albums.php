<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
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