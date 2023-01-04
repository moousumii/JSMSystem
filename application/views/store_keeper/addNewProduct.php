<?php include('header.php') ?>
<?php //print_r($infos); ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Product</h3>
		</div>
	</div>
	<?php 
		echo form_open('storeKeeper/storeNewProduct');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
		$admin_id=$this->session->userdata('admin_id');
	    echo form_hidden('productAddedDate',$date); 
	    echo form_hidden('productStatus',1); 
		echo form_hidden('admin_info_productAdminID',$admin_id);
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Product Name</label>
								<?php echo form_input(['name'=>'productName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('productName')]);
									  echo form_error('productName'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Group Name</label>
								<select class="form-control forselect2" name="group_info_productGroupID">
									<option value="" disabled selected>Select Product Group</option>
									<?php foreach($infos['groupInfo'] as $group){ ?>
											<option value="<?php echo $group->groupID; ?>"><?php echo $group->groupName; ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Supplier Name</label>
								<select class="form-control forselect2" name="supplier_info_productSupplierID">
									<option value="" disabled selected>Select Supplier</option>
									<?php foreach($infos['supplierInfo'] as $supplier){ ?>
											<option value="<?php echo $supplier->supplierID; ?>"><?php echo $supplier->supplierCompanyName; ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Purchase Price</label>
								<?php echo form_input(['name'=>'productPurchasePrice', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('productPurchasePrice')]);
									  echo form_error('productPurchasePrice'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Sale Price</label>
								<?php echo form_input(['name'=>'productSalePrice', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('productSalePrice')]);
									  echo form_error('productSalePrice'); ?>
							</div>
						</div>		
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
<?php include('footer.php') ?>