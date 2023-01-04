<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Edit Supplier</h3>
		</div>
	</div>
	<?php 
		echo form_open('storeKeeper/updateSupplier/'.$infos->supplierID);
		/*$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('supplierAddedDate',$date); 
	    echo form_hidden('supplierStatus',1);*/
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label>Company Name</label>
								<?php echo form_input(['name'=>'supplierCompanyName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierCompanyName',$infos->supplierCompanyName)]);
									  echo form_error('supplierCompanyName'); ?>
							</div>
						</div>
						<div class="col-md-3 ">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="supplierStatus" required>
									<option value="<?php echo $infos->supplierStatus; ?>" selected><?php if($infos->supplierStatus==1)echo "Active"; else echo "InActive";  ?></option>
									<option value="1">Active</option>
									<option value="0">InActive</option>
								</select>
								<?php echo form_error('supplierStatus'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Name</label>
								<?php echo form_input(['name'=>'supplierContactName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierContactName',$infos->supplierContactName)]);
									  echo form_error('supplierContactName'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Number</label>
								<?php echo form_input(['name'=>'supplierContact', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierContact',$infos->supplierContact)]);
									  echo form_error('supplierContact'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Address</label>
								<?php echo form_textarea(['name'=>'supplierAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierAddress',$infos->supplierAddress)]);
								echo form_error('supplierAddress'); ?>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Save </button>
							<a href="<?php echo base_url("storekeeper/allSupplier"); ?>" type="button" class="btn btn-danger" ><i class="fa fa-" ></i> Back</a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
	
<?php include('footer.php') ?>