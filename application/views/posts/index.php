<br><h1><?= $title ?></h1><br>
<?php foreach($posts as $post): ?>
	<br>
	<h3 class="title"><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img class="post-image" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>"/>
		</div>
		<div class="col-md-9">
			<small class="post-date">Posted on: <?php echo $post['created_at'];?>   <strong class="float-right"><?php echo $post['name'];?></strong></small>
			</br>
			<?php echo $post['body']; ?><br>
			<br>
			<p><a class="btn btn-primary btn-sm" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read more</a></p>
		</div>
	</div>


<?php endforeach;?>
