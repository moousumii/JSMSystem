<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Product Type</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li><a href="<?php echo base_url('manager/productType');?>">Product Type / Group</a> </li>
            <li>Add Product Type</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertProductType', 'class="addProductType-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Product Type / Group</label>
												<?php echo form_input(['name'=>'productTypeName', 'class'=>'form-control', 'value'=>set_value('productTypeName')]);?>
												<div class="errorClass"><?php echo form_error('productTypeName'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Pricing Unit</label>
												<select name="quality_price_info_qualityId" class="form-control forselect2"  value="">
											    	<option value="" selected disabled > Select Product Type</option>						
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->qualityId?>"><?php echo $value->quality?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('quality_price_info_qualityId'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'productTypeNote', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('productTypeNote')]);?>
					    				<div class="errorClass"><?php echo form_error('productTypeNote'); ?></div>
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