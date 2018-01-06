
<div id="detail-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h4 class="modal-title">Detail</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<a id="detail-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
			</div>
		</div>
	</div>
</div>
<script>
$('body').on('click', '[data-button=detail]', function(e) {
	var url_target = $(this).attr('href');

	$.ajax({
		url: url_target,
		type: 'POST',
		dataType: 'html',
		success: function(data){
			$('#detail-modal .modal-body').html(data);
		}
	});
	$('#detail-modal').modal('show');
	e.preventDefault();
});
</script>
