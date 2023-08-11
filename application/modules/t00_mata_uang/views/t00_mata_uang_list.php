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
    <body> -->
        <!-- <h2 style="margin-top:0px">T00_mata_uang List</h2> -->
        <!-- <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t00_mata_uang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t00_mata_uang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t00_mata_uang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> -->

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
                            Mata Uang
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="<?= site_url('t00_mata_uang/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                                Tambah Data
                            </a>
                            <a href="<?= site_url() ?>" class="btn btn-secondary d-none d-sm-inline-block">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <!-- Message -->
                    <?php // echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <?php if ($this->session->userdata('message') <> '') { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h4 class="alert-title">Wow! Everything worked!</h4>
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
                            <!-- <div class="card-header">
                                <h3 class="card-title">Invoices</h3>
                            </div> -->
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Tampil:
                                        <div class="mx-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                                        </div>
                                        data
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Cari Data:
                                        <div class="ms-2 d-inline-block">
                                            <form action="<?php echo site_url('t00_mata_uang/index'); ?>" method="get">
                                                <div class="input-group">
                                                    <!-- <input type="text" class="form-control" name="q" value="<?php echo $q; ?>"> -->
                                                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice" name="q" value="<?= $q ?>">
                                                    <span class="input-group-btn">
                                                        <?php if ($q <> '') { ?>
                                                        <a href="<?= site_url('t00_mata_uang') ?>" class="btn btn-default btn-sm">Reset</a>
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
                                		<th>Kode</th>
                                		<th>Nama</th>
                                		<th>Simbol</th>
                                		<th>Proses Data</th>
                                    </tr>
                                    <?php foreach ($t00_mata_uang_data as $t00_mata_uang) { ?>
                                    <tr>
                            			<td width="80px"><?php echo ++$start ?></td>
                            			<td><?php echo $t00_mata_uang->kode ?></td>
                            			<td><?php echo $t00_mata_uang->nama ?></td>
                            			<td><?php echo $t00_mata_uang->simbol ?></td>
                            			<td style="text-align:center" width="200px">
                            				<?php
                            				echo anchor(site_url('t00_mata_uang/read/'.$t00_mata_uang->id),'Lihat');
                            				echo ' | ';
                            				echo anchor(site_url('t00_mata_uang/update/'.$t00_mata_uang->id),'Ubah');
                            				echo ' | ';
                            				echo anchor(site_url('t00_mata_uang/delete/'.$t00_mata_uang->id),'Hapus','onclick="javasciprt: return confirm(\'Apakah Anda yakin akan menghapus data ini ?\')"');
                            				?>
                            			</td>
                            		</tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <!-- <div class="col-md-6">
                                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                                </div> -->
                                <p class="m-0 text-muted">Total: <span><?php echo $total_rows ?></span> data</p>
                                <div class="col-md-6 text-right">
                                    <?php echo $pagination ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php $this->load->view('dist/_partials/footer'); ?>
