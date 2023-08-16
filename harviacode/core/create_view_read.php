<?php

$string2 =
"<?php
defined('BASEPATH') OR exit('No direct script access allowed');
\$this->load->view('dist/_partials/header');
?>
<!-- Page header -->
<div class=\"page-header d-print-none\">
    <div class=\"container-xl\">
        <div class=\"row g-2 align-items-center\">
            <div class=\"col\">
                <!-- Page pre-title -->
                <div class=\"page-pretitle\">
                    View Detail Data
                </div>
                <h2 class=\"page-title\">
                    ".ucwords(implode(' ', explode('_', substr($table_name, 4))))."
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class=\"page-body\">
    <div class=\"container-xl\">
        <div class=\"row row-cards\">
            <div class=\"col-12\">
                <div class=\"card\">
                    <div class=\"table-responsive\">
                        <table class=\"table card-table table-vcenter text-nowrap datatable\">";
                        foreach ($non_pk as $row) {
                            $string2 .= "
                            <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
                        }
                        $string2 .= "
                            <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-secondary\">Kembali</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php \$this->load->view('dist/_partials/footer') ?>
";

$string = "<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
        </body>
</html>";



$hasil_view_read = createFile($string2, $target."views/" . $c_url . "/" . $v_read_file);

?>
