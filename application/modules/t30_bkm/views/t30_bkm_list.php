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
                    <?php if ($kembali == '') { ?>
                    <a href="<?= site_url('t30_bkm/import') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Import Data
                    </a>
                    <?php } ?>
                    <a href="<?= site_url($kembali) ?>" class="btn btn-secondary d-none d-sm-inline-block">
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

                    <?= $t30_bkm ?>
                    <?= $t31_bkm_detail ?>

                </div>
            </div>

            <div class="col-12">
                <div class="card">

                    <?= $t33_pembayaran ?>
                    <?= $t33_pembayaran_2 ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer') ?>
