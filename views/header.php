<!DOCTYPE html>
<html>
<head>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<style type="text/css">
		.container{
			background-color:  rgba(255, 255, 255, 0.8);			
			box-shadow: 0 0 10px #000;
			border-radius: 5px; 
			margin-top: 0px;
			min-height: 500px;

		}

		body{
			background: url(<?php echo INC;  ?>background.jpg) no-repeat;
			background-attachment: fixed;
			padding-top: 48px;
		}
		.photo{
			
		}
</style>


</head>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class = "container-fluid">
		<ul class="nav navbar-nav">
		<li><a class="navbar-brand" href="<?php echo WEB; ?>">Home</a></li>
		<?php if ($cur_user['id'] == -1) : ?>
		<li><a href= "<?php echo WEB.'login/' ?>">Login</a> </li>
		<li><a href= "<?php echo WEB.'register/' ?>">Register</a> </li>
		<?php else : ?>
		<li><a href= "<?php echo WEB.'albums/add/' ?>">Add album</a></li>
		<li><a href= "<?php echo WEB.'users/'."{$cur_user['id']}".'/albums/'; ?>">My Albums</a> </li>
		<li><a href= "<?php echo WEB.'photos/upload/' ?>">Add photo</a> </li>
		<li><a href= "<?php echo WEB.'users/'."{$cur_user['id']}".'/photos/'; ?>">My photos</a> </li>
		<?php endif; ?>
		</ul>
	</div>


</nav>


<body>