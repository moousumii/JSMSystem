<div class="row">
		<div class="col-md-12">
			<?php if($this->session->flashdata('feedback_successfull'))
					{ ?>
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="fa fa-times"></i></span>
								</button>
							<strong>Success!</strong>
							<?php echo $this->session->flashdata('feedback_successfull'); ?>
						</div>
					<?php } 
					if($this->session->flashdata('feedback_failed'))
						{ ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fa fa-times"></i></span>
									</button>
								<strong>Oops!</strong>
								<?php echo $this->session->flashdata('feedback_failed'); ?>
							</div>
				<?php   } ?>
		</div>
	</div>