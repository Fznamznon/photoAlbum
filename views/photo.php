<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<br>
	<?php
			
		echo "{$photo['name']} <br>" ;
		echo "<img src = '".UPLOAD."{$photo['filename']}' width = '800'> ";
		echo "<br>";
		echo "User: {$photo['user']['name']} <br>";	
		echo "Album: {$photo['album']['name']} <br>";
	?>
</body>
</html>