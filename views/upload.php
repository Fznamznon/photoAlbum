<html>
<?php if ($errorString !== NULL) echo $errorString?>
<form method = "POST" enctype = "multipart/form-data" action = "<?php echo WEB.'photos/upload'; ?>">
		Имя: <input type = "text" name = "name">
		<br>
		<input type = "file" name = "file">
		<br>
		Aльбом: <select name="album">

			<?php if (count($albums) != 0) : foreach ($albums as $key => $value) : ?>
				
				<option value = "<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>
				
			<?php endforeach; endif;?>

		</select>
		<br>
		<input type = "submit">
	</form>
	<br>
</html>