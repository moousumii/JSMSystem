<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Manager</h3>
		</div>
	</div>
	<?php 
		echo form_open('admin/storeManager');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('adminJoinDate',$date); 
	    echo form_hidden('adminStatus',1); 
	    echo form_hidden('admin_role_roleID',4); 
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
								<?php echo form_input(['name'=>'adminName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminName')]);
									  echo form_error('adminName'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>User Email</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminEmail', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminEmail')]);
									  echo form_error('adminEmail'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>User Contact</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminContact', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminContact')]);
									  echo form_error('adminContact'); ?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>User Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'adminAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminAddress')]);
									  echo form_error('adminAddress'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>User Name/ID</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'adminUserID', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminUserID')]);
									  echo form_error('adminUserID'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Shop Name</label>
								<select class="form-control" name="shop_info_shopID">
									<option value="" disabled selected>Select Shop</option>
									<?php foreach($shop_info as $shop){ ?>
											<option value="<?php echo $shop->shopID; ?>"><?php echo $shop->shopTitle; ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Password</label>
								<!--<input class="form-control">-->
								<?php echo form_password(['name'=>'adminPassword', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
									  echo form_error('adminPassword'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Confirm Password</label>
								<!--<input class="form-control">-->
								<?php echo form_password(['name'=>'confirm_password', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('')]);
									  echo form_error('confirm_password'); ?>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Add Manager</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>