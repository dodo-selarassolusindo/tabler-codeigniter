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
                    Selisih Price
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
                            <tr><td>Bkm Detail</td><td><?php echo $bkm_detail; ?></td></tr>
                            <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
                            <tr><td>Mata Uang</td><td><?php echo $mata_uang; ?></td></tr>
                            <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('t33_selisih_price') ?>" class="btn btn-secondary">Kembali</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
