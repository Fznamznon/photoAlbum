<?php include VIEWS.'header.php' ?>
<div class = "container">
	<h3>Create new album</h3>
	<div class="row">
		<div class="col-sm-12">
			<form class = "form-horizontal" style = "padding-top: 10px;" method = "POST" action = "<?php echo WEB.'albums/add';?>">
<br>
<input type="button" value="Отмена" onClick="location.href='<?php echo WEB;?>'">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "description" class="form-control">
					</div>
				</div>
				
				Приватный : <input type="checkbox" name="privacy" value=1>

				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type = "submit" class="btn btn-default" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</html>