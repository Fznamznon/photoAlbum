<?php _header();?>
<div class="row">
	<div class="col-md-12">
		<h4 class='page-header'>Публичные альбомы: </h4>

		<?php

			if (count($albums) != 0)
			{
				foreach($albums as $album)
				{
					echo "<a href = '".WEB.'albums/'.$album['id']."'> ".$album['name']."</a> (".$album['numberofphotos']." фото, 
					владелец: ".users_getbyID($album['user_id'])['login'].")<br>";
				}
			}
			else
			{
				echo "Нет альбомов";
			}

		?>
	</div>
</div>
</body>
</html>