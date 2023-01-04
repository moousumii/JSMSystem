<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Return</h3>
		</div>
	</div>
	<div class="row">
      	<div class="col-md-12">
         	<ol class="breadcrumb">
	            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
	            <li>Invoicing</li>
	            <li>View Return</li>
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
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Transaction ID</label>
											    <input type="text" class="form-control" name="" value="<?= $info->transectionID?>" disabled>

											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Date & Time</label>
												<input type="text" class="form-control" name="" value="<?= date('m/d/Y h:i a',strtotime($info->returnDate))?>" disabled>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Client</label>
											    <input type="text" class="form-control" name="" value="<?= $info->clientContactName?>" disabled>

											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Client Phone Number</label>
												<input type="text" class="form-control" name="" value="<?= $info->clientContactNumber ?> " disabled>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">								
										<div class="col-md-12">
											<div class="form-group">
												<label>Client Address</label>
												<textarea class="form-control" placeholder="" name="" disabled><?= $info->clientAddress ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Returning Product</label>
											    <input type="text" class="form-control" name="" value="<?= $info->returnDate?>" disabled>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<input type="text" class="form-control" name="" value="<?= $info->returnTotalPrice?>" disabled>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Return Type</label>
												<input type="text" class="form-control" name="" value="<?php if($info->returnType==1) echo "Cash"; else echo "Wallet"; ?>" disabled>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<textarea class="form-control" placeholder="" name="" disabled><?= $info->returnNote?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>