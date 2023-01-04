<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Invoice / Print</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Invoicing </li>
            <li>View Invoice / Print </li>
         </ol>
      </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Sale ID</label>
								<input type="text" class="form-control" value="<?= $info->saleID;?>" disabled/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Date & Time</label>
								<input type="text" value="<?= $info->saleDate;?>" class="form-control" disabled/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php //print_r($info); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<input type="text" class="form-control" name="" value="<?= $info->clientContactName;?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Phone Number</label>
										<input type="text" class="form-control" name="" value="<?= $info->clientContactNumber;?>" disabled>
									</div>
								</div>
							</div>
							<div class="row">								
								<div class="col-md-12">
									<div class="form-group">
										<label>Client Address</label>
										<textarea name="" id="" class="form-control" value="<?= $info->clientAddress;?>" disabled ><?= $info->clientAddress;?></textarea>
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
				<div class="panel-body">
					
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr>
									<th>SL</th>
									<th>Barcode</th>
									<th>Name</th>
									<th>WEIGHT</th>
									<th style="text-align:right;" >PRICE</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php $i=0; $subtotal=0;
							  		foreach($details as $detail): $i++ ?>
									<tr>
									  <td><?= $i?></td>
									  <td><?= $detail->productBarcode ?></td>
									  <td><?= $detail->productName?></td>
									  <td><?= $detail->saleProductWeight?></td>
									  <td style="text-align:right;"><?= $detail->salePrice?></td>
									</tr>
									<?php $subtotal=$subtotal+$detail->salePrice; ?>
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
		<div class="col-md-6 col-md-offset-6">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<tbody>
								    <tr>
								      <th>Subtotal</th>
								        <td style="text-align:right;"><?= $subtotal;?></td>
								    </tr>
								    <tr>
								      <th>ADDITIONAL COST</th>
								        <td style="text-align:right;"><?= $info->additionalCost;?></td>
								    </tr>
								    <tr>
								      <th>DISCOUNT</th>
								        <td style="text-align:right;"><?= $info->saleTotalDiscount;?></td>
								    </tr>
								    <tr>
								      <th>TOTAL Bill</th>
								        <td style="text-align:right;"><?= $info->saleTotalAmount-$info->previousDue;?></td>
								    </tr>
								    <tr>
								      <th>PREVIOUS DUE</th>
								        <td style="text-align:right;"><?= $info->previousDue;?></td>
								    </tr>
								    <tr>
								      <th>GRAND TOTAL</th>
								        <td style="text-align:right;"><?= $info->saleTotalAmount;?></td>
								    </tr>
								    <tr>
								      <th>PAID AMOUNT</th>
								        <td style="text-align:right;"><?= $info->receivedTotal;?></td>
								    </tr>
								    <tr>
								      	<th>TOTAL Due</th>
								       	<td style="text-align:right;"><?= $info->saleTotalAmount-$info->receivedTotal;?></td>
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
		<div class="col-md-3 col-md-offset-9">
			<button class="btn btn-danger btn-lg btn-block pull-right ">Print</button>
		</div>
	</div>
	
<?php include('footer.php') ?>