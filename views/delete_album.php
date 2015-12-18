<?php _header(); ?>
<div class="row">
	<div class="col-md-12">
		<b> Удаление альбома приведет к удалению всех хранящихся в нем фотографий. </b> <br>
		Вы уверены, что хотите удалить альбом "<?php echo $album['name']; ?>"?
		<form method="POST" action="<?php echo WEB.'albums/delete/'.$album['id']; ?>">
			<input type = "submit" class='btn btn-danger'> 
			<a href='<?php echo WEB.'albums'; ?>'; class='btn btn-default'>Отмена</a>
		</form>
	</div>
</div>
</body>
</html>