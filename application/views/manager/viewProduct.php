<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Product</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li><a href="<?php echo base_url('manager/viewStock');?>">View Stock</a></li>
            <li>View Product</li>
         </ol>
      </div>
	</div>

<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/updateProduct', 'class="updateProductType-form"') ?>
					<?php echo form_hidden('productId',$data->productId); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Product ID</label>
										<?php echo form_input(['name'=>'productId', 'class'=>'form-control removeDisabled ', 'disabled'=>'disabled','readonly'=>'true','required'=>'required',  'value'=>set_value('productId').$data->productId]);?>
					    				<div class="errorClass"><?php echo form_error('productId'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product name</label>
										<?php echo form_input(['name'=>'productName', 'class'=>'form-control removeDisabled ', 'disabled'=>'disabled', 'required'=>'required', 'value'=>set_value('productName').$data->productName]);?>
					    				<div class="errorClass"><?php echo form_error('productName'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Product Type / Group</label>
											    <select name="product_type_info_productTypeID" class="form-control forselect2 removeDisabled" disabled required>	
											    	<option value="<?php echo $data->productTypeID ?>" selected ><?php echo $data->productTypeName ; ?></option>					
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
												<?php echo form_input(['name'=>'productWeight', 'class'=>'form-control removeDisabled ', 'disabled'=>'disabled', 'required'=>'required', 'value'=>set_value('productWeight').$data->productWeight]);?>
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
												<?php echo form_input(['name'=>'productAdditionalCost', 'class'=>'form-control removeDisabled ', 'disabled'=>'disabled', 'required'=>'required', 'value'=>set_value('productAdditionalCost').$data->productAdditionalCost]);?>
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
											    <select name="product_status_info_productStatusId" class="form-control forselect2 removeDisabled" disabled required>	
											    	<option value="<?php echo $data->productStatusId ?>" selected ><?php echo $data->statusTitle ; ?></option>					
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
										<?php echo form_textarea(['name'=>'productNote', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('productNote').$data->productNote]);?>
					    				<div class="errorClass"><?php echo form_error('productNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-success" id="removeDisabledButton"><i class="fa fa-pencil"></i> Edit</button>
									<button type="submit" class="btn btn-success addDisabled hidden"><i class="fa fa-thumbs-up"></i> Save</button>
									<button type="button" class="btn btn-success addDisabled hidden" id="addDisabledButton"><i class="fa fa-times"></i> Cancel</button>
									<button type="reset" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</button>					  
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