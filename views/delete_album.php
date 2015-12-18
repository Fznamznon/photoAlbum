<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<b> Удаление альбома приведет к удалению всех хранящихся в нем фотографий. </b> <br>
	Вы уверены, что хотите удалить альбом "<?php echo $album['name']; ?>"?
	<form method="POST" action="<?php echo WEB.'albums/delete/'.$album['id']; ?>">
	<input type = "submit"> <input type="button" value="Отмена" onClick="location.href='<?php echo WEB.'albums'; ?>';">
	</form>
</body>
</html>