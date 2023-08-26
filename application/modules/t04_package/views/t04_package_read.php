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
                    Detail Data
                </div>
                <h2 class="page-title">
                    Package
                </h2>
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
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr><td>Periode</td><td><?php echo $periode; ?></td></tr>
                            <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
                            <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                            <tr><td>Ln3n Mata Uang</td><td><?php echo $ln3n_mata_uang; ?></td></tr>
                            <tr><td>Ln3n Harga</td><td><?php echo $ln3n_harga; ?></td></tr>
                            <tr><td>Ln6n Mata Uang</td><td><?php echo $ln6n_mata_uang; ?></td></tr>
                            <tr><td>Ln6n Harga</td><td><?php echo $ln6n_harga; ?></td></tr>
                            <tr><td>Ln1n Mata Uang</td><td><?php echo $ln1n_mata_uang; ?></td></tr>
                            <tr><td>Ln1n Harga</td><td><?php echo $ln1n_harga; ?></td></tr>
                            <tr><td>Dnrb Mata Uang</td><td><?php echo $dnrb_mata_uang; ?></td></tr>
                            <tr><td>Dnrb Harga</td><td><?php echo $dnrb_harga; ?></td></tr>
                            <tr><td>Dnfb Mata Uang</td><td><?php echo $dnfb_mata_uang; ?></td></tr>
                            <tr><td>Dnfb Harga</td><td><?php echo $dnfb_harga; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('t04_package') ?>" class="btn btn-secondary">Kembali</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
