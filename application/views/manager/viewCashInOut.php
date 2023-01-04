<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Cash In / Out</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li><a href="<?php echo base_url('manager/transactionReport');?>">Transaction Report</a> </li>
            <li>View Cash In / Out</li>
         </ol>
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
										<label>Date & Time</label>
										<input type="text" value="<?php echo date('d-m-Y h:i a',strtotime($info->transectionDate)) ; ?>"class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Transaction Type</label>
										<input type="text" value="<?= $info->transectionTypeName ?>" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Amount</label>
										<input type="text" value="<?= $info->transectionTotalAmount ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<textarea class="form-control" rows="4"><?= $info->transectionDetails ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button onclick="window.history.back()" class="btn btn-danger"> Back</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	


	
<?php include('footer.php') ?>