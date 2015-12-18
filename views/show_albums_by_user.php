<?php include VIEWS.'header.php' ?>
<div class="container">
	<h3 class='page-header'><?php echo $user['name']; ?>'s albums:</h3> 
	<ul>
		<?php if (count($albums) != 0): foreach ($albums as $album): ?> 
			<li><a href="<?php echo WEB; ?>albums/<?php echo $album['id']; ?>"><?php echo $album['name']; ?></a></li>
		<?php endforeach; else : ?>
			<li> No <?php if ($public_only) echo "public"; ?> albums :( </li>
		<?php endif; ?>
	</ul>
</div>
</body>
</html>