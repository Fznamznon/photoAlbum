<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method = "POST" enctype = "multipart/form-data" action = "upload.php">
		<input type = "text" name = "name">
		<br>
		<input type = "file" name = "file">
		<br>
		<input type = "submit">
	</form>
	<br>
	<?php

		if (count($photo) != 0)
		{
			foreach($photo as $value)
			{
				echo "{$value['name']} <br>" ;
				echo "<img src = 'upload/{$value['filename']}' width = '600'> ";
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