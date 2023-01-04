<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Cash In-Out</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li><a href="<?php echo base_url('manager/allExpense');?>">All Expense</a></li>
            <li>Add Cash In-Out</li>
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
								<?php echo form_open('manager/saveCashInOut'); ?>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Transaction Type</label>
											    <select class="form-control" name="transectionType" value="" required >
											    	<option selected disabled="">Select Transaction Type</option>
											    	<option value="6">Cash In</option>
											    	<option value="7">Cash Out</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Amount</label>
										<input type="text" name="transectionTotalAmount" class="form-control" required />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<textarea class="form-control" name="transectionDetails" rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Done</button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>