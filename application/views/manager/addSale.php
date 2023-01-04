<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Sale / Invoice</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Invoicing </li>
            <li>Add Sale / Invoice </li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12 text-right">
							<a href="<?php echo base_url('manager/addNewClient');?>" class="btn btn-success" >Add New Customer</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<select name="client_info_saleClientID" class="form-control forselect2" id="clientNameID"  value="">
									    	<option value="" selected disabled > Select Client</option>						
											<?php foreach($values as $value) {?>
												<option value="<?php echo $value->clientID?>"><?php echo $value->clientContactName?></option>
											<?php } ?>
										</select>
										<div class="errorClass"><?php echo form_error('client_info_saleClientID'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Phone Number</label>
										<input type="text" id="clientPhnID" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="row">								
								<div class="col-md-12">
									<div class="form-group">
										<label>Client Address</label>
										<textarea name="" id="clientAddID" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body card-shadow">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							    <label>Product Type / Group</label>
							    <select name="" class="form-control forselect2"  id="productTypeID">
							    	<option value="" selected disabled > Select Product Type</option>						
									<?php foreach($types as $type) {?>
										<option value="<?php echo $type->productTypeID?>"><?php echo $type->productTypeName?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							    <label>Select Product</label>
							    <select class="form-control forselect2 product_class"  name="" id="selectProductID" required>
							    	<option selected disabled value="">Select Product</option>
								</select>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-success" id="addCartButton" >Submit</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="productTable">
							  <thead>
								<tr id="tableHeaderID" >
									<th>SL</th>
									<th>Barcode</th>
									<th>Name</th>
									<th>Weight</th>
									<th>Price</th>
								</tr>
							  </thead>
							  <tbody>
								<!-- <tr>
								  <td>001</td>
								  <td>123456789</td>
								  <td>This Is Details</td>
								  <td>1kg</td>
								  <td>120</td>
								</tr> -->
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_open('manager/saveSale'); ?>
	<input type="hidden" name="client_info_saleClientID" id="hiddenClientID" />
	<div class="row">
		<div class="col-md-6 col-md-offset-6">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped text-right">
								<tbody>
								    <tr> 
								      <th  style="vertical-align: middle;">Subtotal</th>
								        <td><input type="text" id="saleSubTotal" class="input-xs form-control text-right" value="0" readonly="readonly"></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">ADDITIONAL COST</th>
								        <td><input type="text" class="input-xs form-control text-right costChangeID" id="additionalID" value="0" name="additionalCost"></td>
								    </tr>
								    <tr>
								      	<th  style="vertical-align: middle;">DISCOUNT</th>								        
								        <td><input type="text" class="input-xs form-control text-right costChangeID" id="discountID" value="0" name="saleTotalDiscount"></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">TOTAL BILL</th>
								        <td><input type="text" class="input-xs form-control text-right" id="totalBillID" value="0" readonly="readonly" ></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">PREVIOUS DUE</th>
								        <td><input type="text" class="input-xs form-control text-right" readonly="readonly" id="clientBalanceID" name="previousDue"  value="0" ></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">GRAND TOTAL</th>
								        <td><input type="text" class="input-xs form-control text-right" id="grandTotalID" readonly="readonly" value="0" name="saleTotalAmount"></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">PAID AMOUNT</th>
								        <td><input type="text" class="input-xs form-control text-right costChangeID" id="paidID" value="0" name="receivedTotal"></td>
								    </tr>
								    <tr>
								      <th  style="vertical-align: middle;">TOTAL DUE</th>
								        <td><input type="text" class="input-xs form-control text-right" id="dueId" disabled></td>
								    </tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3 col-md-offset-9 text-right">
			<button type="submit" class="btn btn-success btn-block" >Submit</button>
		</div>
	</div>
	<?php echo form_close(); ?>
<?php include('footer.php') ?>