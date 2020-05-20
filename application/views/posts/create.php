<h2><?= $title; ?></h2>

<?php echo form_open_multipart('posts/create'); ?>
<?php echo validation_errors(); ?>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" >
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Body</label>
		<textarea id="editor" class="form-control" name="body" placeholder="Add Post body"></textarea>
	</div>
	<div class="form-group">
		<label for="category_id">Category</label>
		<select name="category_id" class="form-control">
			<?php foreach ($categories as $category): ?>
			<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label for="userfile">Post image</label>
		<input type="file" name="userfile" size="20"/>
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
</form>
