<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">All Client</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Accounts</li>
            <li>All Client</li>
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
							<a href="<?php echo base_url('manager/addNewClient');?>" type="button" class="btn btn-success">Add New Client</a>
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
									<th>
										<input type="text" class="form-control" placeholder="ID" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="NAME" disabled id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="PHONE NUMBER" disabled id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="DUE / BALANCE" disabled id="">
									</th>
									<th>
										<span >VIEW</span>
									</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php foreach ($infos as $info) {?>
								<tr>
								  <td><?php echo $info->clientID ?></td>
								  <td><?php echo $info->clientContactName ?></td>
								  <td><?php echo $info->clientContactNumber ?></td>
								  <td><?php echo $info->clientBalance ?></td>
								  <td>
								  	<a href="<?php echo base_url("manager/viewClient/{$info->clientID}"); ?>"" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
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