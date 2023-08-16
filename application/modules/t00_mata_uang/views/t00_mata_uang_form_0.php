<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    <?= $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah'?> Data
                </div>
                <h2 class="page-title">
                    Mata Uang
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <!-- <a href="<?= site_url('t00_mata_uang/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Tambah Data
                    </a> -->
                    <!-- <a href="<?= site_url() ?>" class="btn btn-secondary d-none d-sm-inline-block">
                        Kembali
                    </a> -->
                </div>
            </div>
            <!-- Message -->
            <!-- <?php if ($this->session->userdata('message') <> '') { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <h4 class="alert-title">Wow! Everything worked!</h4>
                <div class="text-secondary"><?= $this->session->userdata('message') ?></div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            <?php } ?> -->
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T00_mata_uang <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post" class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label required" for="varchar">Kode <?php echo form_error('kode') ?></label>
                    <div><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" /></div>
                </div>

                <div class="mb-3">
                    <label class="form-label required" for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <div><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></div>
                </div>

        	    <div class="mb-3">
                    <label class="form-label required" for="varchar">Simbol <?php echo form_error('simbol') ?></label>
                    <div><input type="text" class="form-control" name="simbol" id="simbol" placeholder="Simbol" value="<?php echo $simbol; ?>" /></div>
                </div>

        	    <input type="hidden" name="id" value="<?php echo $id; ?>" />

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('t00_mata_uang') ?>" class="btn btn-secondary">Cancel</a>
            </div>
    	</form>
    <!-- </body>
</html> -->

</div>
</div>

</div>
</div>
</div>
