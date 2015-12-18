<?php _header();?>
<div class="row">
	<div class="col-md-12">
		<h4>
			Альбом: <?php echo "".$album['name']." (".$album['numberofphotos']." фото)"; ?>
		</h4>
		<h4>
			Владелец: <?php echo $album['user']['name']." (".$album['user']['login'].")"; ?>
		</h4>
		<p>
			<?php if ($album['description'] != "") echo "Описание: ".$album['description']."<br>"; ?> 
		</p>
		<p>
			<?php if ($album['user_id'] == $user['id']) echo "<a href='".WEB."albums/edit/".$album['id']."'> Редактировать альбом</a> <br><br>"; ?>
		</p>
	</div>
		<?php

			if (count($photo) != 0)
			{
				foreach($photo as $value)
				{
					echo "<div class='col-md-6'>";
					if ($value['name'] != "") echo "<b>".$value['name']."</b><br>";
					if ($value['description'] != "") echo "".$value['description']."<br>";
					echo "<img src = '".UPLOAD."{$value['filename']}' class='img-thumbnail img-responsive'> ";
					echo "<br><br></div>";
				}
			}
			else
			{
				echo "<div class='col-md-12'><p>Нет фото</p></div>";
			}

		?>
</div>
</body>
</html>