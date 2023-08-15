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
        <h2 style="margin-top:0px">T30_bkm Read</h2> -->

        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            List Data
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
                            <a href="<?= site_url('t30_bkm/import') ?>" class="btn btn-primary d-none d-sm-inline-block">
                                Import Data
                            </a>
                            <a href="<?= site_url() ?>" class="btn btn-secondary d-none d-sm-inline-block">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <!-- Message -->
                    <?php if ($this->session->userdata('message') <> '') { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <!-- <h4 class="alert-title">Wow! Everything worked!</h4> -->
                        <div class="text-secondary"><?= $this->session->userdata('message') ?></div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">

                    <div class="col-12">
                        <div class="card">

                            <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                        	    <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
                        	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
                        	    <tr><td>Rate Usd</td><td><?php echo $rate_usd; ?></td></tr>
                        	    <tr><td>Rate Aud</td><td><?php echo $rate_aud; ?></td></tr>
                        	    <tr><td></td><td><a href="<?php echo site_url('t30_bkm') ?>" class="btn btn-default">Cancel</a></td></tr>
                        	</table>
                            </div>
                            <?= $t31_bkm_detail_data ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- </body>
</html> -->

<?php $this->load->view('dist/_partials/footer') ?>
