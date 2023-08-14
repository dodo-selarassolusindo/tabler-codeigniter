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
        <h2 style="margin-top:0px">T33_bkm_detail_payment <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Bkm Detail <?php echo form_error('bkm_detail') ?></label>
            <input type="text" class="form-control" name="bkm_detail" id="bkm_detail" placeholder="Bkm Detail" value="<?php echo $bkm_detail; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kolom Payment <?php echo form_error('kolom_payment') ?></label>
            <input type="text" class="form-control" name="kolom_payment" id="kolom_payment" placeholder="Kolom Payment" value="<?php echo $kolom_payment; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t33_bkm_detail_payment') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>