<?php include('header.php') ?>
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">View Product</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php if($this->session->flashdata('feedback_successfull'))
					{ ?>
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="fa fa-times"></i></span>
								</button>
							<strong>Success!</strong>
							<?php echo $this->session->flashdata('feedback_successfull'); ?>
						</div>
					<?php } 
					if($this->session->flashdata('feedback_failed'))
						{ ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fa fa-times"></i></span>
									</button>
								<strong>Oops!</strong>
								<?php echo $this->session->flashdata('feedback_failed'); ?>
							</div>
			<?php   } ?>
		</div>
	</div>
	<?php if($infos){ ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default filterable">
				<div class="panel-heading">
                    <div class="row">
						<div class="col-md-12 col-xs-12" style="margin-top:20px;">
							<div class="pull-right">
								<button id="filter_button" class="btn btn-primary btn-filter" style="color:#fff;"><i class="fa fa-filter"></i> Filter
								</button>
							</div>
						</div>
                    </div>
                </div>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<table id="showInventorytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr class="filtersField">											
											<th>
												<input type="text" class="form-control" placeholder="Barcode" disabled data-toggle="true" id="filterbarCode">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Product" disabled id="filterproductName">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Group" disabled id="filterproductGroup">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Sold Unit" disabled id="filtersoldUnit">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Stock Unit" disabled id="filterstockUnit">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Supplier" disabled id="filtersupplierName">
											</th>										
											<th>
												<input type="text" class="form-control" placeholder="Added Date" disabled>
												<!--<span class="form-control">Added Date</span>-->
											</th>										
											<th>
												<span >Details</span>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($infos as $info):  //print_r($info);?>
											<?php //$info->productAddedDate= date('d,M y h:ia', strtotime($info->productAddedDate)); ?>
											<tr id="shop<?php echo $info->productID ?>" class="remove_tr">
												<td><?php echo $info->productBarcode; ?></td>
												<td><?php echo $info->productName; ?></td>
												<td><?php echo $info->groupName; ?></td>
												<td><?php echo $info->productSaleCounter; ?></td>
												<td><?php echo $info->productQuantity; ?></td>
												<td><?php echo $info->supplierCompanyName; ?></td>
												<td><?php echo $info->productAddedDate; ?></td>
												<td>
													<a href="<?php echo base_url("storeKeeper/productDetails/{$info->productID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div align="center">
        <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
        </ul>
    </div>
	<?php } ?>
	

<?php include('footer.php') ?>