<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Transaction Report</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li>Transaction Report</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/transactionReport', 'class="transactionReport-form"')?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<!--Date Picker-->
									<input type="text" id="startDate" class="form-control" name="firstDate" value="<?php if($inputs['firstDate']) echo date('d-m-Y',strtotime($inputs['firstDate'])) ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
									<label>To Date</label>
									<!--Date Picker-->
									<input type="text" id="endDate" class="form-control" name="lastDate" value="<?php if($inputs['lastDate']) echo date('d-m-Y',strtotime($inputs['lastDate'])) ?>">
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
					<?php echo form_close() ?>
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
										<input type="text" class="form-control" placeholder="DATE & TIME" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="TRANSACTION TYPE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="DETAILS" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="AMOUNT" disabled data-toggle="true" id="">
									</th>
									<th>
										<span>VIEW</span>
									</th>
								</tr>
							  </thead>
							  <?php if($infos){ ?>
								<tbody>
									<?php foreach ($infos as $info) {?>
									<tr>
										<td><?php echo $info->transectionDate ?></td>
										<td><?php echo $info->transectionTypeName ?></td>
										<td><?php echo $info->transectionDetails ?></td>
										<td><?php echo $info->transectionTotalAmount ?></td>
										<td><a href="<?php echo base_url("manager/$info->transectionTypeLink/{$info->transectionReferenceID}");?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a></td>
									</tr>
									<?php }?> 
								</tbody>
								<?php } else echo "No Data Found!"; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>