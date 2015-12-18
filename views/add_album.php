<?php include VIEWS.'header.php' ?>
<div class = "container">
	<h3 class="page-header">Create new album</h3>
	<div class="row">
		<div class="col-sm-12">
			<form class = "form-horizontal" style = "padding-top: 10px;" method = "POST" action = "<?php echo WEB.'albums/add'; ?>">			
				<div class="form-group">
					<label class="col-sm-2 control-label">Name: </label> 
					<div class="col-sm-10">
						<input type = "text" name = "name" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description: </label> 
					<div class="col-sm-10">
						<textarea rows='3' name = "description" class="form-control"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<label><input type="checkbox" id="privacyCheckbox" name="privacy" value=1> Private </label>
					</div>
				</div>
				
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