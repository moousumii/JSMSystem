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
            <li>Add Expense Field</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertExpenseField', 'class="addExpenseField-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									    <label>Expense Field</label>
									    <?php echo form_input(['name'=>'expenseFieldName', 'class'=>'form-control', 'value'=>set_value('expenseFieldName')]);?>
										<div class="errorClass"><?php echo form_error('expenseFieldName'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Details</label>
										<?php echo form_textarea(['name'=>'expenseFieldDetails', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('expenseFieldDetails')]);?>
					    				<div class="errorClass"><?php echo form_error('expenseFieldDetails'); ?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success"> Add Expense Field</button>
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