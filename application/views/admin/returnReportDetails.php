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
						<div class="col-md-4">
							<div class="from-group">
								<label>Bill No</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->sale_info_saleID; ?>" readonly />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Return Date</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->returnDate; ?>" readonly />
							</div>							
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Shop Name</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->shopTitle; ?>" readonly />
							</div>							
						</div>							
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="from-group">
								<label>Total Returned Quantity</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->returnProductQuantity; ?>" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Total Exchanged Quantity</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->newProductQuantity; ?>" readonly />
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Total Returned Amount</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->returnTotalPrice; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Total Exchanged Amount</label>
								<input type="text" class="form-control" value="<?php echo $infos['billInfo']->newTotalPrice; ?>" readonly />
							</div>							
						</div>							
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3 class="page-header">Returned Product Details</h3>
						</div>
					</div>
					<?php foreach($infos['return'] as $returnProduct): ?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Returned Product Barcode</label>
								<input type="text" class="form-control" value="<?php echo $returnProduct->productBarcode; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Returned Product Name</label>
								<input type="text" class="form-control" value="<?php echo $returnProduct->productName; ?>" readonly />
							</div>							
						</div>		
						<div class="col-md-3">
							<div class="form-group">
								<label>Returned Product Quantity</label>
								<input type="text" class="form-control" value="<?php echo $returnProduct->exchangeProductQuantity; ?>" readonly />
							</div>							
						</div>			
						<div class="col-md-3">
							<div class="form-group">
								<label>Returned Product Price</label>
								<input type="text" class="form-control" value="<?php echo $returnProduct->exchangeProductPrice; ?>" readonly />
							</div>							
						</div>						
					</div>
					<?php endforeach ; ?>
					<div class="row">
						<div class="col-md-12">
							<h3 class="page-header">Exchanged Product Details</h3>
						</div>
					</div>
					
					<?php foreach($infos['exchange'] as $exchangeProduct): ?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Exchanged Product Barcode</label>
								<input type="text" class="form-control" value="<?php echo $exchangeProduct->productBarcode; ?>" readonly />
							</div>							
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Exchanged Product Name</label>
								<input type="text" class="form-control" value="<?php echo $exchangeProduct->productName; ?>" readonly />
							</div>							
						</div>		
						<div class="col-md-3">
							<div class="form-group">
								<label>Exchanged Product Quantity</label>
								<input type="text" class="form-control" value="<?php echo $exchangeProduct->exchangeProductQuantity; ?>" readonly />
							</div>							
						</div>			
						<div class="col-md-3">
							<div class="form-group">
								<label>Exchanged Product Price</label>
								<input type="text" class="form-control" value="<?php echo $exchangeProduct->exchangeProductPrice; ?>" readonly />
							</div>							
						</div>						
					</div>
					<?php endforeach ; ?>
					
					
					<div class="row">
						<div class="col-md-12">
							<a type="button" href="<?php echo base_url('admin/returnReport'); ?>" class="btn btn-danger">Back</a>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>