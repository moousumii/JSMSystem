<?php include('header.php') ?>
<?php //print_r($infos); ?>
	<div class="row with_print">
		<div class="col-md-12">
			<h3 class="page-header">Salesmem Performance Report</h3>
		</div>
	</div>
	
	<?php echo form_open('admin/salesmanPerformaneceReport'); ?>
	<div class="row with_print salesmanPerformaneceReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" value=" " name="salemanStartDate" placeholder="Start Date" />
							</div>							
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Date</label>
								<input type="text" size="16" class="form-control span2" id="endDate" value=" " name="salemanEndDate" placeholder="End Date" />
							</div>							
						</div>	
						<div class="col-md-4">
						  <div class="form-group">
							<label>Sold By</label>
							<select class="form-control forselect2 addProductID" id="select2" name="salesman_info_salesmanID" >
								<option value="" selected >Salesman Name</option>
								<!--<option value="0" >Not Selected</option>-->
								<?php foreach($salesmanInfo as $salesmanInfo){ ?>
									<option value="<?php echo $salesmanInfo->salesmanID; ?>"><?php echo $salesmanInfo->salesmanName; ?></option>
								<?php } ?>
							</select>
						  </div>
					   </div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Go</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	<?php if($infos){  $TotalSaleCommision=0; $totalSales=0; ?>
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
							<table class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr class="filters">											
												<th>
													<input type="text" class="form-control text-left" placeholder="Date " disabled data-toggle="true">
												</th>
												<th>
													<input type="text" class="form-control text-left" placeholder="Shop " disabled data-toggle="true">
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Salesman" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Bill No" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Total Sell" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Commission" disabled>
												</th>
												<th class="with_print">
													<span>Details</span>
												</th>
												
											</tr>
								</thead>
								<tbody>
									<?php foreach($infos as $info):  //print_r($info);?>
									<?php $info->saleDate= date('d,M y h:ia', strtotime($info->saleDate)); ?>
									<tr id="productGroup<?php echo $info->saleID ?>" class="active">
										<td>
											<?php echo $info->saleDate; ?>
										</td>
										<td>
											<?php echo $info->shopTitle; ?>
										</td>
										<td>
											<?php echo $info->salesmanName; ?>
										</td>
										<td>
											<?php echo $info->saleID; ?>
										</td>
										<td>
											<?php echo $info->saleTotalAmount; ?>
										</td>
										<td>
											<?php echo $info->salesmanTotalCommission; ?>
										</td>
										<td class="with_print">
											<a href="<?php echo base_url("admin/saleDetails/{$info->saleID}/{$info->salesman_info_salesmanID}"); ?>"  type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
										</td>
									</tr>
									<?php $TotalSaleCommision=$TotalSaleCommision+$info->salesmanTotalCommission; $totalSales++; ?>
									<?php endforeach; ?>
									<!--<tr>
										<td>12-01-2017</td>
										<td>Keshob</td>
										<td>Keshob</td>
										<td>5246574115645</td>
										<td>Slippers</td>
										<td>10</td>
										<td>$320</td>
										<td>$10</td>
									</tr>-->
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
	<div class="row with_print">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row m-top-25">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Sales</label>
								<input class="form-control" value="<?php echo $totalSales;  ?>" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Commision</label>
								<input class="form-control" value="<?php echo $TotalSaleCommision; ?> " readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<?php include('footer.php') ?>