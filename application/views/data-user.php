<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	<!-- Make sure you put this AFTER Leaflet's CSS -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<!-- <php echo $map['js'] ?> -->

	<!-- !-- leaflet css -->

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<!-- MAP BOX -->
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>



	<script>
		var baseurl = "<?php echo base_url('/'); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
	</script>
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script> <!-- Load library jquery -->
	<script src="<?php echo base_url('js/config.js'); ?>"></script> <!-- Load file process.js -->

</head>

<body>
	<div class="page-header">
		<h1>Data User</h1>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Username</th>
				<th class="text-center">Email</th>
				<th class="text-center">Status</th>
				<th class="text-center">Level</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($users as $j) : ?>
				<tr>
					<th style="text-align: center;"><?= $i ?></th>
					<td><?= $j['fullname']; ?></td>
					<td><?= $j['username']; ?></td>
					<td><?= $j['email']; ?></td>
					<?php if ($j['isActive'] == 1) : ?>
						<td>Aktif</td>
					<?php else : ?>
						<td>Nonaktif</td>
					<?php endif; ?>
					<td><?= $j['level']; ?></td>
					<td>
						<a data-toggle="modal" data-target="#editusers<?= $j['id_user']; ?>" href="#">Edit</a>
						<!-- <a data-toggle="modal" data-target="#deletekost<?= $j['id_user']; ?>" href="#">Hapus</a> -->
					</td>
					<?php $i++; ?>
				<?php endforeach; ?>
				</tr>
		</tbody>
	</table>

	<!-- modal EDIT -->
	<?php foreach ($users as $j) : ?>
		<div class="modal fade" id="editusers<?= $j['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="editusersLabel" aria-hidden="true">
			<form action="<?= base_url('Admin/editusers/' . $j['id_user']); ?>" method="post">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="width: 600px;">
						<div class="modal-header">
							<h5 class="modal-title" id="editusersLabel"><b>EDIT DATA USER</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $j['id_user']; ?>" readonly>
							<div class="form-group">
								<input type="text" class="form-control" id="fullname" name="fullname" value="<?= $j['fullname']; ?>" placeholder="Nama Pemilik Kost">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" value="<?= $j['username']; ?>" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" value="<?= $j['email']; ?>" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" value="<?= $j['password']; ?>" placeholder="Password">
							</div>
							<div class="form-group">
								<select class="form-control" name="isActive" placeholder="test">
									<option value="" disabled selected hidden>
										<?php if ($j['isActive'] == 0) : ?>
											Non Aktif
										<?php else : ?>
											Aktif
										<?php endif; ?>
									</option>
									<option value=1>Aktif</option>
									<option value=0>Non Aktif</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Edit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php endforeach; ?>


	<?php if (!$users) : ?>
		<div class="col-md-5 col-md-offset-3">
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Maa!</strong> Data yang anda cari tidak ditemukan.
			</div>
		</div>
	<?php endif; ?>
	<div class="text-center" style="margin-bottom: 50px;">
		<?php echo $this->pagination->create_links(); ?>
	</div>

</body>

</html>