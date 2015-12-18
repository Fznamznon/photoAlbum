<?php _header(); ?>
<div class="row">
	<div class="col-md-12">
		<?php
			
			echo "<p><strong>{$photo['name']}</strong> </p>" ;
			echo "<img src = '".UPLOAD."{$photo['filename']}' class='img-responsive img-thumbnail'> ";
			echo "<br><br>";
			echo "<p>User: <strong>{$photo['user']['name']}</strong> </p>";	
			echo "<p>Album: <strong>{$photo['album']['name']}</strong> </p>";
		?>
	</div>
</div>
	
</body>
</html>