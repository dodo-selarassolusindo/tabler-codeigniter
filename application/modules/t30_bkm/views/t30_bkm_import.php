<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
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
        <h2 style="margin-top:0px">T30_bkm <?php echo $button ?></h2> -->
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Import Data
                </div>
                <h2 class="page-title">
                    BKM
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <!-- <a href="<?= site_url('t30_bkm/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Tambah Data
                    </a> -->
                    <a href="<?= site_url('t30_bkm') ?>" class="btn btn-secondary d-none d-sm-inline-block">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <!-- <div class="form-group"> -->
                                <label class="form-label required" for="userfile">File Excel <?php echo form_error('nomor') ?></label>
                                <input id="userfile" type="file" class="form-control" name="userfile" />
                            <!-- </div> -->
                            <!-- <input type="hidden" name="id" value="<?php echo $id; ?>" /> -->
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <div class="btn-list">
                        <button type="submit" class="btn btn-primary d-none d-sm-inline-block"><?= $button ?></button>
                        <!-- <a href="<?= site_url('t30_bkm') ?>" class="btn btn-secondary">Batal</a> -->
                        <a href="<?= site_url('t30_bkm') ?>" class="btn btn-secondary d-none d-sm-inline-block">
                            Batal
                        </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer') ?>
