<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View All Product</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li>View All Product</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/viewStock', 'class="viewStock-form"')?>
					<div class="row">
						<?php //print_r($inputs); exit; ?>
						<div class="col-md-12">
							<div class="form-group">
								<label>Product Group</label>
							    <select name="product_type_info_productTypeID" class="form-control forselect2"  value="">
							    <?php if($inputs['product_type_info_productTypeID']=="") ?>
						    	<option value="" selected disabled > All </option>						
								<?php foreach($values as $value) {?>
								<?php if($inputs['product_type_info_productTypeID']==$value->productTypeID){ ?>
								<option value="<?php echo $value->productTypeID?>" selected ><?php echo $value->productTypeName?></option>
								<?php }else{ ?>
									<option value="<?php echo $value->productTypeID?>"><?php echo $value->productTypeName?></option>
								<?php } 
								} ?>
								</select>
								<div class="errorClass"><?php echo form_error('product_type_info_productTypeID'); ?></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">View Stock</button>
							<a type="button" href="<?php echo base_url('manager/viewStock') ?>" class="btn btn-warning">All</a>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info filterable">
				<div class="panel-heading text-right">
					<div class="row">
						<div class="col-md-12">
							<button id="filter_button" class="btn btn-success btn-filter with_print" ><i class="fa fa-filter"></i> Filter</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr class="active filters">
									<th>
										<input type="text" class="form-control" placeholder="BARCODE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="TYPE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="NAME" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="STATUS" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="WEIGHT" disabled data-toggle="true" id="">
									</th>
									<th>
										<span>VIEW</span>
									</th>
								</tr>
							  </thead>
							  
							  <tbody>
							  	<?php foreach ($infos as $info) {?>
								<tr>
								  <td><?php echo $info->productBarcode ?></td>
								  <td><?php echo $info->productTypeName ?></td>
								  <td><?php echo $info->productName ?></td>
								  <td><?php echo $info->statusTitle ?></td>
								  <td><?php echo $info->productWeight ?></td>
								  <td><a href="<?php echo base_url("manager/viewProduct/{$info->productId}"); ?>"" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a></td>
								</tr>
								<?php }?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>