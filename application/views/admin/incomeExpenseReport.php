<?php include('header.php') ?>
<?php //print_r($infos) ?>
	<div class="row with_print">
		<div class="col-md-12">
			<h3 class="page-header">Income-Expense Report</h3>
		</div>
	</div>
	<div class="row with_print">
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
	<div class="row with_print incomeExpenseReport">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open('admin/incomeExpenseReport'); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Start Date</label>
								<input type="text" size="16" class="form-control span2" id="startDate" name="startDate" placeholder="Start Date" />
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Start Time</label>
								<input id="startTime" type="text" class="form-control" name="startTime" placeholder="Start Time" >
							</div>							
						</div>		
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>End Date</label>
								<input type="text" size="16" class="form-control span2" id="endDate" name="endDate" placeholder="End Date" />
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>End Time</label>
								<input id="endTime" type="text" class="form-control" name="endTime" placeholder="End Time">
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
	<?php if($infos){  ?>	
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
													<input type="text" class="form-control text-left" placeholder="Date & Time" disabled data-toggle="true">
												</th>
												<th>
													<input type="text" class="form-control text-left" placeholder="Shop" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Bill No" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Type" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Amount (Debited)" disabled>
												</th>
												<th>
													<input type="text" class="form-control" placeholder="Amount (Credited)" disabled>
												</th>
												<th class="with_print">
													<input type="text" class="form-control " placeholder="Details" disabled>
												</th>
												
											</tr>
										</thead>
										<tbody>
											<?php foreach($infos as $info): ?>
											<?php $info->transectionDate= date('d,M y h:ia', strtotime($info->transectionDate)); ?>
												<tr id="shop<?php echo $info->transectionID ?>">
													<td><?php echo $info->transectionDate; ?></td>
													<td><?php echo $info->shopTitle; ?></td>
													<td><?php echo $info->transectionReferenceID; ?></td>
													<td><?php 
															if($info->transectionType==1){ echo "Quick Sale"; }
															else if($info->transectionType==2){ echo "Expense"; }
															else if ($info->transectionType==3){ echo "Exchange"; }
														?>
													</td>
													<td><?php if($info->transectionType==2) { echo $info->transectionTotalAmount; } ?></td>
													<td><?php if($info->transectionType==1 || $info->transectionType==3 ) { echo $info->transectionTotalAmount; } ?></td>
													<td class="with_print">
														<a href="<?php echo base_url("admin/transectionDetails/{$info->transectionReferenceID}/{$info->transectionType}"); ?>"  type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
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
		<div align="center with_print">
            <ul class="pagination">
                <?php
					if($amount['flag']==1){
					echo $this->pagination->create_links(); 
				}
				?>
            </ul>
        </div>
		<?php //if($amount){ ?>
		<div class="row with_print">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row m-top-25">
							<div class="col-md-6">
								<div class="form-group">
									<label>Total Income</label>
									<input class="form-control" value="<?php echo $amount['income']; ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Total Expense</label>
									<input class="form-control" value="<?php if($amount['expense']) echo $amount['expense']; else echo "0"; ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Total Return</label>
									<input class="form-control" value="<?php if($amount['return']) echo $amount['return']; else echo "0"; ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Cash Holding</label>
									<input class="form-control" value="<?php echo ($amount['income']+$amount['return'])-($amount['expense']); ?>" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	

<?php include('footer.php') ?>