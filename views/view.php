<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		_header();

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