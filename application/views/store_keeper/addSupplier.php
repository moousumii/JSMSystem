<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Supplier</h3>
		</div>
	</div>
	<?php 
		echo form_open('storeKeeper/storeSupplier');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('supplierAddedDate',$date); 
	    echo form_hidden('supplierStatus',1);
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Company Name</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'supplierCompanyName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierCompanyName')]);
									  echo form_error('supplierCompanyName'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Name</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'supplierContactName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierContactName')]);
									  echo form_error('supplierContactName'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Number</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'supplierContact', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierContact')]);
									  echo form_error('supplierContact'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'supplierAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'value'=>set_value('supplierAddress')]);
									  echo form_error('supplierAddress'); ?>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Add </button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
	
<?php include('footer.php') ?>