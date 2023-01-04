<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Product Sale Report</h3>
		</div>
	</div>
	
	<div class="row productSaleReport">
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
							<table class="table table-condensed table-bordered">
								<thead>
									<tr class="info">
										<th>Product Barcode</th>
										<th>Product Name</th>
										<th colspan="3" style="text-align:center;">Quantity Sold</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th colspan="2"></th>
										<th class="info">Shop 1</th>
										<th class="info">Shop 2</th>
										<th class="info">Shop 3</th>
									</tr>
									<tr class="active">
										<td>Tiger Nixon</td>
										<td>61</td>
										<td>$320,800</td>
										<td>$320,800</td>
										<td>$320,800</td>
									</tr>
									<tr class="active">
										<td>Garrett Winters</td>
										<td>63</td>
										<td>$170,750</td>
										<td>$170,750</td>
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
	
<?php include('footer.php') ?>