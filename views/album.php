<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php _header();?>
	<h4> <?php echo $album['name']; ?> </h4>
	<a href='<?php echo WEB.'albums/delete/'.$album['id']; ?>'> Удалить альбом</a> <br><br>
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