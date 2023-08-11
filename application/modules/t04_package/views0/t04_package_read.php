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
        <h2 style="margin-top:0px">T04_package Read</h2>
        <table class="table">
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
	    <tr><td></td><td><a href="<?php echo site_url('t04_package') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>