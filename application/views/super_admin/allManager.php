<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">All Manager</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
		<div class="col-md-12">
			<a href="<?php echo base_url('super_admin/addManager'); ?>" target="_blank" type="button" class="btn btn-primary pull-right">Add New Manager</a>
		</div>
	</div>
	
	<div class="row m-top-15">
		<div class="col-md-12">
			<table id="showInventory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Shop</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>02964</td>
                <td>Tiger Nixon</td>
                <td>Edinburgh</td>
                <td>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-info"></i></button>
					<button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
				</td>
            </tr>
        </tbody>
    </table>
		</div>
	</div>
				</div>
			</div>
		</div>
	</div>
	
	

<?php include('footer.php') ?>