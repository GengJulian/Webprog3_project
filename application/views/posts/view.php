<?php foreach ($posts as $post) :?>
	<br>
	<h3><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?></small></br>
	<?php echo $post['body']; ?><br>
	<hr>
	<a class="btn btn-primary float-left" style="margin: 0 10px;" href="/posts/edit/<?php echo $post['id']; ?>">Edit</a>
	<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
<?php endforeach;?>


