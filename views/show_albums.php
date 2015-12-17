<?php include VIEWS.'header.php' ?>
<div class="container">
	<h3> <?php echo $cur_user['name']; ?>'s albums:</h3> 
	<ul>
	<?php if (count($albums) != 0) : foreach ($albums as $album): ?> 
		<li><a href="<?php echo WEB; ?>albums/<?php echo $album['id']; ?>"> <?php echo $album['name']; ?> </a></li>
	<?php endforeach; else : ?>
		<li> No albums :( </li>
	<?php endif; ?>
	</ul>
</div>
</html>