<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Income Expense Report</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li>Income Expense Report</li>
         </ol>
      </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/incomeExpenseReport'); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<!--Date Picker-->
									<input class="form-control" id="startDate" name="firstDate" value="<?php if($inputs['firstDate']) echo date('d-m-Y',strtotime($inputs['firstDate'])) ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
									<label>To Date</label>
									<!--Date Picker-->
									<input class="form-control" id="endDate" name="lastDate" value="<?php if($inputs['lastDate']) echo date('d-m-Y',strtotime($inputs['lastDate'])) ?>" >
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
									    <label>  Total Income (Debit)</label>
									    <input type="text" id="totalIncomeAmountID"  class="form-control" disabled/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Expense (Credit)</label>
									    <input type="text" id="totalExpenseAmountID"  class="form-control" disabled />
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
									    <label>Net Income (As In)</label>
									    <input type="text" id="netTotalBalanceID"  class="form-control" disabled/>
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
							<h3 style="margin-top: 0px; position: absolute;" class="text-left">Expense</h3>
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
							  	$totalexpense=0;
							  	if($infos): 
							  	    foreach($infos as $info): ?>
							  	    <?php 
							  	    	if($info->transectionType==2 || $info->transectionType==7 || $info->transectionType==4 ){
							  	    	$totalexpense=$totalexpense+$info->transectionTotalAmount; ?>
										<tr>
										  <td><?php echo $info->transectionDate; ?></td>
										  <td><?php echo $info->transectionTypeName; ?></td>
										  <td><?php echo $info->transectionTotalAmount; ?></td>
										  <td>
										  	<a href="<?php echo base_url("manager/$info->transectionTypeLink/{$info->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										  </td>
										</tr>
										<?php } ?>
									
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
							<h3 style="margin-top: 0px; position: absolute;" class="text-left">Income</h3>
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
								$totalIncomeAmount=0;
							  	if($infos): 
							  	    foreach($infos as $info): ?>
							  	    <?php 
							  	    	if($info->transectionType==6 || $info->transectionType==11 ){
							  	    	$totalIncomeAmount=$totalIncomeAmount+$info->transectionTotalAmount; ?>
										<tr>
										  <td><?php echo $info->transectionDate; ?></td>
										  <td><?php echo $info->transectionTypeName; ?></td>
										  <td><?php echo $info->transectionTotalAmount; ?></td>
										  <td>
										  	<a href="<?php echo base_url("manager/$info->transectionTypeLink/{$info->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										  </td>
										</tr>
										<?php } else if($info->transectionType==1){ 
												$due=common::get_previous_due_of_sale($info->transectionReferenceID);
												$info->transectionTotalAmount=$info->transectionTotalAmount-$due;
												$totalIncomeAmount=$totalIncomeAmount+$info->transectionTotalAmount; 
											?>

											<tr>
											  <td><?php echo $info->transectionDate; ?></td>
											  <td><?php echo $info->transectionTypeName; ?></td>
											  <td><?php echo $info->transectionTotalAmount; ?></td>
											  <td>
											  	<a href="<?php echo base_url("manager/$info->transectionTypeLink/{$info->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
											  </td>
											</tr>

										<?php } ?>
								<?php endforeach; endif; ?>
								<input type="hidden" id="totalExpenseID" value="<?php echo $totalexpense ?>">
								<input type="hidden" id="totalIncomeID" value="<?php echo $totalIncomeAmount ?>">
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>