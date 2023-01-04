<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Expense</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li><a href="<?php echo base_url('manager/allExpense');?>">All Expense</a></li>
            <li>Add Expense</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertExpense', 'class="addExpense-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Expense Field</label>
											    <select name="expense_field_info_expenseFieldID" class="form-control forselect2"  required>
											    	<option value="" selected disabled > Select Expense Field</option>						
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->expenseFieldID?>"><?php echo $value->expenseFieldName?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('expense_field_info_expenseFieldID'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<?php echo form_input(['name'=>'expenseAmount', 'required'=>'required', 'class'=>'form-control', 'value'=>set_value('expenseAmount')]);?>
												<div class="errorClass"><?php echo form_error('expenseAmount'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label>Details</label>
										<?php echo form_textarea(['name'=>'expenseDetails', 'class'=>'form-control', 'rows'=>'3','required'=>'required','value'=>set_value('expenseDetails')]);?>
					    				<div class="errorClass"><?php echo form_error('expenseDetails'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'expenseNote', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('expenseNote')]);?>
					    				<div class="errorClass"><?php echo form_error('expenseNote'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Add Expense</button>
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