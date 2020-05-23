<h1><?= $title ?></h1>
<div class="list-group">
	<?php foreach ($users as $user): ?>
	<li  class="list-group-item list-group-item-action">
		<h3  style="color: rebeccapurple;"><?php echo $user['name']; ?></h3>
		<a class="btn btn-info float-right"  href="">Edit</a>
		<a class="btn btn-danger float-right"  style="margin: 0 10px;" href="<?php echo base_url(); ?>/admin_panel/delete_user/">Delete</a>
		<h5>number of posts <span class="badge badge-primary badge-pill">14</span></h5>
		<h5><?php echo $user['email']; ?></h5>
	</li>
	<?php endforeach; ?>
</div>

