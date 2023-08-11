<!doctype html>
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
        <h2 style="margin-top:0px">T04_package <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Periode <?php echo form_error('periode') ?></label>
            <input type="text" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ln3n Mata Uang <?php echo form_error('ln3n_mata_uang') ?></label>
            <input type="text" class="form-control" name="ln3n_mata_uang" id="ln3n_mata_uang" placeholder="Ln3n Mata Uang" value="<?php echo $ln3n_mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Ln3n Harga <?php echo form_error('ln3n_harga') ?></label>
            <input type="text" class="form-control" name="ln3n_harga" id="ln3n_harga" placeholder="Ln3n Harga" value="<?php echo $ln3n_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ln6n Mata Uang <?php echo form_error('ln6n_mata_uang') ?></label>
            <input type="text" class="form-control" name="ln6n_mata_uang" id="ln6n_mata_uang" placeholder="Ln6n Mata Uang" value="<?php echo $ln6n_mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Ln6n Harga <?php echo form_error('ln6n_harga') ?></label>
            <input type="text" class="form-control" name="ln6n_harga" id="ln6n_harga" placeholder="Ln6n Harga" value="<?php echo $ln6n_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ln1n Mata Uang <?php echo form_error('ln1n_mata_uang') ?></label>
            <input type="text" class="form-control" name="ln1n_mata_uang" id="ln1n_mata_uang" placeholder="Ln1n Mata Uang" value="<?php echo $ln1n_mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Ln1n Harga <?php echo form_error('ln1n_harga') ?></label>
            <input type="text" class="form-control" name="ln1n_harga" id="ln1n_harga" placeholder="Ln1n Harga" value="<?php echo $ln1n_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dnrb Mata Uang <?php echo form_error('dnrb_mata_uang') ?></label>
            <input type="text" class="form-control" name="dnrb_mata_uang" id="dnrb_mata_uang" placeholder="Dnrb Mata Uang" value="<?php echo $dnrb_mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Dnrb Harga <?php echo form_error('dnrb_harga') ?></label>
            <input type="text" class="form-control" name="dnrb_harga" id="dnrb_harga" placeholder="Dnrb Harga" value="<?php echo $dnrb_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dnfb Mata Uang <?php echo form_error('dnfb_mata_uang') ?></label>
            <input type="text" class="form-control" name="dnfb_mata_uang" id="dnfb_mata_uang" placeholder="Dnfb Mata Uang" value="<?php echo $dnfb_mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Dnfb Harga <?php echo form_error('dnfb_harga') ?></label>
            <input type="text" class="form-control" name="dnfb_harga" id="dnfb_harga" placeholder="Dnfb Harga" value="<?php echo $dnfb_harga; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t04_package') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>