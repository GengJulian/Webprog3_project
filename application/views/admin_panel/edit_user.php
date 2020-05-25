<strong class="validation-error"><?php echo validation_errors(); ?></strong>
<?php echo form_open('admin_panel/update_user'); ?>
<input type="hidden" name="user_id" value="<?php echo $users[0]['id']; ?>">
<div class="row justify-content-center">
	<div class="col-md-4">
		<h2 class="text-center"><?php echo $title; ?></h2>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $users[0]['name']  ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $users[0]['email'] ?>">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $users[0]['username'] ?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" class="form-control">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="password2" placeholder="Confirm Password" class="form-control">
		</div>
		<div class="form-group">
			<label>Zipcode</label>
			<input type="text" name="zipcode" placeholder="Zipcode" class="form-control" value="<?php echo $users[0]['zipcode'] ?>">
		</div>
		<div class="form-group">
			<label>Account type</label>
			<select class="form-control" id="exampleSelect1" name="account_type">
				<option value="normal">normal</option>
				<option value="admin">admin</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close();?>
