<?php include('header.php') ?>
<?php //print_r($infos); ?>
	<div class="row with_print">
		<div class="col-md-12">
			<h3 class="page-header">Return Report</h3>
		</div>
	</div>
	<?php echo form_open('admin/returnReport'); ?>
	<div class="row with_print returnReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" name="returnStartDate" placeholder="Start Date" />
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="endDate" name="returnEndDate" placeholder="End Date" />
							</div>							
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
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
					<div class="row ">
						<div class="col-md-12">
							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr class="filters">											
												<th>
													<input type="text" class="form-control text-left" placeholder="Date & Time" disabled data-toggle="true">
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Shop" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Bill No" disabled>
												</th>
												<!--<th>
													<input type="text" class="form-control" placeholder="Product Name" disabled>
												</th>-->
												<th>
													<input type="text" class="form-control" placeholder="Total Return Quantity" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Total Return Price" disabled>
												</th>
												<th class="with_print">
													<span>Details</span>
												</th>
												
											</tr>
								</thead>
								<tbody>
									<?php foreach($infos as $info):  //print_r($info);?>
									<?php $info->returnDate= date('d,M y h:ia', strtotime($info->returnDate)); ?>
									<tr id="productGroup<?php echo $info->exchangeID ?>" class="active">
										<td>
											<?php echo $info->returnDate; ?>
										</td>
										<td>
											<?php echo $info->shopTitle; ?>
										</td>
										<td>
											<?php echo $info->sale_info_saleID; ?>
										</td>
										<!--<td>
											<?php echo $info->productName; ?>
										</td>-->
										<td>
											<?php echo $info->returnProductQuantity; ?>
										</td>
										<td>
											<?php echo $info->returnProductPrice; ?>
										</td>
										<?php if($info->returnProductPrice>0){ ?>
										<td class="with_print">
											<a href="<?php echo base_url("admin/oldReturnReportDetails/{$info->exchangeID}"); ?>"  type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
										</td>
										<?php } else { ?>
										<td class="with_print">
											<a href="<?php echo base_url("admin/returnReportDetails/{$info->exchangeID}"); ?>"  type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
										</td>
										<?php } ?>
										<!--<td class="with_print">
											<a href="<?php echo base_url("admin/returnReportDetails/{$info->exchangeID}"); ?>"  type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
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
	<div class="text-center with_print">
        <ul class="pagination">
        <?php
			if($flag['flag']==1){
				echo $this->pagination->create_links(); 
			}
		?>
        </ul>
    </div>
	<?php } ?>

<?php include('footer.php') ?>