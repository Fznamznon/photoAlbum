<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	<h4>
	Альбом: <?php echo $album['name']; ?> <br>
	Владелец: <?php echo $album['user']['name']." (".$album['user']['login'].")"; ?> <br>
	<?php echo $album['numberofphotos']; ?> фото
	</h4>
	<?php if ($album['user_id'] == $user['id']) echo "<a href='".WEB."albums/edit/".$album['id']."'> Редактировать альбом</a> <br><br>";

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				echo "<b>Название: ".$value['name']."</b><br>";
				echo "Описание: ".$value['description']."<br>";
				echo "<img src = '".UPLOAD."{$value['filename']}' width = '600'> ";
				echo "<br><br>";
			}
		}
		else
		{
			echo "Нет фото";
		}

	?>
</body>
</html>