<?php
	function _header()
	{
			$user = users_getCurrentUser();
			if ($user['id'] == -1) {
				echo "<a href=".WEB."login>Войти</a> &nbsp;";
				echo "<a href=".WEB."register>Зарегистрироваться</a> &nbsp;";
				echo "<h3>Привет, ".$user['name']."!</h3>";
				echo "<h4>В гостевом режиме доступен только просмотр фотографий. <br> Для того, чтобы загрузить свои фотографии, войдите или зарегистрируйтесь.</h4>";
			}
			else {
				echo "<a href=".WEB."logout>Выйти</a> &nbsp;";
				echo "<a href=".WEB."albums>Мои альбомы</a> &nbsp;";
				echo "<a href=".WEB."photos/upload>Загрузить фотографию</a> &nbsp;";
				echo "<br>";
				echo "<h3>Привет, ".$user['name']."!</h3>";
			}
	}
?>