<?php include('header.php') ?>
<?php //print_r($infos); ?>
	<div class="row with_print">
		<div class="col-md-12">
			<h3 class="page-header">Product Sale Report</h3>
		</div>
	</div>
	<div class="row with_print productSaleReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open('admin/productSaleReport'); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" name="saleStartDate" placeholder="Start Date" />
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="endDate" name="saleEndDate" placeholder="End Date" />
							</div>							
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Confirm</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
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
								<button class="btn btn-warning with_print" name="print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
								<button id="filter_button" class="btn btn-primary btn-filter with_print" style="color:#fff;"><i class="fa fa-filter"></i> Filter
								</button>
							</div>
						</div>
                    </div>
                </div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
						
							<table class="table table-condensed table-bordered">
								<thead>
									<tr class="filters">											
												<th>
													<input type="text" class="form-control text-left" placeholder="Product Barcode" disabled data-toggle="true">
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Product Name" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Quantity" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Shop" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Date" disabled>
												</th>
												
											</tr>
								</thead>
								<tbody>
									<?php foreach($infos as $info):  //print_r($info);?>
										<?php $info->saleDate= date('d,M y h:ia', strtotime($info->saleDate)); ?>
										<tr id="shop<?php echo $info->saleDetailsID ?>" class="active">
											<td><?php echo $info->productBarcode; ?></td>
											<td><?php echo $info->productName; ?></td>
											<td><?php echo $info->saleProductQuantity;//$info->saleProductQuantityTotal; ?></td>
											<td><?php echo $info->shopTitle; ?></td>
											<td><?php echo $info->saleDate; ?></td>
											<!--<td>
												<a href="<?php// echo base_url("manager/productDetails/{$info->saleDetailsID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
											</td>-->
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
	<?php } ?>
	<div class="text-center with_print">
        <ul class="pagination">
        <?php
			if($flag['flag']==1){
				echo $this->pagination->create_links(); 
			}
		?>
        </ul>
    </div>
	
<?php include('footer.php') ?>