<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Income-Expense Report</h3>
		</div>
	</div>
	<div class="row incomeExpenseReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="row m-top-15">
						<div class="col-md-6">
							<label>Start Date</label>
							<input type="text" size="16" class="form-control span2" id="startDate" placeholder="12-02-2012" />
						</div>
						<div class="col-md-6">
							<label>End Date</label>
							<input type="text" size="16" class="form-control span2" id="endDate" placeholder="12-02-2012" />
						</div>						
					</div>
					<div class="row m-top-15">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Confirm</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
					
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="row m-top-15">
						<div class="col-md-12">
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Contact Person</th>
										<th>Address</th>
										<th>Contact Number</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>02964</td>
										<td>Tiger Nixon</td>
										<td>Edinburgh</td>
										<td>Edinburgh</td>
										<td>Edinburgh</td>
										<td>
											<button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></button>
											<button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
											<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row m-top-25">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Income</label>
								<input class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Expense</label>
								<input class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Return</label>
								<input class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Cash Holding</label>
								<input class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

<?php include('footer.php') ?>