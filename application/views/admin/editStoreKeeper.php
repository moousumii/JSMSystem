<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Edit Store Keeper</h3>
		</div>
	</div>
	<?php 
		echo form_open('admin/updateStoreKeeper/'.$infos->adminID);
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('adminUpdateDate',$date);
		echo form_hidden('admin_role_roleID',3); 
		//echo form_hidden('adminID',$infos->adminID); 
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Full Name</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminName',$infos->adminName)]);
									  echo form_error('adminName'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>User Email</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminEmail', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminEmail',$infos->adminEmail)]);
									  echo form_error('adminEmail'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>User Contact</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminContact', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminContact',$infos->adminContact)]);
									  echo form_error('adminContact'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="adminStatus" required >
									<option value="<?php echo $infos->adminStatus; ?>" disabled selected><?php if($infos->adminStatus==1)echo "Active"; else echo "InActive";  ?></option>
									<option value="1">Active</option>
									<option value="2">InActive</option>
									
								</select>
							</div>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>User ID</label>
								<?php //echo form_input(['name'=>'adminUserID', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminUserID',$infos->adminUserID)]);
									  //echo form_error('adminUserID'); ?>
							</div>
						</div>
					</div>-->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>User Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'adminAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminAddress',$infos->adminAddress)]);
									  echo form_error('adminAddress'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url("admin/allStoreKeeper"); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-"></i> Back</a>	
						</div>
						<?php echo form_close(); ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Edit Password</h4>
				</div>
				<div class="panel-body">					
					<div class="row">
						<?php //echo form_open(''); ?>
						<div class="col-md-6">
							<div class="form-group">
								<label>Password</label>
								<?php //echo form_password(['name'=>'adminPassword', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
									  //echo form_error('adminPassword'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Confirm Password</label>
								<?php// echo form_password(['name'=>'confirm_password', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
									  //echo form_error('confirm_password'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="#" type="button" class="btn btn-danger"><i class="fa fa-"></i> Back</a>	
						</div>
						<?php //echo form_close(); ?>
					</div>		
				</div>
			</div>
		</div>
	</div>-->
<?php include('footer.php') ?>