<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Cash Book</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li>Cash Book</li>
         </ol>
      </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label>Current Cash in Hand</label>
							    <input type="text" class="form-control" value="<?= $cashAmount;?> TK" disabled />
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
					<?php echo form_open('manager/cashBook'); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<!--Date Picker-->
									<input class="form-control" id="startDate" name="firstDate" value="<?php if($firstDate) echo date('d-m-Y',strtotime($firstDate)) ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
									<label>To Date</label>
									<!--Date Picker-->
									<input class="form-control" id="endDate" name="lastDate" value="<?php if($lastDate) echo date('d-m-Y',strtotime($lastDate)) ?>" >
									<!--Date Picker-->
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">Go</button>
						</div>
					</div>
					<?php echo form_close(); ?>
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
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Payments (Credit)</label>
									    <input type="text" id="totalDebitAmountID"  class="form-control" disabled />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>  Total Receipts (Debit)</label>
									    <input type="text" id="totalCaditAmountID"  class="form-control" disabled/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Balance (As In)</label>
									    <input type="text" id="totalBalanceID"  class="form-control" disabled/>
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
			<div class="panel panel-info filterable">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12 text-right">
							<h3 style="margin-top: 0px; position: absolute;" class="text-left">Credit (Payments)</h3>
							<button id="filter_button" class="btn btn-success btn-filter with_print" ><i class="fa fa-filter"></i> Filter</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <!-- <caption class="text-center"><h3 style="margin-top: 0px;">Debit (Receipts)</h3></caption> -->
							  <thead>

								<tr class="active filters">
									<th>
										<input type="text" class="form-control" placeholder="TRANSACTION DATE & TIME" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="TRANSACTION TYPE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="AMOUNT" disabled data-toggle="true" id="">
									</th>
									<th>
										<span>VIEW</span>
									</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php
							  	$totalDebitAmount=0;
							  	if($debits): 
							  	    foreach($debits as $debit): ?>
							  	    <?php $totalDebitAmount=$totalDebitAmount+$debit->transectionTotalAmount; ?>
										<tr>
										  <td><?php echo $debit->transectionDate; ?></td>
										  <td><?php echo $debit->transectionTypeName; ?></td>
										  <td><?php echo $debit->transectionTotalAmount; ?></td>
										  <td>
										  <!-- 	<button type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></button> -->
										  	<a href="<?php echo base_url("manager/$debit->transectionTypeLink/{$debit->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										  </td>
										</tr>
									
								<?php endforeach; endif; ?>
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
			<div class="panel panel-info filterable">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12 text-right">
							<h3 style="margin-top: 0px; position: absolute;" class="text-left">Debit (Receipts)</h3>
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
										<input type="text" class="form-control" placeholder="TRANSACTION DATE & TIME" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="TRANSACTION TYPE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="AMOUNT" disabled data-toggle="true" id="">
									</th>
									<th>
										<span>VIEW</span>
									</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								$totalCaditAmount=0;
							  	if($cadits):
							  	 foreach($cadits as $cadits): ?>
									<tr>
									  <td><?php echo $cadits->transectionDate; ?></td>
									  <td><?php echo $cadits->transectionTypeName; ?></td>
									  <td><?php echo $cadits->transectionTotalAmount; ?></td>
									  <td>
									  <!-- 	<button type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></button> -->
									  	<a href="<?php echo base_url("manager/$cadits->transectionTypeLink/{$cadits->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
									  </td>
									</tr>
									<?php $totalCaditAmount=$totalCaditAmount+$cadits->transectionTotalAmount; ?>
								<?php endforeach; endif; ?>
								<input type="hidden" id="totalCaditID" value="<?php echo $totalCaditAmount ?>">
								<input type="hidden" id="totalDebitID" value="<?php echo $totalDebitAmount ?>">
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>