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
        <h2 style="margin-top:0px">T07_kolom_payment <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="tinyint">Urutan <?php echo form_error('urutan') ?></label>
            <input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mata Uang <?php echo form_error('mata_uang') ?></label>
            <input type="text" class="form-control" name="mata_uang" id="mata_uang" placeholder="Mata Uang" value="<?php echo $mata_uang; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t07_kolom_payment') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>