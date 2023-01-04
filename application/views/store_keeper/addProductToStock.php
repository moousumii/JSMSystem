<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Product to Stock</h3>
		</div>
	</div>
	<?php 
		echo form_open('storeKeeper/storeProductToStock');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
		$admin_id=$this->session->userdata('admin_id');
	    echo form_hidden('productUpdatedDate',$date);
	    echo form_hidden('productUpdatedBy',$admin_id);
	    
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<label>Product</label>
						<select class="form-control forselect2 addProductID" id="select2" name="productID" required>
							<option value="" selected disabled >Select Product</option>
							<?php foreach($products as $product){ ?>
								<option value="<?php echo $product->productID; ?>"><?php echo $product->productID." => ".$product->productName; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>	
				<div class="row m-top-15">
					<div class="col-md-6" >
						<div class="form-group">
							<label>Group</label>
							<input class="form-control" id="addproductGroupName" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Supplier</label>
							<input class="form-control" id="addproductSupplierName" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Purchase Price</label>
							<!--<input class="form-control" id="addproductPurchasePrice" name="productPurchasePrice" >-->
							<?php echo form_input(['name'=>'productPurchasePrice', 'required'=>'required', 'class'=>'form-control', 'id'=>'addproductPurchasePrice', 'value'=>set_value('productPurchasePrice')]);
								  echo form_error('productPurchasePrice'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Sale Price</label>
							<!--<input class="form-control" id="addproductSalePrice" name="productSalePrice" >-->
							<?php echo form_input(['name'=>'productSalePrice', 'required'=>'required', 'class'=>'form-control', 'id'=>'addproductSalePrice', 'value'=>set_value('productSalePrice')]);
								  echo form_error('productSalePrice'); ?>
						</div>
					</div>		
					<div class="col-md-4">
						<div class="form-group">
							<label>Stock Quantity</label>
							<!--<input class="form-control" id="addproductQuantity" name="productQuantity" >-->
							<?php echo form_input(['name'=>'productQuantity', 'required'=>'required', 'class'=>'form-control', 'id'=>'addproductQuantity', 'value'=>set_value('productQuantity')]);
								  echo form_error('productQuantity'); ?>
						</div>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Done</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	
	
<?php include('footer.php') ?>