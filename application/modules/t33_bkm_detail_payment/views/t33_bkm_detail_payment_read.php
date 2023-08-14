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
        <h2 style="margin-top:0px">T33_bkm_detail_payment Read</h2>
        <table class="table">
	    <tr><td>Bkm Detail</td><td><?php echo $bkm_detail; ?></td></tr>
	    <tr><td>Kolom Payment</td><td><?php echo $kolom_payment; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t33_bkm_detail_payment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>