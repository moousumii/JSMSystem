<div class="modal fade" id="refreshModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Refresh</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<h4>Are you sure you want to refresh data ?</h4>
					</div>
				</div>
			</div>	
			<div class="modal-footer">
				<a href="<?php echo base_url("admin/refreshData"); ?>" type="button" class="btn btn-primary">Yes</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			</div>			
		</div>				
	</div>
</div>