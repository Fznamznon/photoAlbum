<?php include VIEWS.'header.php' ?>
<div class="container">
	<h3 class='page-header'>Registration</h3>
	<div class="row">
		<div class="col-sm-12">
			<form method="POST" action="<?php echo WEB; ?>register" class="form-horizontal">
				<?php if (!is_null($errorString)): ?>
					<div class="alert alert-danger">
						<strong>Ошибка! </strong> <?php echo $errorString; ?>
					</div>
				<?php endif; ?>

				<div class = "form-group">
					<label class="col-sm-2 control-label">Name:</label>
					<div class ="col-sm-10">
						<input type = "text" name = "name" class="form-control"> 
					</div>
				</div>

				<div class = "form-group">
					<label class="col-sm-2 control-label">Login:</label>
					<div class ="col-sm-10">
						<input type = "text" name = "login" class="form-control"> 
					</div>
				</div>
				
				<div class = "form-group">
					<label class="col-sm-2 control-label">Password:</label>
					<div class ="col-sm-10">
						<input type = "password" name = "password" class="form-control"> 
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

