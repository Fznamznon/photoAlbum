<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	<h4>
	Альбом: <?php echo "".$album['name']." (".$album['numberofphotos']." фото)"; ?> <br> 
	Владелец: <?php echo $album['user']['name']." (".$album['user']['login'].")"; ?> <br>
	<?php if ($album['description'] != "") echo "Описание: ".$album['description']."<br>"; ?> 
	</h4>
	<?php if ($album['user_id'] == $user['id']) echo "<a href='".WEB."albums/edit/".$album['id']."'> Редактировать альбом</a> <br><br>";

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				if ($value['name'] != "") echo "<b>".$value['name']."</b><br>";
				if ($value['description'] != "") echo "".$value['description']."<br>";
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