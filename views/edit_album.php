<?php include VIEWS.'header.php'; ?>
<div class='container'>	
	<div class="row">
		<div class='col-md-12'>
			<h3 class='page-header'>Редактирование альбома</h3>
			<form method="POST" action="<?php echo WEB.'albums/'.$album['id'].'/edit'; ?>" class="form-horizontal" style="padding-top: 10px;">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" value="<?php echo $album['name']; ?>" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Description: </label> 
					<div class="col-sm-10">
						<textarea name="description" rows='3' class='form-control'><?php echo $album['description']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<label>
							<input type='checkbox' name='privacy' value='1' <?php if ($album['private']) echo 'checked'; ?> /> Private
						</label>	
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<input type='submit' class='btn btn-default' />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>