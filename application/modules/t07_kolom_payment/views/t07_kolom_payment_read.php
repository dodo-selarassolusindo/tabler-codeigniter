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
        <h2 style="margin-top:0px">T07_kolom_payment Read</h2>
        <table class="table">
	    <tr><td>Urutan</td><td><?php echo $urutan; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Mata Uang</td><td><?php echo $mata_uang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t07_kolom_payment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>