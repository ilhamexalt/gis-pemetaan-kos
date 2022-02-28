<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>

<style>
    .tombol {
        border: none;
        color: whitesmoke;
        padding: auto;
        text-align: center;
        display: inline-block;
        font-size: 14px;
        border-radius: 8px;
    }
</style>
<div class="page-header">
    <h1>Edit Jalan</h1>
</div>

<form action="<?= base_url('Admin/edit'); ?>" method="post">
    <div class="form-group">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="col-sm-8 col-md-offset-2">
                <div class="form-group">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" id="ID" name="ID" value=" <?= $jalan->ID; ?>">
        <label class="col-sm-2 control-label">Nama :</label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name') ?>" placeholder="">
            <p class="help-block"><?php echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Alamat :</label>
        <div class="col-sm-8">
            <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat') ?></textarea>
            <p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Koordinat :</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="koorLat" name="latitude" value="<?php echo set_value('latitude') ?>" placeholder="Latitude">
            <p class="help-block"><?php echo form_error('latitude', '<small class="text-red">', '</small>'); ?></p>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="koorLng" name="longitude" value="<?php echo set_value('longitude') ?>" placeholder="Langitude">
            <p class="help-block"><?php echo form_error('longitude', '<small class="text-red">', '</small>'); ?></p>
        </div>
        <!-- map box -->
        <div class="col-md-7 col-md-offset-2">
            <?php $this->load->view('mapsAdmin', $this->data);
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Foto :</label>
        <div class="col-sm-8">
            <input type="file" name="photo" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi :</label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" rows="8"><?php echo set_value('description') ?></textarea>
            <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 50px;">
        <div class="col-sm-7 col-md-offset-3">
            <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Tambah</button>
        </div>
    </div>
</form>

<script>
    // MAP BOX
    mapboxgl.accessToken = 'pk.eyJ1IjoiaWxoYW1tYXVsYW5hd3h5IiwiYSI6ImNrdTFiZjNkZDAzenAyb282cWU2NnFkNXUifQ.qoQ2pHae-lDnubtGr-ilwQ';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [106.1044273, -6.3095587],
        zoom: 13
    });
    const marker1 = new mapboxgl.Marker({
        draggable: true
    }).setLngLat([106.1044273, -6.3095587]).addTo(map);


    // // untuk ambil lat dan lng dari drag pada maps
    // function showKoor() {
    //     var koordinat = marker1.getLngLat();
    //     var lintang = koordinat.lat;
    //     var bujur = koordinat.lng;
    //     var hsllintang = lintang + bujur;
    //     var hslbujur = bujur;
    //     document.getElementById("koordinat").innerHTML = hsllintang;
    // }
    // marker1.on("dragend", showKoor);+
</script>

<?php
$this->load->view('footerAdmin', $this->data);


/* End of file add-hotel.php */
/* Location: ./application/views/add-hotel.php */