<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Receive Payment</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li><a href="<?php echo base_url('manager/transactionReport');?>">Transaction Report</a> </li>
            <li>View Receive Payment</li>
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
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Date & Time</label>
												<input type="text" class="form-control" value="<?= date('d-m-Y h:i a',strtotime($info->transectionDate)) ; ?>" disabled />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Client</label>
												<input type="text" class="form-control" value="<?= $info->clientContactName; ?>" disabled />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<input type="text" class="form-control" value="<?= $info->transectionTotalAmount; ?>" disabled />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Details</label>
												<textarea class="form-control" rows="3" disabled ><?= $info->transectionDetails; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</div> -->
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