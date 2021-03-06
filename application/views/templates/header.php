<html>
	<head>
		<title>Blog app</title>
		<link type="text/css" rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" >
		<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
	</head>
	<body style="padding-top: 100px;">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">Blog</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse collapse" id="navbarColor02">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>about">About</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Posts
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url();?>posts">View posts</a>
						<?php if($this->session->userdata('logged_in')): ?>
						<a class="dropdown-item" href="<?php echo base_url();?>posts/create">Create post</a>
						<a class="dropdown-item" href="<?php echo base_url();?>posts/export">Export posts</a>
						<?php endif; ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categories
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url();?>categories">View categories</a>
						<?php if($this->session->userdata('logged_in')): ?>
						<a class="dropdown-item" href="<?php echo base_url();?>categories/create">Create categories</a>
						<?php endif; ?>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('logged_in')): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>register">Register</a>
					</li>
				<?php endif; ?>
				<?php if($this->session->userdata('type') == 'admin'):?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Admin panel
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo base_url();?>admin_panel/users">Manage users</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link admin_panel_btn" href="<?php echo base_url();?>admin_panel"></a>
					</li>
				<?php endif; ?>
				<?php if($this->session->userdata('logged_in')): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>logout">Logout</a>
					</li>
				<?php endif; ?>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<br>

	<div class="container">
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('category_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_edited')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_edited').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('comment_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_created').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('comment_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_created').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_success')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('export_success')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('export_success').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('export_failed')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('export_failed').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_updated')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>'; ?>
		<?php endif; ?>



