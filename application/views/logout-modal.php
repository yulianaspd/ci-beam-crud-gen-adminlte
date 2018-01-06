
<div id="logout-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h4 class="modal-title"><?php echo lang('confirmation'); ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo lang('are_you_sure_to_leave'); ?></p>
			</div>
			<div class="modal-footer">
				<a id="logout-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal"><?php echo lang('cancel'); ?></a>
				<a id="logout-modal-continue" href="#" class="btn btn-danger"><?php echo lang('continue'); ?></a>
			</div>
		</div>
	</div>
</div>
<script>
$('body').on('click', '[data-button=logout]', function(e) {
	$('#logout-modal-continue').attr('href', $(this).attr('href'));
	$('#logout-modal').modal('show');
	e.preventDefault();
});
</script>
