<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Client</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li><a href="<?php echo base_url('manager/allClient');?>">All Client</a> </li>
            <li>Add New Client</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertNewClient', 'class="addNewClient-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<?php echo form_input(['name'=>'clientContactName', 'class'=>'form-control', 'value'=>set_value('clientContactName')]);?>
										<div class="errorClass"><?php echo form_error('clientContactName'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Phone Number</label>
										<?php echo form_input(['name'=>'clientContactNumber', 'class'=>'form-control', 'value'=>set_value('clientContactNumber')]);?>
										<div class="errorClass"><?php echo form_error('clientContactNumber'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Reference</label>
										<?php echo form_input(['name'=>'clientReference', 'class'=>'form-control', 'value'=>set_value('clientReference')]);?>
										<div class="errorClass"><?php echo form_error('clientReference'); ?></div>
									</div>
								</div>
								<div class="col-md-6 form-group">
									<label>Client Since</label>
									<?php echo form_input(['name'=>'businessStartedSince', 'class'=>'form-control', 'id'=>'startDate', 'value'=>set_value('businessStartedSince')]);?>
									<div class="errorClass"><?php echo form_error('businessStartedSince'); ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Address</label>
										<?php echo form_textarea(['name'=>'clientAddress', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('clientAddress')]);?>
					    				<div class="errorClass"><?php echo form_error('clientAddress'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'clientNote', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('clientNote')]);?>
					    				<div class="errorClass"><?php echo form_error('clientNote'); ?></div>
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
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Client Total Due</label>
										<?php echo form_input(['name'=>'clientBalance', 'class'=>'form-control', 'value'=>set_value('clientBalance')]);?>
										<div class="errorClass"><?php echo form_error('clientBalance'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Add</button>
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