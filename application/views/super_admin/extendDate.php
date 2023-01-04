<?php include('header.php') ?>
<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Extend Dates</h3>
		</div>
	</div>
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
	<div class="row incomeExpenseReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open('superAdmin/extendDate'); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Start Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" name="expairDate" placeholder="Start Date" />
							</div>							
						</div>
						<div class="col-md-16" style="margin:25px;">
							<button type="submit" class="btn btn-primary">Confirm</button>
						</div>		
					</div>
					
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>