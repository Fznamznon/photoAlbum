<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="button" value="Войти" onClick="location.href='<?php echo WEB.'login'; ?>';">
	<input type="button" value="Зарегистрироваться" onClick="location.href='<?php echo WEB.'register'; ?>';">
	<br>
	<h3>Привет, Гость!</h3>
	<h4>В гостевом режиме доступен только просмотр фотографий. <br> Для того, чтобы загрузить свои фотографии, войдите или зарегистрируйтесь.</h4>
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