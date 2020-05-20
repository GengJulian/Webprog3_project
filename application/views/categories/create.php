<h2><?= $title ;?></h2>

<?php echo form_open('categories/create')?>
<?php echo validation_errors(); ?>
	<div class="form-group">
		<label for="title">Name</label>
		<input type="text" name="title" class="form-control" >
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
</form>
