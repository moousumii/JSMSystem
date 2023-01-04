<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">My Account</h3>
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
	<?php //print_r($info); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Full Name </label>
								<input type="text" class="form-control" name="" value="<?php echo $info->adminName ?>" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>User ID</label>
								<input type="text" class="form-control" name="" value="<?php echo $info->adminUserID ?>" readonly />
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="" value="<?php echo $info->adminEmail ?>" readonly  />
							</div>							
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>User Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'adminAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'readonly'=>'readonly', 'value'=>set_value('adminAddress',$info->adminAddress)]);
									  //echo form_error('adminAddress'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Number </label>
								<input type="text" class="form-control" name="" value="<?php echo $info->adminContact ?>" readonly  />
							</div>	
							<div class="row m-top-15">
								<div class="col-md-12">
									<a class="btn btn-primary" role="button" data-toggle="collapse" href="#changeContact" aria-expanded="false" aria-controls="changeContact">
										Change Contact Number
									</a>
									<div class="collapse m-top-15" id="changeContact">
										<?php echo form_open('storeKeeper/updateContact'); ?>
										<div class="well">
											<div class="form-group">
												<label>New Contact Number</label>
												<input type="text" class="form-control" name="contact" value="" required />
											</div>	
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="reset" class="btn btn-danger">Reset</button>
										</div>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Password</label>
								<input type="text" class="form-control" name="" value="********" />
							</div>							
							<div class="row m-top-15">
								<div class="col-md-12">
									<a class="btn btn-primary" role="button" data-toggle="collapse" href="#changePass" aria-expanded="false" aria-controls="changePass">
										Change Password
									</a>
									<div class="collapse m-top-15" id="changePass">
										<?php echo form_open('storeKeeper/updatePassword'); ?>
										<div class="well">
											<div class="form-group">
												<label>Old Password</label>
												<?php echo form_password(['name'=>'old_pass', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
													 // echo form_error('old_pass'); ?>
											</div>	
											<div class="form-group">
												<label>New Password</label>
												<?php echo form_password(['name'=>'new_pass', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
													  //echo form_error('new_pass'); ?>
											</div>	
											<div class="form-group">
												<label>Retype New Password</label>
												<?php echo form_password(['name'=>'confirm_pass', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
													  echo form_error('confirm_pass'); ?>
											</div>	
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="reset" class="btn btn-danger">Reset</button>
										</div>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
						</div>						
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>