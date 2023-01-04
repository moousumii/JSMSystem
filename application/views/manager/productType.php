<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Product Type / Group</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Stock</li>
            <li>Product Type / Group</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading text-right">
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url('manager/addProductType')?>" type="button" class="btn btn-success">Add Product Type</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>NAME</th>
								  <th>NOTE</th>
								  <th>VIEW</th>
								</tr>
							  </thead>
							  <tbody>
							  	<?php foreach ($infos as $info) {?>
								<tr>
								  <td><?php echo $info->productTypeName ?></td>
								  <td><?php echo $info->productTypeNote ?></td>
								  <td><a href="<?php echo base_url("manager/viewProductType/{$info->productTypeID}"); ?>"" type="button" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a></td>
								</tr>
								<?php } ?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>