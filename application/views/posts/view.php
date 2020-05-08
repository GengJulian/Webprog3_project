
<?php foreach ($posts as $post) :?>
	<br>
	<h3><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?></small></br>
	<?php echo $post['body']; ?><br>
<?php endforeach;?>

