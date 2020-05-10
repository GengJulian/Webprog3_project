<h2><?= $title; ?></h2>
<?php foreach ($posts as $post): ?>
<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" class="form-control" value="<?= $post['title']; ?>">
</div>
<div class="form-group">
	<label for="exampleInputPassword1">Body</label>
	<textarea id="editor" class="form-control" name="body"><?= $post['body']; ?></textarea>
</div>
<button type="submit" class="btn btn-success">Submit</button>
</form>
<?php endforeach; ?>
