<?php include('header.php') ?>
<?php //print_r($infos); ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Expense Details</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<?php $infos->expenceDate = date('d,M y h:ia', strtotime($infos->expenceDate)); ?>
								<label> Date </label>
								<input type="text" class="form-control" value="<?php echo $infos->expenceDate ; ?>" readonly />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Transaction ID </label>
								<input type="text" class="form-control" value="<?php echo  $infos->transectionID; ?>"  readonly />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Entry By</label>
								<input type="text" class="form-control" value="<?php echo  $infos->adminName; ?>"  readonly />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Expense Field Name </label>
								<input type="text" class="form-control" value="<?php echo $infos->expenseFieldName;  ?>"  readonly />
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label> Expense Amount </label>
								<input type="text" class="form-control" value="<?php echo $infos->expenceAmount;   ?>"  readonly />
							</div>
						</div>							
					</div>	
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label> Reference </label>
								<textarea class="form-control" rows="3" readonly><?php echo $infos->expenceReference; ?></textarea>

							</div>
						</div>						
					</div>	
					<div class="row">
						<div class="col-md-12">
							<a type="button" href="<?php echo base_url('admin/incomeExpenseReport'); ?>" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>