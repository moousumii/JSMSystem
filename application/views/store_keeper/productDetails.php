<?php include('header.php') ?>
<?php //print_r($sale_infos); ?>

	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Product Details</h3>
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
	<?php 
		echo form_open('storeKeeper/UpdateProduct');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
		$admin_id=$this->session->userdata('admin_id');
	    echo form_hidden('productUpdatedDate',$date);
	    echo form_hidden('productUpdatedBy',$admin_id);
	    echo form_hidden('productID',$infos->productID);
	    
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Barcode</label>
								<input type="text" class="form-control" value="<?php echo $infos->productBarcode ; ?>" readonly>
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" name="productName" class="form-control removeReadonly" value="<?php echo $infos->productName; ?>" readonly>
								<?php echo form_error('productName'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Sell Price</label>
								<input type="text" class="form-control removeReadonly" name="productSalePrice" value="<?php echo $infos->productSalePrice; ?>" readonly>
								<?php echo form_error('productSalePrice'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Purchase Price</label>
								<input type="text" class="form-control removeReadonly" name="productPurchasePrice" value="<?php echo $infos->productPurchasePrice; ?>" readonly>
								<?php echo form_error('productPurchasePrice'); ?>
							</div>
						</div>
					</div>
					<div class="row hidereadonly">
						<div class="col-md-4 ">
							<div class="form-group">
								<label>Group</label>
								<input class="form-control " value="<?php echo $infos->groupName;  ?>" readonly>
							</div>
						</div>
						<div class="col-md-4 ">
							<div class="form-group">
								<label>Supplier</label>
								<input class="form-control" value="<?php echo $infos->supplierCompanyName;  ?>" readonly>
							</div>
						</div>
						
						<div class="col-md-4 ">
							<div class="form-group">
								<label>Status</label>
								<input class="form-control" value="<?php if($infos->productStatus==1)echo "Active"; else echo "InActive";  ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row showreadonly" >
						<div class="col-md-4">
							<div class="form-group">
								<label>Group Name</label>
								<select class="form-control forselect2" name="group_info_productGroupID">
									<option value="<?php echo $infos->group_info_productGroupID;  ?>"  selected><?php echo $infos->groupName;  ?></option>
									<?php foreach($data['groupInfo'] as $group){ ?>
											<option value="<?php echo $group->groupID; ?>"><?php echo $group->groupName; ?> </option>
									<?php } ?>
								</select>
								<?php echo form_error('group_info_productGroupID'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Supplier Name</label>
								<select class="form-control forselect2" name="supplier_info_productSupplierID">
									<option value="<?php echo $infos->supplier_info_productSupplierID;  ?>"  selected><?php echo $infos->supplierCompanyName;  ?></option>
									<?php foreach($data['supplierInfo'] as $supplier){ ?>
											<option value="<?php echo $supplier->supplierID; ?>"><?php echo $supplier->supplierCompanyName; ?> </option>
									<?php } ?>
								</select>
								<?php echo form_error('supplier_info_productSupplierID'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="productStatus">
									<option value="<?php echo $infos->productStatus; ?>" selected><?php if($infos->productStatus==1)echo "Active"; else echo "InActive";  ?></option>
									<option value="1">Active</option>
									<option value="0">InActive</option>
								</select>
								<?php echo form_error('productStatus'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Sold unit</label>
								<input class="form-control" value="<?php echo $infos->productSaleCounter; ?>" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Stock Unit</label>
								<input type="text" class="form-control "  value="<?php echo $infos->productQuantity; ?>" readonly>
								<?php echo form_error('productQuantity'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Total Purchase price of stock units</label>
								<input class="form-control " value="<?php echo $infos->productQuantity*$infos->productPurchasePrice; ?>" readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Total Sell price of stock units</label>
								<input class="form-control " value="<?php echo $infos->productQuantity*$infos->productSalePrice; ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Added Date</label>
								<?php $infos->productAddedDate= date('d,M y h:ia', strtotime($infos->productAddedDate)); ?>
								<input class="form-control" value="<?php echo $infos->productAddedDate; ?>" readonly>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Added By</label>
								<input class="form-control" value="<?php echo $infos->admin_info_productAdminID; ?>" readonly>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Last Updated Date</label>
								<?php $infos->productUpdatedDate= date('d,M y h:ia', strtotime($infos->productUpdatedDate)); ?>
								<input class="form-control" value="<?php echo $infos->productUpdatedDate; ?>" readonly>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Last Updated By</label>
								<input class="form-control" value="<?php echo $infos->productUpdatedBy; ?>" readonly>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12">
							<button type="button"class="btn btn-primary" id="removeReadonlyButton"><i class="fa fa-pencil" ></i> Edit</button>
							<button type="submit" class="btn btn-primary showreadonly" style=""><i class="fa fa-thumbs-up"></i> Save</button>
							<button type="button"class="btn btn-danger showreadonly" id="addReadonlyButton" style=""><i class="fa fa-times" ></i> Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	<?php if($sale_infos){ ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Sale Info</h1>
				</div>
				
				<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-condensed table-bordered">
									<thead>
										<tr class="info">
											<th>Barcode</th>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Total Price</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($sale_infos as $info):  //print_r($info);?>
										<?php $info->saleDate= date('d,M y h:ia', strtotime($info->saleDate)); ?>
											<tr id="shop<?php echo $info->saleDetailsID ?>" class="active">
												<td><?php echo $info->productBarcode; ?></td>
												<td><?php echo $info->productName; ?></td>
												<td><?php echo $info->saleProductQuantity;//$info->saleProductQuantityTotal; ?></td>
												<td><?php echo $info->salePrice; ?></td>
												<td><?php echo ($info->salePrice*$info->saleProductQuantity); ?></td>
												<td><?php echo $info->saleDate; ?></td>
												
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
<?php include('footer.php') ?>