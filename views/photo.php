<?php include VIEWS.'header.php' ?>
	
	
	
	<div class = "container">
		<div class="row">
			<div class="col-sm-12">
			<?php
					
				echo "<h4>Name: {$photo['name']} </h4>" ;
				echo "<img src = '".UPLOAD."{$photo['filename']}'  class='img-thumbnail'> <br> <br>";
				echo "<p><strong>User: {$photo['user']['name']}</strong></p>";	
				echo "<p><strong>Album: {$photo['album']['name']}</strong></p>";
			?>
			</div>
		</div>
	</div>
</body>
</html>