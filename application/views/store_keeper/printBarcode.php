<?php include('header.php') ?>
	<div class="row with_print">
		<div class="col-md-12">
			<h3 class="page-header">Print Barcode</h3>
		</div>
	</div>
	<div class="row with_print">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(''); ?>
					
					<div class="row">
						<div class="col-md-6">
							<label>Product</label>
							<select class="form-control barcodeProductID forselect2" id="select2" name="productID" required>
								<option value="" selected disabled >Select Product</option>
								<?php foreach($products as $product){ ?>
									<option value="<?php echo $product->productID; ?>"><?php echo $product->productID." => ".$product->productName; ?></option>
								<?php } ?>
							</select>
							<div style="" id="barcodeError" class="warningSize red-text"></div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Product Quantity</label>
								<input type="text" class="form-control barcodeProductQuantity">
							</div>
						</div>
					</div>
					<div class="row pull-right">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary barcodeButton" id="addBarcodePrintbutton"  >Add</button>
							<button class="btn btn-warning with_print" name="print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>	
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="">
		<div class="col-md-12 col-xs-12">
				<div class="page-break barcodeDiv">
					
				</div>	
				<!--<div class="row">
					<div class="col-md-2"><img src="" alt="image" /></div>						
					<div class="col-md-2"><img src="" alt="image" /></div>						
					<div class="col-md-2"><img src="" alt="image" /></div>						
					<div class="col-md-2"><img src="" alt="image" /></div>						
					<div class="col-md-2"><img src="" alt="image" /></div>						
					<div class="col-md-2"><img src="" alt="image" /></div>						
				</div>	-->	
		</div>
	</div>
	
<?php include('footer.php') ?>