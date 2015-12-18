<?php
	function _header()
	{
			$user = users_getCurrentUser();
			echo "<a href=".WEB."logout>Выйти</a> &nbsp;";
			echo "<a href=".WEB."albums>Мои альбомы</a> &nbsp;";
			echo "<a href=".WEB."photos/upload>Загрузить фотографию</a> &nbsp;";
			echo "<br>";
			echo "<h3>Привет, ".$user['name']."!</h3>";
	}
?>