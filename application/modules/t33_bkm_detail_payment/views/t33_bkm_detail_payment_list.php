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
                    Bkm Detail Payment
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="<?= site_url('t33_bkm_detail_payment/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Tambah Data
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
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t33_bkm_detail_payment/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t33_bkm_detail_payment') ?>" class="btn btn-secondary btn-sm">Reset</a>
                                                <?php } ?>
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <th>Bkm Detail</th>
                                <?php foreach($t07_kolom_payment_data as $t07_kolom_payment) { ?>
                                <th><?= $t07_kolom_payment->nama ?></th>
                                <?php } ?>
                                <th>Proses Data</th>
                            </tr>
                            <?php $t33_bkm_detail_payment_loop_data = $t33_bkm_detail_payment_data; ?>
                            <?php // foreach ($t33_bkm_detail_payment_data as $t33_bkm_detail_payment) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t33_bkm_detail_payment_data[0]->bkm_detail ?></td>
                                <?php foreach($t07_kolom_payment_data as $t07_kolom_payment) { ?>
                                    <?php foreach($t33_bkm_detail_payment_loop_data as $t33_bkm_detail_payment_loop) { ?>
                                        <?php if ($t33_bkm_detail_payment_loop->kolom_payment == $t07_kolom_payment->id) { ?>
                                            <td><?= $t33_bkm_detail_payment_loop->jumlah ?></td>
                                            <?php break; ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t33_bkm_detail_payment/read/'.$t33_bkm_detail_payment->id),'Detail');
                                echo ' | ';
                                echo anchor(site_url('t33_bkm_detail_payment/update/'.$t33_bkm_detail_payment->id),'Ubah');
                                echo ' | ';
                                echo anchor(site_url('t33_bkm_detail_payment/delete/'.$t33_bkm_detail_payment->id),'Hapus','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php // } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t33_bkm_detail_payment_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer') ?>
