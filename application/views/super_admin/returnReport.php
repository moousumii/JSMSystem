<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Return Report</h3>
		</div>
	</div>
	<div class="row returnReport">
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
					<div class="row m-top-15">
		<div class="col-md-12">
			<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Shop</th>
                <th>Bill No</th>
                <th>Barcode</th>
                <th>Product Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>02964</td>
                <td>Tiger Nixon</td>
                <td>Edinburgh</td>
                <td>Edinburgh</td>
                <td>Edinburgh</td>
                <td>Edinburgh</td>
            </tr>
        </tbody>
    </table>
		</div>
	</div>
				</div>
			</div>
		</div>
	</div>
	
	

<?php include('footer.php') ?>