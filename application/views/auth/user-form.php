<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Users</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-horizontal" method="post">
					<fieldset>
						<?php echo $form->fields(); ?>
					</fieldset>
					<?php
					echo form_actions(array(
						array(
							'id' => 'save-button',
							'value' => lang('save'),
							'class' => 'btn-primary'
						),
						array(
							'id' => 'cancel-button',
							'value' => lang('cancel')
						)
					));
					?>
				</form>
			</div>
		</div>
	</div>
</div>
