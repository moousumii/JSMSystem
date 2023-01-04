<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Receive Payment</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li>Receive Payment</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertReceivePayment', 'class="receivePayment-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label>Client</label>
									    <select name="client_info_transectionClientId" class="form-control forselect2" id="clientNameID"  required >
									    	<option value="" selected disabled > Select Client</option>						
											<?php foreach($values as $value) {?>
												<option value="<?php echo $value->clientID?>"><?php echo $value->clientContactName?></option>
											<?php } ?>
										</select>
										<div class="errorClass"><?php echo form_error('client_info_transectionClientId'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									
									<div class="form-group">
										<label>Amount</label>
										<?php echo form_input(['name'=>'transectionTotalAmount', 'class'=>'form-control', 'id'=>'receivePaymentAmountID', 'required'=>'required', 'value'=>set_value('transectionTotalAmount')]);?>
										<div class="errorClass"><?php echo form_error('transectionTotalAmount'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">								
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Details</label>
												<?php echo form_textarea(['name'=>'transectionDetails', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('transectionDetails')]);?>
					    						<div class="errorClass"><?php echo form_error('transectionDetails'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Previous Balance</label>
										<input type="text" id="clientBalanceID" class="form-control" disabled />
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											
											<div class="form-group">
												<label>Received Amount</label>
												<input type="text" id="receiveAmountID" class="form-control" disabled />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Current Due</label>
												<input type="text" id="currentDueAmountID" class="form-control" disabled />
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Note</label>
										<textarea name="" class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Done</button>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>