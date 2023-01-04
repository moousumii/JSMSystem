<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">My Account</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('manager/'); ?>">Dash Board</a></li>
				<li class="active">My Account</li>
			</ol>
		</div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">	
								<label>Name</label>
								<input type="" class="form-control removeDisabled" name="adminName" value="<?php echo $data->adminName; ?>" disabled readonly />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">	
								<label>User Name</label>
								<input type="" class="form-control removeDisabled" name="adminUserID" value="<?php echo $data->adminUserID; ?>"  required disabled readonly />
								<div class="errorClass"><?php echo form_error('adminUserID'); ?></div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="form-group">	
								<label > User Role</label>
								<select class="form-control" name="admin_role_roleID" disabled required readonly>
									<option value="<?php echo $data->roleID ?>" selected disabled> <?php echo $data->roleName; ?> </option>
									<option value="1">Super Admin</option>
									<option value="2">Admin</option>
									<option value="4">Manager</option>
								</select>
							</div>
						</div>							
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">	
								<label>Password</label>
								<input type="password" class="form-control removeDisabled" name="adminPassword" value="********" disabled readonly />
								<div class="errorClass"><?php echo form_error('adminPassword'); ?></div>
							</div>
						</div>
						<input type="hidden" class="form-control removeDisabled" name="adminID" value="<?php echo $data->adminID; ?>" disabled />
						<div class="col-md-6 m-top-25">
							<button class="btn btn-default removeDisabled" type="button" data-toggle="collapse" data-target="#changePass" aria-expanded="false" aria-controls="changePass" disabled>
								Change Password
							</button>
						</div>	
					</div>
					<?php echo form_open('manager/updatePassWord'); ?>	
					<div class="row">
						<div class="col-md-12">
							<div class="collapse" id="changePass">
								<div class="well">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">	
												<label>Old Password</label>
												<input type="password" class="form-control removeDisabled" name="adminPasswordOld" value="" disabled required />
											<div class="errorClass"><?php echo form_error('adminPasswordOld'); ?></div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">	
												<label>New Password</label>
												<input type="password" class="form-control removeDisabled" name="adminPasswordNew" value="" disabled required />
												<div class="errorClass"><?php echo form_error('adminPasswordNew'); ?></div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">	
												<label>Retype New Password</label>
												<input type="password" class="form-control removeDisabled" name="adminPasswordConfirm" value="" disabled required />
												<div class="errorClass"><?php echo form_error('adminPasswordConfirm'); ?></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-default removeDisabled" disabled><i class="fa fa-thumbs-up"></i> Save</button>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>	
					<?php echo form_close(); ?>				
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary" id="removeDisabledButton"><i class="fa fa-pencil"></i> Edit</button>
							<button type="submit" class="btn btn-success addDisabled hidden"><i class="fa fa-thumbs-up"></i> Save</button>
							<button type="button" class="btn btn-warning addDisabled hidden" id="addDisabledButton"><i class="fa fa-times"></i> Cancel</button>				  
						</div>				
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>