<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Stock Update Report</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li>Stock Update Report</li>
         </ol>
      </div>
	</div>
	<?php echo form_open('manager/stockUpdateReport'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<!--Date Picker-->
									<input class="form-control" name="firstDate" id="startDate" value="<?php echo $inputs['firstDate'] ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
									<label>To Date</label>
									<!--Date Picker-->
									<input class="form-control" name="lastDate" id="endDate" value="<?php echo $inputs['lastDate'] ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
								    <label>Product Group</label>
								    <select class="form-control forselect2" name="productType" value="" required>
								    	<?php if($inputs['productType']==0){ ?> 
								    	<option selected value="0">All Group</option> <?php }  else{ ?>
								    		<option value="0">All Group</option>
								    	<?php } ?> ?>
								    	<?php foreach($infos['productType'] as $type): ?>
								    		<?php if($inputs['productType']==$type->productTypeID){ ?>
									    	<option value="<?php echo $type->productTypeID; ?>" selected ><?php echo $type->productTypeName; ?></option>  <?php } else{ ?>
									    		<option value="<?php echo $type->productTypeID; ?>" ><?php echo $type->productTypeName; ?></option>
									    	<?php } ?>
									    <?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6 form-group">
								    <label>Entry Type</label>
								    <select class="form-control forselect2" name="entryId" value="" required>
								    	<?php if($inputs['entryId']==0) { ?> 
								    		<option selected value="0">All</option>
								    	<?php } else{ ?>
								    		<option value="0">All</option>
								    	<?php } if($inputs['entryId']==1) { ?>
									    	<option value="1" selected>Add</option>
									    	<option value="2">Sale</option>
								    	<?php } else if($inputs['entryId']==2){ ?>
								    		<option value="1">Add</option>
								    		<option value="2"  selected>Sale</option>

								    	<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">Go</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
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
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Product Added</label>
									    <input type="text" id="addedProductTotalID" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Weight of added product</label>
									    <input type="text" id="addedProductWeightTotalID" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Price of added product</label>
									    <input type="text" id="addedProductPriceTotalID" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Product sold</label>
									    <input type="text" id="soldProductTotalID" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Weight of sold product</label>
									    <input type="text" id="soldProductWeightTotalID" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Price of sold product</label>
									    <input type="text" id="soldProductPriceTotalID" class="form-control"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12"><h2 class="text-center m-bottom-25">Sold Product</h2></div>
					</div>
					<div class="row m-bottom-25">
						<div class="col-md-12">
							<table class="table table-striped">
							  	<thead>
									<tr class="filters">
										<th>
											<input type="text" class="form-control" placeholder="PRODUCT BARCODE" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="PRODUCT TYPE" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="WEIGHT" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="PRICE" disabled data-toggle="true" id="">
										</th>
										<th>
											<span>VIEW</span>
										</th>
									</tr>
							  	</thead>
							  	<tbody>
							  		<?php $totalSoldPrice=0; $totalSoldWeight=0; $totalSoldProduct=0; ?>
							  		<?php if($infos['soldProduct']): ?>
							  		<?php foreach($infos['soldProduct'] as $sproduct): ?>
										<tr>
										  <td><?php echo $sproduct->productBarcode ?></td>
										  <td><?php echo $sproduct->productTypeName ?></td>
										  <td><?php echo $sproduct->saleProductWeight ?> g</td>
										  <td><?php echo $sproduct->salePrice ?> tk</td>
										  <td>
										  	<a href="<?= base_url("manager/viewProduct/{$sproduct->product_info_saleProductID}")?>" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										  </td>
										</tr>
										<?php 
											$totalSoldPrice=$totalSoldPrice+$sproduct->salePrice;
											$totalSoldWeight=$totalSoldWeight+$sproduct->saleProductWeight;
											$totalSoldProduct++;
										 ?>
									<?php endforeach; endif; ?>
									<input type="hidden" name="" id="totalsoldPriceID" value="<?php echo $totalSoldPrice; ?>">
									<input type="hidden" name="" id="totalsoldWeightID" value="<?php echo $totalSoldWeight; ?>">
									<input type="hidden" name="" id="totalsoldProductID" value="<?php echo $totalSoldProduct; ?>">
							  </tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12"><h2 class="text-center m-bottom-25">New Product</h2></div>
					</div>
					<div class="row m-bottom-25">
						<div class="col-md-12">
							<table class="table table-striped">
							  	<thead>
									<tr class="filters">
										<th>
											<input type="text" class="form-control" placeholder="PRODUCT BARCODE" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="PRODUCT TYPE" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="WEIGHT" disabled data-toggle="true" id="">
										</th>
										<th>
											<input type="text" class="form-control" placeholder="PRICE" disabled data-toggle="true" id="">
										</th>
										<th>
											<span>VIEW</span>
										</th>
									</tr>
							  	</thead>
							  	<tbody>
							  		<?php $totalAddedPrice=0; $totalAddedWeight=0; $totalProduct=0; ?>
							  		<?php if($infos['newProduct']): ?>
							  		<?php foreach($infos['newProduct'] as $nproduct): ?>
										<tr>
										  <td><?php echo $nproduct->productBarcode ?></td>
										  <td><?php echo $nproduct->productTypeName ?></td>
										  <td><?php echo $nproduct->productWeight ?> g</td>
										  <td><?php echo (($nproduct->productWeight*$nproduct->qualityPrice)+$nproduct->productAdditionalCost); ?> tk</td>
										  <td>
										  	<a href="<?= base_url("manager/viewProduct/{$nproduct->productId}")?>" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										  </td>
										</tr>
										<?php 
										$totalAddedPrice=$totalAddedPrice+(($nproduct->productWeight*$nproduct->qualityPrice)+$nproduct->productAdditionalCost);
										$totalAddedWeight=$totalAddedWeight+$nproduct->productWeight;
										$totalProduct++;
										 ?>
									<?php endforeach; endif; ?>
									<input type="hidden" name="" id="totalnewPriceID" value="<?php echo $totalAddedPrice; ?>">
									<input type="hidden" name="" id="totalnewWeightID" value="<?php echo $totalAddedWeight; ?>">
									<input type="hidden" name="" id="totalnewProductID" value="<?php echo $totalProduct; ?>">
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>