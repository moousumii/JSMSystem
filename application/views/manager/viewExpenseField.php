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
            <li><a href="<?php echo base_url('manager/allExpenseField');?>">All Expense Field</a></li>
            <li>View Expense Field</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/updateExpenseField', 'class="updateExpenseField-form"') ?>
					<?php echo form_hidden('expenseFieldID',$data->expenseFieldID); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label>Expense Field</label>
									    <?php echo form_input(['name'=>'expenseFieldName', 'class'=>'form-control removeDisabled', 'disabled'=>'disabled', 'required'=>'required', 'value'=>set_value('expenseFieldName').$data->expenseFieldName]);?>
										<div class="errorClass"><?php echo form_error('expenseFieldName'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label>Status</label>
									    <select name="expenseFieldStatus" class="form-control removeDisabled" disabled required>				
											<option value="<?php echo $data->expenseFieldStatus ?>" selected disabled><?php if($data->expenseFieldStatus == 1) {echo 'Active';} else {echo "Inactive";}; ?></option>	
											<option value="1">Active</option>	
											<option value="0">Inactive</option>	
										</select>
								    	<div class="errorClass"><?php echo form_error('expenseFieldStatus'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Details</label>
										<?php echo form_textarea(['name'=>'expenseFieldDetails', 'class'=>'form-control removeDisabled','disabled'=>'disabled', 'rows'=>'3','value'=>set_value('expenseFieldDetails').$data->expenseFieldDetails]);?>
					    				<div class="errorClass"><?php echo form_error('expenseFieldDetails'); ?></div>
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
	
<?php include('footer.php') ?>