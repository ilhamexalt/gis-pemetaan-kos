<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="<?= base_url('/favicon.png'); ?>" type="image/x-icon" />
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/normalize.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/template.css?v=' . md5(date('YmdHis'))) ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/hover-min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css') ?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!-- ?php if(isset($map['js'])) echo $map['js']; ?> -->

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url() ?>">Login as <?= $this->session->userdata('status'); ?> | <?= $this->session->userdata('fullname'); ?></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-button navbar-nav navbar-right">
					<li>
						<a href="<?php echo base_url('auth/logout') ?>" class="hvr-rotate" title="Lgoin">
							<i class="fa fa-sign-out"></i> Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-md-2 user-sidebar">
				<div id="sidebar-sticker">
					<div class="list-group" style="margin-top: 20px;">
						<?php if ($this->session->userdata['level'] == '1') : ?>
							<a href="<?php echo base_url('Admin') ?>" class="list-group-item <?php echo active_link_method('index', 'admin') ?>">
								<i class="fa fa-home"></i> Home
							</a>
							<a href="<?php echo base_url('Admin/datakost') ?>" class="list-group-item <?php echo active_link_method('datakost', 'Admin') ?>">
								<i class="fa fa-bed"></i> Data Kost
							</a>
							<a href="<?php echo base_url('Admin/datauser') ?>" class="list-group-item <?php echo active_link_method('datauser', 'Admin') ?>">
								<i class="fa fa-user"></i> Kelola User
							</a>
						<?php endif; ?>

						<?php if ($this->session->userdata['level'] == '2') : ?>
							<a href="<?php echo base_url('Pemilik') ?>" class="list-group-item <?php echo active_link_method('index', 'Pemilik') ?>">
								<i class="fa fa-home"></i> Home
							</a>
							<a href="<?php echo base_url('Pemilik/datakost') ?>" class="list-group-item <?php echo active_link_method('datakost', 'Pemilik') ?>">
								<i class="fa fa-bed"></i> Data Kost
							</a>
							<a href="<?php echo base_url('Pemilik/addkost') ?>" class="list-group-item <?php echo active_link_method('addkost', 'Pemilik') ?>">
								<i class="fa fa-plus"></i> Tambah Data
							</a>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="col-md-10 user-contents">