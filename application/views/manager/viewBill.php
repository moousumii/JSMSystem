<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Bill</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li>View Bill</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
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
											    <input type="text" class="form-control" name="" value="<?= $info->transectionID?>" disabled="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Date & Time</label>
												<input type="text" class="form-control" name="" value="<?= $info->billAddedDate?>" disabled="">
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
											    <input type="text" class="form-control" name="" value="<?= $info->clientContactName?>" disabled="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<input type="text" class="form-control" name="" value="<?= $info->billAmount?>" disabled="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Details</label>
										<textarea type="text" class="form-control" name="" disabled><?= $info->billDetails?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<textarea type="text" class="form-control" name="" disabled><?= $info->billNote?></textarea>
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