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
			<div class="panel panel-info filterable">
				<div class="panel-heading text-right">
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url('manager/addExpenseField');?>" type="button" class="btn btn-success">Add Expense Field</a>
							<button id="filter_button" class="btn btn-success btn-filter with_print" ><i class="fa fa-filter"></i> Filter
							</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr class="filters">
								  <th><input type="text" class="form-control" placeholder="Expense Field ID" disabled data-toggle="true" id=""></th>
								  <th><input type="text" class="form-control" placeholder="Expense Field Name" disabled data-toggle="true" id=""></th>
								  <th><input type="text" class="form-control" placeholder="Expense Field Status" disabled data-toggle="true" id=""></th>
								  <th>View</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php foreach ($infos as $info) {?>
								<tr>
								  <td><?php echo $info->expenseFieldID ?></td>
								  <td><?php echo $info->expenseFieldName ?></td>
								  <td><?php if($info->expenseFieldStatus==1){
								  			echo 'Active';
								  		}
								  		else echo"Inactive";  ?></td>
								  <td>
								  	<a href="<?php echo base_url("manager/viewExpenseField/{$info->expenseFieldID}"); ?>"" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
								  </td>
								</tr>
								<?php } ?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	
<?php include('footer.php') ?>