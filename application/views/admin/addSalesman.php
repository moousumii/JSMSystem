<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Salesman</h3>
		</div>
	</div>
	<?php 
		echo form_open('admin/storeSalesman');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('salesmanJoinedDate',$date); 
	    echo form_hidden('salesmanStatus',1);
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
								<?php echo form_input(['name'=>'salesmanName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('salesmanName')]);
									  echo form_error('salesmanName'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Email</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'salesmanEmail', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('salesmanEmail')]);
									  echo form_error('salesmanEmail'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Contact</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'salesmanContact', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('salesmanContact')]);
									  echo form_error('salesmanContact'); ?>
							</div>
						</div>
						
						<div class="col-md-4">
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
						<div class="col-md-12">
							<div class="form-group">
								<label>Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'salesmanAddress', 'rows'=>'3','class'=>'form-control', 'required'=>'required', 'value'=>set_value('salesmanAddress')]);
									  echo form_error('salesmanAddress'); ?>
							</div>
						</div>
						<!--<div class="col-md-6">
							<div class="form-group">
								<label>User Name/ID</label>
								<?php //echo form_input(['name'=>'adminUserID', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('adminUserID')]);
									  //echo form_error('adminUserID'); ?>
							</div>
						</div>-->
						
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