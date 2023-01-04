<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Bill</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li>Add Bill</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/insertBill', 'class="addBill-form"') ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <label>Client</label>
											    <select name="client_info_supplierId" class="form-control forselect2"  value="">
											    	<option value="" selected disabled > Select Client</option>						
													<?php foreach($values as $value) {?>
														<option value="<?php echo $value->clientID?>"><?php echo $value->clientContactName?></option>
													<?php } ?>
												</select>
												<div class="errorClass"><?php echo form_error('client_info_supplierId'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Amount</label>
												<?php echo form_input(['name'=>'billAmount', 'class'=>'form-control', 'value'=>set_value('billAmount')]);?>
												<div class="errorClass"><?php echo form_error('billAmount'); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Details</label>
										<?php echo form_textarea(['name'=>'billDetails', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('billDetails')]);?>
					    				<div class="errorClass"><?php echo form_error('billDetails'); ?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Note</label>
										<?php echo form_textarea(['name'=>'billNote', 'class'=>'form-control', 'rows'=>'3','value'=>set_value('billNote')]);?>
					    				<div class="errorClass"><?php echo form_error('billNote'); ?></div>
									</div>
								</div>
							</div>
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