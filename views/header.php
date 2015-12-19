<?php
	function _header()
	{
		echo "<link rel='stylesheet' href=".INC."bootstrap.min.css type='text/css' />";
		echo "<link rel='stylesheet' href=".INC."bootstrap-theme.min.css type='text/css' />";

		echo "<style type='text/css'>
					.container{
						background-color:  rgba(255, 255, 255, 0.8);			
						box-shadow: 0 0 10px #000;
						border-radius: 5px; 
						margin-top: 0px;
						min-height: 500px;
						padding-bottom: 15px;
					}
					body{
						background: url(".INC."background.jpg) no-repeat;
						background-attachment: fixed;
						padding-top: 48px;
					}
					.photo{
						
					}
			</style>";

			$user = users_getCurrentUser();

			echo "<nav class='navbar navbar-default navbar-fixed-top'>
					<div class = 'container-fluid'>
						<ul class='nav navbar-nav'>
							<li><a class='navbar-brand' href='".WEB."public'>Публичная галерея</a></li>";
							if ($user['id'] == -1) {
								echo "<li><a href=".WEB."login>Войти</a></li>";
								echo "<li><a href=".WEB."register>Зарегистрироваться</a></li>";
							}
							else {
								echo "<li><a href=".WEB."albums>Моя галерея</a></li>";
								echo "<li><a href=".WEB."logout>Выйти</a></li>";
							}
				  echo "</ul>
				 	</div>
				 </nav>
				 <div class='container'>";

			if ($user['id'] == -1) {
				echo "<h3 class='page-header'>Привет, ".$user['name']."!</h3>";
				echo "<h4>В гостевом режиме доступен только просмотр фотографий. <br> 
				Для того, чтобы загрузить свои фотографии, войдите или зарегистрируйтесь.</h4>";
			}
			else {
				echo "<h3 class='page-header'>Привет, ".$user['name']."!</h3>";
			}
	}
?>