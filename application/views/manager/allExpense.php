<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">All Expense</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li>All Expense</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading text-right">
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url('manager/addExpense');?>" type="button" class="btn btn-success">Add Expense</a>
							<a href="<?php echo base_url('manager/cashInOut');?>" type="button" class="btn btn-success">Add Cash In-Out</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php echo form_open('manager/allExpense')?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Date From</label>
									<input type="text" class="form-control" id="startDate" name="firstDate">
								</div>
								<div class="col-md-6 form-group">
									<label>Date To</label>
									<input type="text" class="form-control" id="endDate" name="lastDate">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-left">
								<button type="submit" class="btn btn-success">Search</button>
							</div>
						</div>
					</div>
					<?php echo form_close()?>
					
					<hr>
					<?php $totalExpense=0; ?>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>Date & Time</th>
								  <th>Expense Field</th>
								  <th>Amount</th>
								  <th>View</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php if($expenses){
							  	foreach ($expenses as $expense) {?>
								<tr>
								  <td><?php  
										$date = $expense->expenseDate ;
										$addedDate = date("d-m-Y", strtotime($date));
										echo $addedDate;
									?></td>
								  <td><?php echo $expense->expenseFieldName ?></td>
								  <td><?php echo $expense->expenseAmount ?></td>
								  <td>
								  	<a href="<?php echo base_url("manager/viewExpense/{$expense->expenseID}"); ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
								  </td>
								</tr>
								<?php $totalExpense=$totalExpense+$expense->expenseAmount; }
								} 
								else{ ?>
									<tr>
										<td>
											<?php echo "There is no data! "; ?>
										</td>
									</tr>
								<?php } ?>
							  </tbody>
							</table>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label>Total Expense</label>
							    <input type="text" class="form-control" name="" value="<?php echo $totalExpense; ?>" disabled>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	
<?php include('footer.php') ?>