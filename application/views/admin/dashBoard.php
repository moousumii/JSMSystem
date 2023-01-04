<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Dash Board</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">								
				<!--<a href="<?php //echo base_url("admin/refreshData"); ?>" class="btn btn-danger" style="color:#fff;"> ReFresh</a>-->
				<!--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#refreshModal">
					ReFresh
				</button>-->
			</div>			
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
					<?php if($infos){  ?>
					<div class="row m-top-15">
						<div class="col-md-12">
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr class="filters">											
											<th>
												<input type="text" class="form-control text-left" placeholder="Shop ID" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Shop Name" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Total Cash Amount" disabled>
											</th>
											
										</tr>
								</thead>
								<tbody>
								   <?php foreach($infos as $info):  //print_r($info);?>
										<tr id="shop<?php echo $info->shopID ?>">
											<td><?php echo $info->shopID; ?></td>
											<td><?php echo $info->shopTitle; ?></td>
											<td><?php echo $info->cash_amount; ?></td>
											
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
					<?php } ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default filterable">
				<div class="panel-body">
					<div class="row m-top-15">
						<div class="col-md-12">
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr class="filters">											
											<th>
												<input type="text" class="form-control text-left" placeholder="Stock Quantity" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control text-left" placeholder="Stock Value" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control text-left" placeholder="Sale Value" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Sold Quantity" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Sold Value" disabled>
											</th>
										</tr>
								</thead>
								<tbody>
										<tr>
											<td><?php echo $data['stockvalue']->qty; ?> </td>
											<td>TK. <?php echo $data['stockvalue']->stockvalue; ?></td>
											<td>TK. <?php echo $data['stockvalue']->salevalue; ?></td>
											<td><?php echo $data['salevalue']->qty; ?> </td>
											<td>Tk. <?php echo $data['salevalue']->salevalue; ?></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('refreshModal.php') ?>
<?php include('footer.php') ?>