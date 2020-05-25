<h1 style="text-align: center;margin:10px auto;"><?= $title ?></h1>
<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<a class="list-group-item list-group-item-action btn btn-success" style="text-align: center;" href="<?php echo base_url(); ?>admin_panel/create_user/">Add user</a>
		</div>
	</div>
	<div class="col-md-8">
		<div class="list-group">
			<?php foreach ($users as $user): ?>
				<li  class="list-group-item list-group-item-action" style="margin: 10px auto;">
					<h3  style="color: rebeccapurple;"><?php echo $user['name']; ?></h3>
					<a class="btn btn-info float-right"  href="<?php echo base_url(); ?>admin_panel/edit_user/<?php echo $user['id'];?>">Edit</a>
					<a class="btn btn-danger float-right"  style="margin: 0 10px;" href="<?php echo base_url(); ?>/admin_panel/delete_user/<?php echo $user['id']; ?>">Delete</a>
					<h5>number of posts <span class="badge badge-primary badge-pill">14</span></h5>
					<h5><?php echo $user['email']; ?></h5>
				</li>
			<?php endforeach; ?>
		</div>
	</div>
</div>


