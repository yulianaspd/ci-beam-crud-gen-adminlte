<?php

$string = "<div class=\"row\">
    <div class=\"col-xs-12\">
        <?php echo \$this->session->flashdata('info'); ?>
        <div class=\"box box-info\">
            <div class=\"box-header\">
                <div class=\"pull-right\">
                    <a href=\"<?php echo \$page_url.'/add'; ?>\" class=\"btn btn-primary btn-social btn-sm\"><i class=\"fa fa-plus-circle\"></i> Tambah</a>
                    <a href=\"<?php echo \$page_url.'/excel'; ?>\" class=\"btn btn-success btn-social btn-sm\"><i class=\"fa fa-file-excel-o\"></i> Export Excel</a>
                    <a href=\"<?php echo \$page_url.'/word'; ?>\" class=\"btn btn-info btn-social btn-sm\"><i class=\"fa fa-file-word-o\"></i> Export Word</a>
                </div>
                <h3 class=\"box-title\"><?php echo \$panel_title; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class=\"box-body\">
                <div class=\"table-responsive\">
                    <table id=\"<?php echo \$table_id; ?>\" class=\"table table-bordered table-striped\">
                        <thead>
                            <tr>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t    <th>" . label($row['column_name']) . "</th>";
}

$column_non_pk = array();
foreach ($non_pk as $i=>$row) {
    if($i>0)
    {
        $column_non_pk[] .= "\n\t\t\t{\"data\": \"".$row['column_name']."\"}";
    }
    else
    {
        $column_non_pk[] .= "{
            \"data\": \"".$row['column_name']."\",
            \"render\": function(data, type, row, meta) {
                    return '<a data-button=\"detail\" href=\"<?php echo \$page_url.'/view/'; ?>' + row.id + '\">' + data + '</a>';
                }
            }";
    }
}

$col_non_pk = implode(',', $column_non_pk);
$string .= "\n\t\t\t\t\t\t    <th style=\"width:50px\"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    \$this->load->view('delete-modal');
    \$this->load->view('detail-modal');
?>

<script>
    var the_table;

    \$(function() {
        the_table = \$(\"#<?php echo \$table_id; ?>\").DataTable({
            \"processing\": true,
            \"serverSide\": true,
            \"stateSave\": true,
            \"stateDuration\": 0,
            \"ajax\": {
                \"url\": \"<?php echo \$api_url.'/index'; ?>\",
                \"type\": \"POST\"
            },
            \"columns\": [
            ".$col_non_pk.",
            {
                \"data\": \"action\",
                \"orderable\": false,
                \"className\" : \"text-center\"
            }
            ]
        });

    });
</script>
";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
