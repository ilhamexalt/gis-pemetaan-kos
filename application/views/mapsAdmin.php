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

</head>

<body>


    <!-- VIEW MAPBOX -->
    <div id='map' style='width:620px; height: 450px;'></div>


    <script>
        // MAP BOX

        mapboxgl.accessToken = 'pk.eyJ1IjoiaWxoYW1tYXVsYW5hd3h5IiwiYSI6ImNrdTFiZjNkZDAzenAyb282cWU2NnFkNXUifQ.qoQ2pHae-lDnubtGr-ilwQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [106.149635, -6.1169772],
            zoom: 13
        });


        const marker1 = new mapboxgl.Marker({
            draggable: true
        }).setLngLat([106.1496133, -6.1166897]).addTo(map);

        // untuk ambil lat dan lng dari drag pada maps
        function showKoor() {
            var koordinat = marker1.getLngLat();
            var lintang = koordinat.lat;
            var bujur = koordinat.lng;
            var hsllintang = lintang;
            var hslbujur = bujur;
            document.getElementById("koorLat").value = hsllintang;
            document.getElementById("koorLng").value = hslbujur;
            // document.getElementById("koorLat").innerHTML = hsllintang;
            // document.getElementById("koorLng").innerHTML = hslbujur;
        }
        marker1.on("dragend", showKoor);
    </script>

</body>

</html>