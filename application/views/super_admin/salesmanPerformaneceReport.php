<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Salesmem Performance Report</h3>
		</div>
	</div>
	<div class="row salesmanPerformaneceReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Start Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" placeholder="12-02-2012" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>End Date</label>
								<input type="text" size="16" class="form-control span2" id="endDate" placeholder="12-02-2012" />
							</div>
						</div>		
					</div>
					<div class="row">
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
					<div class="row">
		<div class="col-md-12">
			<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Date</th>
						<th>Salesman</th>
						<th>Shop</th>
						<th>Bill no</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Total Sell</th>
						<th>Commission</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>12-01-2017</td>
						<td>Keshob</td>
						<td>Badeshshor</td>
						<td>5246574115645</td>
						<td>Slippers</td>
						<td>10</td>
						<td>$320</td>
						<td>$10</td>
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
					<div class="row m-top-15">
		<div class="col-md-6">
			<div class="form-group">
                <label>Total Unit Sold</label>
                <input class="form-control" value="500" readonly>
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label>Total Commision</label>
                <input class="form-control" value="2000" readonly>
            </div>
		</div>
	</div
				</div>
			</div>
		</div>
	</div>
	>

<?php include('footer.php') ?>