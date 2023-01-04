<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Product</h3>
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
											<th>Barcode</th>
											<th>Product Name</th>
											<th>Group</th>
											<th>Sold Unit</th>
											<th>Stock Unit</th>
											<th>Supplier</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Tiger Nixon</td>
											<td>System Architect</td>
											<td>Edinburgh</td>
											<td>61</td>
											<td>2011/04/25</td>
											<td>$320,800</td>
											<td>
												<a href="<?php echo base_url('super_admin/productDetails'); ?>" target="_blank" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
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

	

<?php include('footer.php') ?>