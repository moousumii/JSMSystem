<?php include('header.php') ?>
<?php //print_r($infos); ?>
<?php //echo $infos['return']->returnDate; ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Return Report Details</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="from-group">
								<label>Bill No</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->sale_info_saleID; ?>" readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Return Date</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->returnDate; ?>" readonly />
							</div>							
						</div>											
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Returned Product Barcode</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->productBarcode; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label>Returned Product Name</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->productName; ?>" readonly />
							</div>							
						</div>											
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Returned Product Quantity</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->returnProductQuantity; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label>Returned Product Price</label>
								<input type="text" class="form-control" value="<?php echo $infos['return']->returnProductPrice; ?>" readonly />
							</div>							
						</div>						
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Exchanged Product Barcode</label>
								<input type="text" class="form-control" value="<?php echo $infos['exchange']->productBarcode; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label>Exchanged Product Name</label>
								<input type="text" class="form-control" value="<?php echo $infos['exchange']->productName; ?>" readonly />
							</div>							
						</div>											
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Exchanged Product Quantity</label>
								<input type="text" class="form-control" value="<?php echo $infos['exchange']->newProductQuantity; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label>Exchanged Product Price</label>
								<input type="text" class="form-control" value="<?php echo $infos['exchange']->newProductPrice; ?>" readonly />
							</div>							
						</div>						
					</div>	
					<div class="row">
						<div class="col-md-12">
							<a type="button" href="<?php echo base_url('storeKeeper/returnReport'); ?>" class="btn btn-danger">Back</a>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>