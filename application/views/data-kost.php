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
	<script src="<?php echo base_url('../../js/jquery.min.js'); ?>"></script> <!-- Load library jquery -->
	<script src="<?php echo base_url('../../js/config.js'); ?>"></script> <!-- Load file process.js -->

</head>

<body>
	<div class="page-header">
		<h1>Data kost</h1>
	</div>
	<?php if ($this->session->userdata['level'] == '1') : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th class="text-center">Nama Kost</th>
					<th class="text-center">Latitude</th>
					<th class="text-center">Longitude</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Kecamatan</th>
					<th class="text-center">Fasilitas</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Deskripsi</th>
					<th class="text-center">Foto</th>
					<th class="text-center">Pemilik</th>
					<th class="text-center">Kontak</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($kost as $j) : ?>
					<tr>
						<th style="text-align: center;"><?= $i ?></th>
						<td><?= $j['name']; ?></td>
						<td><?= $j['latitude']; ?></td>
						<td><?= $j['longitude']; ?></td>
						<td><?= $j['address']; ?></td>
						<td><?= $j['kecamatan']; ?></td>
						<td><?= $j['fasilitas']; ?></td>
						<td><?= $j['harga']; ?></td>
						<td><?= $j['description']; ?></td>
						<td><img src="<?= base_url(''); ?>/assets/img/profile/<?= $j['image']; ?>" height=" 100px" width="100px"></td>
						<td><?= $j['fullname']; ?></td>
						<td><?= $j['telp']; ?></td>
						<td>
							<!-- <a data-toggle="modal" data-target="#editkost<?= $j['ID']; ?>" href="#">Edit</a> | -->
							<a data-toggle="modal" data-target="#deletekost<?= $j['ID']; ?>" href="#">Hapus</a>
						</td>
						<?php $i++; ?>
					<?php endforeach; ?>
					</tr>
			</tbody>
		</table>
		<!-- MODAL HAPUS kost-->
		<?php foreach ($kost as $j) : ?>
			<div class="modal fade" id="deletekost<?= $j['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteskostLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="hapuskostLabel"><b>HAPUS DATA KOST</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('Admin/hapuskost/' . $j['ID']); ?>" method="get">
							<div class="modal-body">
								Apakah yakin akan menghapus data kost <b><?= $j['name']; ?> </b>?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-success">Hapus</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

	<!-- SESSION DATA SEBAGAI PEMILIK KOST -->
	<?php if ($this->session->userdata['level'] == '2') : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th class="text-center">Nama Kost</th>
					<th class="text-center">Latitude</th>
					<th class="text-center">Longitude</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Kecamatan</th>
					<th class="text-center">Fasilitas</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Deskripsi</th>
					<th class="text-center">Foto</th>
					<th class="text-center">Kontak</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($kost_user as $j) : ?>
					<tr>
						<th style="text-align: center;"><?= $i ?></th>
						<td><?= $j['name']; ?></td>
						<td><?= $j['latitude']; ?></td>
						<td><?= $j['longitude']; ?></td>
						<td><?= $j['address']; ?></td>
						<td><?= $j['kecamatan']; ?></td>
						<td><?= $j['fasilitas']; ?></td>
						<td><?= $j['harga']; ?></td>
						<td><?= $j['description']; ?></td>
						<td><img src="<?= base_url(''); ?>/assets/img/profile/<?= $j['image']; ?>" height=" 100px" width="100px"></td>
						<td><?= $j['telp']; ?></td>
						<td>
							<a data-toggle="modal" data-target="#editkost<?= $j['ID']; ?>" href="#">Edit</a> |
							<a data-toggle="modal" data-target="#deletekost<?= $j['ID']; ?>" href="#">Hapus</a>
						</td>
						<?php $i++; ?>
					<?php endforeach; ?>
					</tr>
			</tbody>
		</table>

		<!-- MODAL HAPUS kost-->
		<?php foreach ($kost_user as $j) : ?>
			<div class="modal fade" id="deletekost<?= $j['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteskostLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="hapuskostLabel"><b>HAPUS DATA KOST</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('Pemilik/hapuskost/' . $j['ID']); ?>" method="get">
							<div class="modal-body">
								Apakah yakin akan menghapus data kost <b><?= $j['name']; ?> </b>?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-success">Hapus</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- modal EDIT -->
		<?php foreach ($kost_user as $j) : ?>
			<div class="modal fade" id="editkost<?= $j['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editkostLabel" aria-hidden="true">
				<form action="<?= base_url('Pemilik/editkost/' . $j['ID']); ?>" method="post">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="width: 600px;">
							<div class="modal-header">
								<h5 class="modal-title" id="editkostLabel"><b>EDIT DATA KOST</b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<input type="hidden" class="form-control" id="ID" name="ID" value="<?= $j['ID']; ?>" readonly>
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" value="<?= $j['name']; ?>" placeholder="Nama Kost" required>
								</div>
								<!-- <div class="form-group">
									<input type="text" class="form-control" id="koorLat" name="latitude" value="?= $j['latitude']; ?>" placeholder="Latitude">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="koorLng" name="longitude" value="?= $j['longitude']; ?>" placeholder="Langitude">
								</div> -->
								<div class="form-group">
									<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $j['address']; ?>" placeholder="Alamat" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $j['kecamatan']; ?>" placeholder="Kecamatan" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $j['fasilitas']; ?>" placeholder="Fasilitas" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="harga" name="harga" value="<?= $j['harga']; ?>" placeholder="Harga" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="description" name="description" value="<?= $j['description']; ?>" placeholder="Deskripsi" required>
								</div>
								<!-- <div class="form-group">
									<input type="file" class="custom-file-input" id="image" name="image" size=20 />
								</div> -->
								<div class="form-group">
									<input type="text" class="form-control" id="telp" name="telp" value="<?= $j['telp']; ?>" placeholder="Kontak" required>
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

		<?php if (!$kost_user) : ?>
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
	<?php endif; ?>
</body>

</html>