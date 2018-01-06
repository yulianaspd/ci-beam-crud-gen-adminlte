<?php

$string = "<div class=\"row\">
    <div class=\"col-xs-12\">
        <div class=\"box box-info\">
            <div class=\"box-header\">
                <h3 class=\"box-title\"><?php echo \$panel_title; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class=\"box-body\">
                <form class=\"form-horizontal\" method=\"post\">
                    <fieldset>
                        <?php echo \$form->fields(); ?>
                    </fieldset>
                    <div class=\"form-group\">
                        <div class=\"col-sm-offset-4 col-sm-8\">
                    <?php
                    \$data = array(
                        'name' => 'save-button',
                        'id' => 'save-button',
                        'value' => lang('save'),
                        'type' => 'submit',
                        'class' => 'btn btn-sm btn-social btn-primary',
                        'content' => '<i class=\"fa fa-save\"></i> '.lang('save')
                    );

                    echo form_button(\$data);

                    \$data = array(
                        'name' => 'cancel-button',
                        'id' => 'cancel-button',
                        'value' => lang('cancel'),
                        'type' => 'submit',
                        'class' => 'btn btn-sm btn-social btn-default',
                        'content' => '<i class=\"fa fa-reply\"></i> '.lang('cancel')
                    );

                    echo form_button(\$data);
                    ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>
