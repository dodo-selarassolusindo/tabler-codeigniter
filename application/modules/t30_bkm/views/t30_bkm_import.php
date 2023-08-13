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
                    Bkm
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <!-- <a href="<?= site_url('t30_bkm/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Tambah Data
                    </a> -->
                    <a href="<?= site_url() ?>" class="btn btn-secondary d-none d-sm-inline-block">
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
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t30_bkm/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t30_bkm') ?>" class="btn btn-secondary btn-sm">Reset</a>
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
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Rate Usd</th>
                                <th>Rate Aud</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t30_bkm_data as $t30_bkm) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t30_bkm->nomor ?></td>
                                <td><?= $t30_bkm->tanggal ?></td>
                                <td><?= $t30_bkm->rate_usd ?></td>
                                <td><?= $t30_bkm->rate_aud ?></td>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t30_bkm/read/'.$t30_bkm->id),'Read');
                                echo ' | ';
                                echo anchor(site_url('t30_bkm/update/'.$t30_bkm->id),'Update');
                                echo ' | ';
                                echo anchor(site_url('t30_bkm/delete/'.$t30_bkm->id),'Delete','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t30_bkm_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer') ?>


        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="varchar">File Excel <?php echo form_error('nomor') ?></label>
            <input type="file" class="form-control" />
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('t30_bkm') ?>" class="btn btn-default">Cancel</a>
	</form>
