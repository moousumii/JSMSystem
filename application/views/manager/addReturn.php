<?php include('header.php') ?>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Return</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Invoicing</li>
            <li>Add Return</li>
         </ol>
      </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<?php echo form_open('manager/saveReturn'); ?>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Client</label>
											    <select name="client_info_saleClientID" class="form-control forselect2" id="clientNameID"  value="" required>
											    	<option value="" selected disabled > Select Client</option>						
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->clientID?>"><?php echo $value->clientContactName?></option>
													<?php } ?>
												</select>

											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Client Phone Number</label>
												<input type="text" id="clientPhnID" class="form-control"/>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">								
										<div class="col-md-12">
											<div class="form-group">
												<label>Client Address</label>
												<textarea name="" id="clientAddID" class="form-control"></textarea>
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
											    <input type="text" name="returnProductID" class="form-control" placeholder="Returning Product"/>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<input type="text" class="form-control" name="returnTotalPrice" placeholder="Amount"/>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Return Type</label>
												<select class="form-control" name="returnType" value="" required>
											    	<option selected disabled>Select an Option</option>
											    	<option value="1">Cash Back</option>
											    	<option value="2">Wallet</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<textarea class="form-control" placeholder="Write a short note" name="returnNote"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success">Add Return</button>
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>