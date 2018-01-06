	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header">
					<div class="pull-right">
						<a href="<?php echo site_url('auth/user/add'); ?>" class="btn btn-primary btn-social btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
					</div>
					<h3 class="box-title">Users</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
						<table id="dataTable_user" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><?php echo lang('first_name'); ?></th>
									<th><?php echo lang('last_name'); ?></th>
									<th><?php echo lang('username'); ?></th>
									<th><?php echo lang('email'); ?></th>
									<th>Role</th>
									<th><?php echo lang('registered'); ?></th>
									<th style="width:50px"></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					<div class="table-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		$this->load->view('delete-modal');
		$this->load->view('detail-modal');
	?>

	<script>
		var the_table;

		$(function() {
			the_table = $("#dataTable_user").DataTable({
				"processing": true,
				"serverSide": true,
				"stateSave": true,
				"stateDuration": 0,
				"ajax": {
					"url": "<?php echo site_url('api/user/index'); ?>",
					"type": "POST"
				},
				"columns": [
				{ "data": "first_name" },
				{ "data": "last_name" },
				{
					"data": "username",
					"render": function(data, type, row, meta) {
						return '<a data-button="detail" href="<?php echo site_url('auth/user/view/') ?>/' + row.id + '">' + data + '</a>';
					}
				},
				{ "data": "email" },
				{ "data": "role" },
				{ "data": "registered" },
				{
					"data": "action",
					"orderable": false,
					"render": function(data, type, row, meta) {
						return '<div class="text-center"><div class="btn-group"><a href="<?php echo site_url('auth/user/edit/') ?>/' + row.id + '" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil"></i></a><a href="<?php echo site_url('auth/user/delete/') ?>/' + row.id + '" title="Delete" data-button="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></div></div>';
					}
				}
				]
			});

		});
	</script>
<!-- <i class="fa fa-pencil"></i> <i class="fa fa-trash"></i> -->
