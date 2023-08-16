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
                    <?= \$this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah'?> Data
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
                    <form action=\"<?php echo \$action; ?>\" method=\"post\">
                        <div class=\"card-body\">";
                        foreach ($non_pk as $row) {
                            if ($row["data_type"] == 'text') {
                                $string2 .= "
                            <div class=\"mb-3\">
                                <label class=\"form-label required\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                                <div><textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea></div>
                            </div>";
                            } else {
                                $string2 .= "
                            <div class=\"mb-3\">
                                <label class=\"form-label required\" for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                                <div><input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></div>
                            </div>";
                            }
                        }
                        $string2 .= "
                            <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" />
                        </div>
                        <div class=\"card-footer\">
                            <button type=\"submit\" class=\"btn btn-primary\"><?= \$button ?></button>
                    	    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-secondary\">Cancel</a>
                        </div>
                    </form>
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
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2>
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t</form>
    </body>
</html>";

$hasil_view_form = createFile($string2, $target."views/" . $c_url . "/" . $v_form_file);

?>
