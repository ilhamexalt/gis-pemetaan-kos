<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="icon" href="<?= base_url('/favicon.png'); ?>" type="image/x-icon" />
	<link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/normalize.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/template.css?v=' . md5(date('YmdHis'))) ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/css/hover-min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css') ?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!-- <php echo $map['js'] ?> -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


	<!-- MAP BOX GA DIPAKE
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script> -->


	<!-- leaflet -->

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		#map {
			position: fixed;
			bottom: 0;
			width: 80%;
			top: 58px;
			height: 100%;
		}

		button {
			font-weight: lighter;
			font-size: 14px;
			border: none;
			border-radius: 5px;
			color: white;
			padding-top: 3px;
			padding-bottom: 3px;
			padding-right: 10px;
			padding-left: 10px;
			background-color: #4169E1;
		}

		button:hover {
			background-color: #1E90FF;
		}

		.custom-popup h5 {
			text-align: center;
		}

		.custom-popup p {
			line-height: 25px;
		}

		.popupCustom .leaflet-popup-tip,
		.popupCustom .leaflet-popup-content-wrapper {
			background: #e0e0e0;
			color: #234c5e;
		}
	</style>

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
				<a class="navbar-brand" href="<?php echo base_url() ?>">Aplikasi Pemetaan Geografis Tempat Kost di Kota Serang</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>

					</li>
					<li><a href="<?php echo base_url() ?>" class="hvr-underline-reveal">Home</a></li>
					<li><a data-toggle="modal" href='#modal-about' class="hvr-underline-reveal">About</a></li>
					<li><a href="<?= base_url('Auth'); ?>" class="hvr-underline-reveal">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div id="map" class="custom-popup"></div>
			</div>
			<div class="col" style="position: absolute; top: 70px; right: 15px;">
				<!-- <div class="bg-primary text-center" style="padding: 2px; border-radius: 10px; margin-bottom: 10px">
					<h5>Filter Tempat Kost</h5>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="harga" id="harga">
					<label class="form-check-label" for="harga"><span style="font-size :small">Berdasarkan Harga</span></label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="jarak" id="jarak">
					<label class="form-check-label" for="jarak"><span style="font-size :small">Berdasarkan Jarak</span></label>
				</div> -->
				<!-- <h5>Filter Tempat Kost</h5>
				<input type="range" value="400000" min="400000" max="1200000" oninput="price.value = this.value">
				<br>
				<input class="form-control" type="text" name="" id="price" value="" disabled></input>
				<br> -->

				<!-- <button onclick="tes()">Coba</button> -->
				<!-- Filter by Harga -->
				<form action="" method="post">
					<div class="bg-primary text-center" style="padding: 2px; border-radius: 10px; margin-bottom: 10px" type="submit">
						<h5>Filter Tempat Kost</h5>
					</div>
					<select class="form-control" name="" id="selectOpt" onchange="tes(value);">
						<option value="" disabled="disabled" selected="selected">Berdasarkan ...</option>
						<option value="harga">Berdasarkan Harga</option>
						<option value="kecamatan">Berdasarkan Kecamatan</option>
						<option value="name">Berdasarkan Nama</option>
					</select>
					<br>
					<!-- <button type=" submit" class="col btn btn-success mt-3">Filter</button> -->
				</form>

				<!-- Filter by Harga -->
				<form action="<?= base_url('Welcome/filterHarga'); ?>" method="post" id="formHarga" hidden>
					<select class="form-control" id="filter" name="rangeHarga">
						<option value="hargaLow">Rp400.000 s/d Rp500.000</option>
						<option value="hargaMid">Rp500.001 s/d Rp700.000</option>
						<option value="hargaUp">Rp700.001 s/d Rp1.200.000</option>
					</select>
					<br>
					<button type=" submit" class="col btn btn-success mt-3">Filter</button>
				</form>

				<!-- Filter by Kecamatan -->
				<form action="<?= base_url('Welcome/filterKecamatan'); ?>" method="post" id="formKecamatan" hidden>
					<div>
						<select class="form-control" name="kecamatan" id="Kecamatan">
							<?php foreach ($kec as $row) { ?>
								<option value="<?= $row->kecamatan ?>"><?= $row->kecamatan ?></option>
							<?php } ?>
						</select>
						<!-- <input type="text" name="kecamatan" id="Kecamatan"> -->
					</div>
					<br>
					<button type=" submit" class="col btn btn-success mt-3">Filter</button>
				</form>

				<!-- Filter by Name -->
				<form action="<?= base_url('Welcome/filterName'); ?>" method="post" id="formName" hidden>
					<div>
						<input type="text" name="name" id="Name" class="form-control">
					</div>
					<br>
					<button type=" submit" class="col btn btn-success mt-3">Filter</button>
				</form>
			</div>
		</div>
	</div>

	<footer class="page-break-top">
		<div class="footer-divider"></div>
		<div class="container">
			<div class="row">
				<div class="clearfix page-break-top"></div>
				<div class="hr5"></div>
				<div class="col-md-12">
					<p class="text-center"><small>Copyright <strong><a href="http://hello-iam.netlify.app">IAM PROJECT</a></strong> &copy; 2021</p>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-warning"></i> Attention!</h4>
					<p><?php echo $this->session->flashdata('message') ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-about" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">About</h4>
				</div>
				<div class="modal-body">
					<p style="text-align: justify;">Aplikasi Pemetaan Geografis Tempat Kost di Kota Serang merupakan sistem yang digunakan untuk membantu khususnya seperti masyarakat umum, siswa, mahasiswa, dan karyawan mengetahui tempat kost di Kota Serang berdasarkan lokasi terdekat, harga terjangkau, fasilitas, keamanan dan kebersihan dan dokumentasi berupa foto tempat kost. Hubungi nomor handphone dibawah untuk aktivasi akun kost bapak/ibu yang sudah didaftarkan sebelumnya.
					</p>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama</td>
								<td width="50" class="text-center">:</td>
								<td>AYU PURNAMA SARI</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td width="50" class="text-center">:</td>
								<td>11118018</td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td width="50" class="text-center">:</td>
								<td>Sistem Informasi</td>
							</tr>
							<tr>
								<td>Fakultas</td>
								<td width="50" class="text-center">:</td>
								<td>Tekonologi Informasi</td>

							</tr>
							<tr>
								<td>Help</td>
								<td width="50" class="text-center">:</td>
								<td><a href="https://api.whatsapp.com/send?phone=628989455538&text=Halo Kak ayu, saya ingin mendaftarkan tempat kost saya di Aplikasi Pemetaan Kost">08989455538</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<script>
		var map = L.map('map').setView([-6.1169772, 106.149635], 16);
		var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 16,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1
		}).addTo(map);
		//GET LONGITUDE DAN LATITUDE
		<?php foreach ($kost as $key => $value) { ?>
			var foto = '<img src="<?= base_url(''); ?>/assets/img/profile/<?= $value->image; ?>" height="150px" width="150px" />';
			L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>])
				.bindPopup("<h5><b>Nama Kost: <?= $value->name ?></b></h5><p>Alamat: <?= $value->address ?><br> Kecamatan : <?= $value->kecamatan ?> <br> Fasilitas: <?= $value->fasilitas ?><br> Harga: <?= $value->harga ?> <br> Kontak: <a> <?= $value->telp ?> </a><br> Foto: </p> " + foto + "<br><br><a href = 'https://www.google.com/maps/dir/?api=1&destination=" + <?= $value->latitude ?> + "," + <?= $value->longitude ?> + "'target = '_blank'><button> Tampilkan rute </button></a> ", {
					maxWidth: 500
				})
				.addTo(map);
		<?php } ?>

		//LOCATE THE USER
		map.locate({
				setView: true,
				watch: true
			}) /* This will return map so you can do chaining */
			.on('locationfound', function(e) {
				var marker = L.marker([e.latitude, e.longitude]).bindPopup("<h5 style='font-weight: bold;'>Posisi Kamu Sekarang 😊 </h5>");
				var circle = L.circle([e.latitude, e.longitude], e.accuracy / 150, {
					weight: 1,
					color: 'black',
				});
				map.addLayer(marker);
				map.addLayer(circle);
			})
			.on('locationerror', function(e) {
				console.log(e);
				alert("Location access denied.");
			});
		L.map('map');

		// filter
		var getHarga = document.querySelector('#getHarga');
		var postHarga = document.querySelector('#postHarga');
		var myUnits = 'myUnits';
		var off = getHarga.offsetWidth / (parseInt(getHarga.max) - parseInt(getHarga.min));
		var px = ((getHarga.valueAsNumber - parseInt(getHarga.min)) * off) - (postHarga.offsetParent.offsetWidth / 2);

		postHarga.parentElement.style.left = px + 'px';
		postHarga.parentElement.style.top = getHarga.offsetHeight + 'px';
		postHarga.innerHTML = getHarga.value + ' ' + myUnits;

		getHarga.oninput = function() {
			let px = ((getHarga.valueAsNumber - parseInt(getHarga.min)) * off) - (postHarga.offsetWidth / 2);
			postHarga.innerHTML = getHarga.value + ' ' + myUnits;
			stHarga.parentElement.style.left = px + 'px';
		};

		//dropdown

		function tes(value) {
			if (value == "harga") {
				document.getElementById("formHarga").style.display = "block";
				document.getElementById("formKecamatan").style.display = "none";
				document.getElementById("formName").style.display = "none";
			} else if (value == "kecamatan") {
				document.getElementById("formKecamatan").style.display = "block";
				document.getElementById("formHarga").style.display = "none";
				document.getElementById("formName").style.display = "none";
			} else if (value == "name") {
				document.getElementById("formName").style.display = "block";
				document.getElementById("formKecamatan").style.display = "none";
				document.getElementById("formHarga").style.display = "none";
			}
		}
	</script>
</body>

</html>