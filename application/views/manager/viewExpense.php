<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Expense</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li><a href="<?php echo base_url('manager/allExpense');?>">All Expense</a> </li>
            <li>View Expense</li>
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
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Date & Time</label>
												<?php echo form_input(['name'=>'expenseDate', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'value'=>set_value('expenseDate').$data->expenseDate]);?>
												<div class="errorClass"><?php echo form_error('expenseDate'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Expense Field</label>
												<?php echo form_input(['name'=>'expenseFieldName', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'value'=>set_value('expenseFieldName').$data->expenseFieldName]);?>
												<div class="errorClass"><?php echo form_error('expenseFieldName'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<?php echo form_input(['name'=>'expenseAmount', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'value'=>set_value('expenseAmount').$data->expenseAmount]);?>
												<div class="errorClass"><?php echo form_error('expenseAmount'); ?></div>
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
												<label>Details</label>
												<?php echo form_textarea(['name'=>'expenseDetails', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('expenseDetails').$data->expenseDetails]);?>
												<div class="errorClass"><?php echo form_error('expenseDetails'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'expenseNote', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('expenseNote').$data->expenseNote]);?>
										<div class="errorClass"><?php echo form_error('expenseNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-success" onclick="window.history.back()" >Back</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>