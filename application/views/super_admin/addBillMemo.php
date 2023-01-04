<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Bill / Memo</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label>Bill No</label>
                <input class="form-control" readonly>
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label>Date</label>
                <input class="form-control" readonly>
            </div>
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
		<div class="col-md-3">
			<div class="form-group">
                <label>Barcode</label>
                <input class="form-control">
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
                <label>Quantity</label>
                <input class="form-control">
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
                <label>Price</label>
                <input class="form-control" readonly>
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
                <label>Current Stock</label>
                <input class="form-control" readonly>
            </div>
		</div>
	</div>	
	<div class="row m-top-25 m-bottom-25">
		<div class="col-md-12">
			<table class="table table-condensed table-bordered">
				<thead>
					<tr class="info">
						<th>Barcode</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
					<tr class="active">
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>Edinburgh</td>
						<td>61</td>
						<td>$320,800</td>
					</tr>
					<tr class="active">
						<td>Garrett Winters</td>
						<td>Accountant</td>
						<td>Tokyo</td>
						<td>63</td>
						<td>$170,750</td>
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
					<div class="row">
		<div class="col-md-4">
			<div class="form-group">
                <label>Total Quantity</label>
                <input class="form-control" readonly>
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
                <label>Sold By</label>
                <select class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
                <label>Commission</label>
                <input class="form-control">
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label>Gross Amount</label>
                <input class="form-control" readonly>
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label>Discount</label>
                <input class="form-control" >
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label>VAT</label>
                <input class="form-control" readonly>
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label>Net Payable</label>
                <input class="form-control" readonly>
            </div>
		</div>
	</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Done</button>
		</div>
	</div>
	
	
<?php include('footer.php') ?>