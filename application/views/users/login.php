<?php echo form_open('users/login'); ?>
<div class="row justify-content-center">
	<div class="col-md-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username"
					   required >
			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password"
					   required>
			</div>

			<button type="submit" class="btn btn-outline-success btn-block">login</button>
	</div>
</div>
<?php echo form_close(); ?>
