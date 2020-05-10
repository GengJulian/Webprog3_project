<h2><?= $title; ?></h2>

<?php echo form_open('posts/create'); ?>
<?php echo validation_errors(); ?>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" >
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Body</label>
		<textarea id="editor" class="form-control" name="body" placeholder="Add Post body"></textarea>
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
</form>
