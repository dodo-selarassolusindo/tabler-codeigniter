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
                    View Detail Data
                </div>
                <h2 class="page-title">
                    Kolom Payment
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
                            <tr><td>Urutan</td><td><?php echo $urutan; ?></td></tr>
                            <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                            <tr><td>Mata Uang</td><td><?php echo $mata_uang; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('t07_kolom_payment') ?>" class="btn btn-secondary">Kembali</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
