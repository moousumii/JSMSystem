<?php include('header.php') ?>
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">All Supplier</h3>
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
								<a href="<?php echo base_url('storekeeper/addSupplier'); ?>" style="margin-top:0px;margin-right:5px;" type="button" class="btn btn-primary">Add New Supplier</a>
								<button id="filter_button" class="btn btn-primary btn-filter" style="color:#fff;"><i class="fa fa-filter"></i> Filter
								</button>
							</div>
						</div>
                    </div>
                </div>
				<div class="panel-body">
					<?php if($infos){ ?>
					<div class="row m-top-15">
						<div class="col-md-12">
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									
									<tr class="filters">											
											<th>
												<input type="text" class="form-control text-left" placeholder="ID" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Name" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Contact Person" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Address" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Contact Number" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Action" disabled>
											</th>
											
										</tr>
								</thead>
								<tbody>
								   <?php foreach($infos as $info):  //print_r($info);?>
										<?php //$info->supplierAddedDate= date('d,M y h:ia', strtotime($info->supplierAddedDate)); ?>
										<tr id="shop<?php echo $info->supplierID ?>">
											<td><?php echo $info->supplierID; ?></td>
											<td><?php echo $info->supplierCompanyName; ?></td>
											<td><?php echo $info->supplierContactName; ?></td>
											<td><?php echo $info->supplierContact; ?></td>
											<td><?php echo $info->supplierAddress; ?></td>
											<td>
												<a href="<?php echo base_url("storekeeper/detailsSupplier/{$info->supplierID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
												<a href="<?php echo base_url("storekeeper/editSupplier/{$info->supplierID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
												<!--<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>-->
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	

<?php include('footer.php') ?>