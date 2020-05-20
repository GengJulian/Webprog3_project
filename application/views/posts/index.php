<br><h1><?= $title ?></h1><br>
<?php foreach($posts as $post): ?>
	<h3><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?>   <strong class="float-right"><?php echo $post['name'];?></strong></small>
	</br>
	<?php echo $post['body']; ?><br>
	<br>
	<p><a class="btn btn-primary btn-sm" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read more</a></p>
<?php endforeach;?>
