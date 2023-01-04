<?php include('header.php') ?>
<?php// print_r($infos); ?>
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">All Store Keeper</h3>
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
								<a href="<?php echo base_url('admin/addStoreKeeper'); ?>" style="margin-top:0px;margin-right:5px;" type="button" class="btn btn-primary">Add New StoreKeeper</a>
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
															<input type="text" class="form-control text-left" placeholder="ID" disabled data-toggle="true">
														</th>
														<th>
															<input type="text" class="form-control" placeholder="Name" disabled>
														</th>
														<th>
															<input type="text" class="form-control" placeholder="Join Date" disabled>
														</th>
														<th>
															<input type="text" class="form-control" placeholder="Status" disabled>
														</th>
														<th>
															<input type="text" class="form-control" placeholder="Action" disabled>
														</th>
														
													</tr>
											</thead>
								<tbody>
								   <?php foreach($infos as $info):  //print_r($info);?>
										<?php $info->adminJoinDate= date('d,M y h:ia', strtotime($info->adminJoinDate)); ?>
										<tr id="shop<?php echo $info->adminID ?>">
											<td><?php echo $info->adminUserID; ?></td>
											<td><?php echo $info->adminName; ?></td>
											<td><?php echo $info->adminJoinDate; ?></td>
											<td><?php if($info->adminStatus==1) echo "Active";else echo "InActive"; ?></td>
											<td>
												<a href="<?php echo base_url("admin/detailsStoreKeeper/{$info->adminID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></a>
												<a href="<?php echo base_url("admin/editStoreKeeper/{$info->adminID}"); ?>" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>	
												
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