<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Supplier Details</h3>
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
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label>Company Name </label>
								<input type="" class="form-control" value="<?php echo $infos->supplierCompanyName ?>" name="" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Supplier Status</label>
								<input type="" class="form-control" value="<?php if($infos->supplierStatus==1)echo "Active"; else echo "InActive";  ?>" name="" readonly />
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Contact Person </label>
								<input type="" class="form-control" value="<?php echo $infos->supplierContactName ?>" name="" readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>  Contact Number </label>
								<input type="" class="form-control" value="<?php echo $infos->supplierContact ?>" name="" readonly />
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label> Address </label>
								<textarea class="form-control" rows="2" readonly><?php echo $infos->supplierAddress  ?></textarea>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12">
							
							<a href="<?php echo base_url("storekeeper/editSupplier/{$infos->supplierID}"); ?>" type="button" class="btn btn-primary" ><i class="fa fa-pencil" ></i> Edit</a>
							<a href="<?php echo base_url("storekeeper/allSupplier"); ?>" type="button" class="btn btn-danger" ><i class="fa fa-" ></i> Back</a>
							
						</div>
					</div>						
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>