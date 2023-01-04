<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Sale Details</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li class="active">View Sale Details</li>
         </ol>
      </div>
   	</div>
	<?php echo form_open('manager/storeInvoice'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							    <label>Client Name</label>
								<input type="text" id="clientIdForInvoice" class="form-control" name="client_info_saleClientID" value="" disabled>
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">
							    <label>Client Contact No.</label>
							    <input type="text" id="clientContactNumberID" class="form-control" name="" value="" disabled>
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label>Client Address</label>
							    <textarea type="text" id="clientAddressID" class="form-control input-lg" name="" value="" disabled> </textarea>
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
						<div class="col-md-3">
							<div class="form-group">
							    <label>Product</label>
							    <input type="text" id="productIdForInvoice" class="form-control ajaxInputField" name="" value="" disabled>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							    <label>Quantity</label>
							    <input type="text" id="productQtyForInvoice" class="form-control ajaxInputField" name="" value="" disabled>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
							    <label>Buy Rate</label>
							    <input type="text" id="productRateForInvoice" class="form-control ajaxInputField" name="" value="" disabled>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
							    <label>Sale Rate</label>
							    <input type="text" class="form-control ajaxInputField" id="productSpecialRateForInvoice" name="" value="" disabled>
							</div>
						</div>	
					</div>
				</div>
				<div class="panel-body">						
					<div class="row">
						<div class="col-md-12 m-top-15">
							<table class="table table-striped" >
								<thead>
									<tr class="active">
										<th>SL</th>
										<th>Details</th>
										<th>Quantity</th>
										<th>Rate</th>
										<th>Amount</th>
										<th>Remove</th>
									</tr>
								</thead>
								<?php 
									$totalsubtotal=0; 
								?>
								<tbody id="productTable">
									<?php if($cart=$this->cart->contents()){ ?>
									<?php foreach($cart as $item): ?>
										<tr id="row<?php echo $item['id'] ?>">
											<td id="productclmn<?php echo $item['id'] ?>"><?php echo $item['id'] ?></td>
											<td id=""><?php echo $item['name'] ?></td>
											<td><?php echo $item['qty'] ?></td>
											<td><?php echo $item['salePrice'] ?></td>
											<td><?php echo ($item['qty']*$item['salePrice']); ?></td>
											<td><a type="button" onClick="delete_row('<?php echo $item['rowid'] ?>', '<?php echo $item['id'] ?>', '<?php echo $item['salePrice'] ?>', '<?php echo $item['qty'] ?>')" ><i class="fa fa-times"></i></a></td>
										</tr>	
									<?php 
										//$totalProductQty=$totalProductQty+$item['qty']; 
										$totalsubtotal=$totalsubtotal+($item['qty']*$item['salePrice']); 
									?>
									<?php endforeach ; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>						
				</div>	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
							    <label>Transport Cost</label>
							    <input type="text" class="form-control otherCosts" name="transportCost" id="transportCostID" value=" " disabled>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							    <label>Additional Cost</label>
							    <input type="text" class="form-control otherCosts" name="additionalCost" id="additionalCostID" value=" " disabled>
							  </div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
							    <label>Discount</label>
							    <input type="text" class="form-control otherCosts" name="saleTotalDiscount" id="discountID" value="" disabled>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							    <label>Paid Amount </label>
							    <input type="text" class="form-control otherCosts" name="receivedTotal" value="" id="paidAmountID" disabled>
							</div>
						</div>	

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 col-md-offset-8">
					<input type="hidden" id="totalSubtotalID" value="<?php echo $totalsubtotal; ?>" name="productSubtotal" class="" />
					<input type="hidden" id="clientDueID" value="0" class="" />
					<ul class="list-group">
					  <li class="list-group-item">Subtotal<span class="pull-right totalSubtotalClass"><?php echo $totalsubtotal; ?></span></li>
					  <li class="list-group-item">Total Bill <span class="pull-right" id="totalBillID"><?php echo $totalsubtotal; ?></span></li>
					  <li class="list-group-item" >Previous Due <span class="pull-right" id="clientBalanceID">0</span></li>
					  <li class="list-group-item">Grand Total <span class="pull-right" id="grandTotalID"><?php echo $totalsubtotal; ?></span></li>
					  <li class="list-group-item">Total Due <span class="pull-right" id="totalDueID">0</span></li>
					</ul>
				</div>
				<div class="col-md-3 pull-right">
					<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-thumbs-up"></i> Done</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
<?php include('footer.php') ?>