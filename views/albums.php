<?php _header();?>
<div class="row">
	<div class="col-md-12">
		<a href='<?php echo WEB.'albums/add'; ?>'>Создать альбом</a> &nbsp;
		<a href='<?php echo WEB."photos/upload"; ?>'>Загрузить фотографию</a> <br>
		<h4 class='page-header'>Мои альбомы: </h4>

		<?php

			if (count($albums) != 0)
			{
				foreach($albums as $album)
				{
					echo "<a href = '".WEB.'albums/'.$album['id']."'> ".$album['name']."</a> (".$album['numberofphotos']." фото)<br>";
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