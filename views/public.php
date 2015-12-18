<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	
	<h4>Публичные альбомы: </h4>

	<?php

		if (count($albums) != 0)
		{
			foreach($albums as $album)
			{
				echo "<a href = '".WEB.'albums/'.$album['id']."'> ".$album['name']."</a> (Владелец: ".users_getbyID($album['user_id'])['login'].")<br>";
			}
		}
		else
		{
			echo "Нет альбомов";
		}

	?>
</body>
</html>