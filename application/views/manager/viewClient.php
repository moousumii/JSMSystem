<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Clients</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li><a href="<?php echo base_url('manager/allClient');?>">All Clients</a> </li>
            <li>View Clients</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/updateNewClient', 'class="updateNewClient-form"') ?>
					<?php echo form_hidden('clientID',$data->clientID); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<?php echo form_input(['name'=>'clientContactName', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled','required'=>'required', 'value'=>set_value('clientContactName').$data->clientContactName]);?>
										<div class="errorClass"><?php echo form_error('clientContactName'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Phone Number</label>
										<?php echo form_input(['name'=>'clientContactNumber', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'required'=>'required','value'=>set_value('clientContactNumber').$data->clientContactNumber]);?>
										<div class="errorClass"><?php echo form_error('clientContactNumber'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Client Reference</label>
										<?php echo form_input(['name'=>'clientReference', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'value'=>set_value('clientReference').$data->clientReference]);?>
										<div class="errorClass"><?php echo form_error('clientReference'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Client Since</label>
										<?php echo form_input(['name'=>'businessStartedSince', 'class'=>'form-control removeDisabled', 'id'=>'startDate', 'disabled'=>'disabled','required'=>'required', 'value'=>set_value('businessStartedSince').$data->businessStartedSince]);?>
										<div class="errorClass"><?php echo form_error('businessStartedSince'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Status</label>
									    <select name="clientStatus" class="form-control removeDisabled" disabled required>				
											<option value="<?php echo $data->clientStatus ?>" selected disabled><?php if($data->clientStatus == 1) {echo 'Active';} else {echo "Inactive";}; ?></option>	
											<option value="1">Active</option>	
											<option value="0">Inactive</option>	
										</select>
								    	<div class="errorClass"><?php echo form_error('clientStatus'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label>Client Address</label>
										<?php echo form_textarea(['name'=>'clientAddress', 'class'=>'form-control removeDisabled','disabled'=>'disabled','required'=>'required', 'rows'=>'3','value'=>set_value('clientAddress').$data->clientAddress]);?>
										<div class="errorClass"><?php echo form_error('clientAddress'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'clientNote', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('clientNote').$data->clientNote]);?>
										<div class="errorClass"><?php echo form_error('clientNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Client Total Due</label>
												<?php echo form_input(['name'=>'clientBalance', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'readonly'=>'true', 'value'=>set_value('clientBalance').$data->clientBalance]);?>
												<div class="errorClass"><?php echo form_error('clientBalance'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-success" id="removeDisabledButton"><i class="fa fa-pencil"></i> Edit</button>
									<button type="submit" class="btn btn-success addDisabled hidden"><i class="fa fa-thumbs-up"></i> Save</button>
									<button type="button" class="btn btn-success addDisabled hidden" id="addDisabledButton"><i class="fa fa-times"></i> Cancel</button>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">
							<h3 class="m-top-5 m-bottom-5">Transactions</h3>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr class="filters">
									<th>
										DATE & TIME
									</th>
									<th>
										TRANSACTION TYPE
									</th>
									<th>
										AMOUNT
									</th>
									<th>
										VIEW
									</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php if($transactions):
							  		foreach($transactions as $transaction):
							  	 ?>
									<tr>
									  <td><?= date('d-m-Y',strtotime($transaction->transectionDate)); ?></td>
									  <td><?= $transaction->transectionTypeName ?></td>
									  <td><?= $transaction->transectionTotalAmount ?></td>
									  <td><a href="<?php echo base_url("manager/$transaction->transectionTypeLink/{$transaction->transectionID}");?>" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a></td>
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


	
<?php include('footer.php') ?>