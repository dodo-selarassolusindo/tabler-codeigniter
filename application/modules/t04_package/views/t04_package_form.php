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
                    <form action="<?php echo $action; ?>" method="post" class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required" for="periode">Periode <?php echo form_error('periode') ?></label>
                                <div><input type="text" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="kode">Kode <?php echo form_error('kode') ?></label>
                                <div><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="nama">Nama <?php echo form_error('nama') ?></label>
                                <div><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln3n_mata_uang">Ln3n Mata Uang <?php echo form_error('ln3n_mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="ln3n_mata_uang" id="ln3n_mata_uang" placeholder="Ln3n Mata Uang" value="<?php echo $ln3n_mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln3n_harga">Ln3n Harga <?php echo form_error('ln3n_harga') ?></label>
                                <div><input type="text" class="form-control" name="ln3n_harga" id="ln3n_harga" placeholder="Ln3n Harga" value="<?php echo $ln3n_harga; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln6n_mata_uang">Ln6n Mata Uang <?php echo form_error('ln6n_mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="ln6n_mata_uang" id="ln6n_mata_uang" placeholder="Ln6n Mata Uang" value="<?php echo $ln6n_mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln6n_harga">Ln6n Harga <?php echo form_error('ln6n_harga') ?></label>
                                <div><input type="text" class="form-control" name="ln6n_harga" id="ln6n_harga" placeholder="Ln6n Harga" value="<?php echo $ln6n_harga; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln1n_mata_uang">Ln1n Mata Uang <?php echo form_error('ln1n_mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="ln1n_mata_uang" id="ln1n_mata_uang" placeholder="Ln1n Mata Uang" value="<?php echo $ln1n_mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="ln1n_harga">Ln1n Harga <?php echo form_error('ln1n_harga') ?></label>
                                <div><input type="text" class="form-control" name="ln1n_harga" id="ln1n_harga" placeholder="Ln1n Harga" value="<?php echo $ln1n_harga; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="dnrb_mata_uang">Dnrb Mata Uang <?php echo form_error('dnrb_mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="dnrb_mata_uang" id="dnrb_mata_uang" placeholder="Dnrb Mata Uang" value="<?php echo $dnrb_mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="dnrb_harga">Dnrb Harga <?php echo form_error('dnrb_harga') ?></label>
                                <div><input type="text" class="form-control" name="dnrb_harga" id="dnrb_harga" placeholder="Dnrb Harga" value="<?php echo $dnrb_harga; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="dnfb_mata_uang">Dnfb Mata Uang <?php echo form_error('dnfb_mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="dnfb_mata_uang" id="dnfb_mata_uang" placeholder="Dnfb Mata Uang" value="<?php echo $dnfb_mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="dnfb_harga">Dnfb Harga <?php echo form_error('dnfb_harga') ?></label>
                                <div><input type="text" class="form-control" name="dnfb_harga" id="dnfb_harga" placeholder="Dnfb Harga" value="<?php echo $dnfb_harga; ?>" /></div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?= $button ?></button>
                    	    <a href="<?php echo site_url('t04_package') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
