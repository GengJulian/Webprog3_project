<?php foreach ($posts as $post) :?>
	<br>
	<h3 class="title"><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?></small>
	</br>
	<?php echo $post['body']; ?><br>
	<hr>
	<a class="btn btn-primary float-left" style="margin: 0 10px;" href="<?php echo base_url(); ?>/posts/edit/<?php echo $post['slug']; ?>">Edit</a>
	<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>

	<?php echo form_open('comments/create') ?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Comment</label>
			<textarea name="name" class="form-control"></textarea>
		</div>
		<input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
		<button class="btn btn-primary" type="submit">Submit comment</button>
	</form>
<?php endforeach;?>


