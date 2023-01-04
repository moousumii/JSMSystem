<?php include('header.php') ?>
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Adjust Stock</h3>
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
							<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr class="filters">											
											<th>
												<input type="text" class="form-control text-left" placeholder="Barcode" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Product Name" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Group" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Sold Unit" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Stock Unit" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Supplier" disabled>
											</th>
											<th>
												<input type="text" class="form-control" placeholder="Action" disabled>
											</th>											
										</tr>
								</thead>
								<tbody>
									<?php foreach($infos as $info):  //print_r($info);?>
									<?php //$info->supplierAddedDate= date('d,M y h:ia', strtotime($info->supplierAddedDate)); ?>
										<tr id="product<?php echo $info->productID ?>">
											<td id="barcode<?php echo $info->productID ?>" ><?php echo $info->productBarcode; ?></td>
											<td id="name<?php echo $info->productID ?>" ><?php echo $info->productName; ?></td>
											<td id="group<?php echo $info->productID ?>" ><?php echo $info->groupName; ?></td>
											<td id="counter<?php echo $info->productID ?>" ><?php echo $info->productSaleCounter; ?></td>
											<td id="quantity<?php echo $info->productID ?>" ><input type="number" class="form-control" id="removeReadonly<?php echo $info->productID ?>" value="<?php echo $info->productQuantity; ?>" readonly></td>
											<td id="company<?php echo $info->productID ?>" ><?php echo $info->supplierCompanyName; ?></td>
											<td id="action<?php echo $info->productID ?>" >
												<button type="button" id="edit_button<?php echo $info->productID  ?>" class="btn btn-sm btn-primary" onclick="edit_row('<?php echo $info->productID  ?>')" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
												<button type="button" id="save_button<?php echo $info->productID  ?>"  class="btn btn-sm btn-primary saveButton" onclick="save_row('<?php echo $info->productID  ?>')">Save</button>
												<!--<button type="button" id="cancle_button<?php //echo $info->productID  ?>"  class="btn btn-sm btn-danger cancleButton" onclick="cancle('<?php //echo $info->productID  ?>','<?php //echo $info->productQuantity ?>')">Cancel</button>-->
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