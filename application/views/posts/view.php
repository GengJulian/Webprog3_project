<?php foreach ($posts as $post) :?>
	<br>
	<h3><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?></small></br>
	<?php echo $post['body']; ?><br>
	<hr>
	<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="button" value="delete" class="btn btn-danger">
	</form>
<?php endforeach;?>


