<?php include('header.php') ?>
<?php //print_r($info); ?>
<?php //print_r($details); ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Sale Details</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label> Shop Name </label>
								<input type="text" class="form-control" value="<?php echo $info->shopTitle; ?>" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label> Invoice No </label>
								<input type="text" class="form-control" value="<?php echo $info->saleID; ?>" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<?php $info->saleDate= date('d,M y h:ia', strtotime($info->saleDate)); ?>
								<label> Date & Time </label>
								<input type="text" class="form-control" value="<?php echo $info->saleDate; ?>" readonly />
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label> Served By </label>
								<?php if($info->salesman_info_salesmanID>0){ ?>
								<input type="text" class="form-control" value="<?php echo $info->salesmanName; ?>" readonly />
								<?php } 
								else { ?>
								<input type="text" class="form-control" value="Not Selected" readonly />
								<?php } ?>
							</div>
						</div>							
					</div>				
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Rate</th>
										<th>Quantity</th>
										<th>Sub Total</th>
									</tr>
								</thead>
								<?php $totalqty=0; $totalAmount=0;?>
								<tbody>
									<?php foreach($details as $infod):  //print_r($info);?>
									<?php //$info->supplierAddedDate= date('d,M y h:ia', strtotime($info->supplierAddedDate)); ?>
									<tr id="">
										<td style="width:60%;"><p><span><?php echo $infod->productName; ?></span></p></td>
										<td style="width:10%;;"><p><span><?php echo $infod->salePrice; ?></span></p></td>
										<td style="width:10%;"><p><span><?php echo $infod->saleProductQuantity; ?></span></p></td>
										<td style="width:20%; "><p><span><?php echo ($infod->saleProductQuantity*$infod->salePrice); ?></span></p></td>
										
									</tr>
									<?php $totalqty=$totalqty+$infod->saleProductQuantity; ?>
									<?php //$totalAmount=$totalAmount+($info->saleProductQuantity*$info->salePrice); ?>
									<?php endforeach; ?>
									
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
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label> Total Items	</label>
								<input type="text" class="form-control" value="<?php echo $totalqty; ?>" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label> Discount </label>
								<input type="text" class="form-control" value="<?php echo $info->saleTotalDiscount; ?>" readonly />
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Grand Total </label>
								<input type="text" class="form-control" value="<?php echo $info->saleTotalAmount; ?>" readonly />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label> Commision </label>
								<input type="text" class="form-control" value="<?php echo $info->salesmanTotalCommission; ?>" readonly />
							</div>
						</div>	
					</div>	
					<div class="row">
						<div class="col-md-12">
							<a type="button" href="<?php echo base_url('admin/incomeExpenseReport'); ?>" class="btn btn-danger">Back</a>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>