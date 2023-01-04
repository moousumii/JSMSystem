<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Product</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li>Add Product</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertProduct', 'class="addProduct-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Product Name</label>
										<?php echo form_input(['name'=>'productName', 'class'=>'form-control', 'value'=>set_value('productName')]);?>
											<div class="errorClass"><?php echo form_error('productName'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Product Type / Group</label>
											    <select name="product_type_info_productTypeID" class="form-control forselect2"  value="">
											    	<option value="" selected disabled > Select Product Type</option>						
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->productTypeID?>"><?php echo $value->productTypeName?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('product_type_info_productTypeID'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Weight</label>
												<?php echo form_input(['name'=>'productWeight', 'class'=>'form-control', 'value'=>set_value('productWeight')]);?>
												<div class="errorClass"><?php echo form_error('productWeight'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Additional Cost</label>
												<?php echo form_input(['name'=>'productAdditionalCost', 'class'=>'form-control', 'value'=>set_value('productAdditionalCost')]);?>
												<div class="errorClass"><?php echo form_error('productAdditionalCost'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Product Status</label>
											    <select name="product_status_info_productStatusId" class="form-control forselect2"  value="">
											    	<option value="" selected disabled > Select Product Status</option>						
													<?php foreach($status as $status) {?>
														<option value="<?php echo $status->productStatusId?>"><?php echo $status->statusTitle?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('product_status_info_productStatusId'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'productNote', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('productNote')]);?>
					    				<div class="errorClass"><?php echo form_error('productNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Add</button>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>