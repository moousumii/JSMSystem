<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Product Type</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li><a href="<?php echo base_url('manager/productType');?>">Product Type / Group</a> </li>
            <li>View Product Type</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/updateProductType', 'class="updateProductType-form"') ?>
					<?php echo form_hidden('productTypeID',$data->productTypeID); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Product Type / Group</label>
												<?php echo form_input(['name'=>'productTypeName', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'required'=>'required', 'value'=>set_value('productTypeName').$data->productTypeName]);?>
												<div class="errorClass"><?php echo form_error('productTypeName'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Pricing Unit</label>
												<select name="quality_price_info_qualityId" class="form-control forselect2 removeDisabled" disabled required>	
											    	<option value="<?php echo $data->qualityId ?>" selected ><?php echo $data->quality ; ?></option>					
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->qualityId?>"><?php echo $value->quality?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('quality_price_info_qualityId'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Status</label>
										<select name="productTypeStatus" class="form-control removeDisabled" disabled required>				
											<option value="<?php echo $data->productTypeStatus ?>" selected disabled><?php if($data->productTypeStatus == 1) {echo 'Active';} else {echo "Inactive";}; ?></option>	
											<option value="1">Active</option>	
											<option value="2">Inactive</option>	
										</select>
								    	<div class="errorClass"><?php echo form_error('productTypeStatus'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'productTypeNote', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('productTypeNote').$data->productTypeNote]);?>
					    				<div class="errorClass"><?php echo form_error('productTypeNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-success" id="removeDisabledButton"><i class="fa fa-pencil"></i> Edit</button>
									<button type="submit" class="btn btn-success addDisabled hidden"><i class="fa fa-thumbs-up"></i> Save</button>
									<button type="button" class="btn btn-success addDisabled hidden" id="addDisabledButton"><i class="fa fa-times"></i> Cancel</button>
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