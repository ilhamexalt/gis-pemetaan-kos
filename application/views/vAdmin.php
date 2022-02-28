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
    <!-- <php echo $map['js'] ?> -->


    <!-- MAP BOX -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>


    <!-- leaflet -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: fixed;
            top: 58px;
            bottom: 0;
            width: 1050px;
            height: 650px;
        }

        .custom-popup h5 {
            text-align: center;
        }

        .custom-popup p {
            line-height: 25px;
        }
    </style>

</head>

<body>
    <div id="map" class="custom-popup"> </div>
    <script>
        var map = L.map('map').setView([-6.1169772, 106.149635], 13);

        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1

        }).addTo(map);

        <?php foreach ($kost as $key => $value) { ?>
            var foto = '<img src="<?= base_url(''); ?>/assets/img/profile/<?= $value->image; ?>" height="150px" width="150px"/>';

            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>])
                .bindPopup("<h5> <b> Nama Kost: <?= $value->name ?> </b></h5> <p> Alamat: <?= $value->address ?> <br> Kecamatan : <?= $value->kecamatan ?><br> Fasilitas: <?= $value->fasilitas ?> <br> Harga: <?= $value->harga ?> <br> Kontak: <?= $value->telp ?> <br> Foto: </p> " + foto, {
                    maxWidth: 500
                })
                .addTo(map);
        <?php } ?>
    </script>


</body>

</html>