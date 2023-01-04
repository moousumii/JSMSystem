<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Manager Details</h3>
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
						
						<div class="col-md-12">
							<div class="form-group">
								<label> Name </label>
								<input type="" class="form-control" value="<?php echo $infos->adminName; ?>" name="" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>User ID </label>
								<input type="" class="form-control" value="<?php echo $infos->adminUserID; ?>" name="" readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Status </label>
								<input type="" class="form-control" value="<?php if($infos->adminStatus==1)echo "Active"; else echo "InActive";  ?>" name="" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> User Email </label>
								<input type="" class="form-control" value="<?php echo $infos->adminEmail; ?>" name="" readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> User Contact </label>
								<input type="" class="form-control" value="<?php echo $infos->adminContact; ?>" name="" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Address </label>
								<textarea class="form-control" rows="2" readonly><?php echo $infos->adminAddress  ?></textarea>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Shop Name </label>
								<input type="" class="form-control" value="<?php echo $infos->shopTitle; ?>" name="" readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<?php $infos->adminJoinDate= date('d,M y h:ia', strtotime($infos->adminJoinDate)); ?>
								<label> Join Date </label>
								<input type="" class="form-control" value="<?php echo $infos->adminJoinDate; ?>" name="" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url("admin/editManager/{$infos->adminID}"); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> Edit</a>	
							<a href="<?php echo base_url("admin/allManager"); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-"></i> Back</a>	
						</div>
					</div>
											
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>