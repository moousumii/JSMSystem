<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Sale Report</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Report</li>
            <li>Sale Report</li>
         </ol>
      </div>
	</div>
<?php include('messages.php') ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<?php echo form_open('manager/saleReport', 'class="saleReport-form"')?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<!--Date Picker-->
									<input type="text" id="startDate" class="form-control" name="firstDate" value="<?php if($inputs['firstDate']) echo date('m-d-Y',strtotime($inputs['firstDate'])) ?>" >
									<!--Date Picker-->
								</div>
								<div class="col-md-6 form-group">
									<label>To Date</label>
									<!--Date Picker-->
									<input type="text" id="endDate" class="form-control" name="lastDate" value="<?php if($inputs['lastDate']) echo date('m-d-Y',strtotime($inputs['lastDate'])) ?>">
									<!--Date Picker-->
								</div>
								<!-- <div class="col-md-4 form-group">
								    <label>Product Group</label>
								    <select class="form-control forselect2" name="client_info_supplierId" value="" required>
								    	<option selected disabled="">Select Product Group</option>
								    	<option>Select-1</option>
								    	<option>Select-2</option>
								    	<option>Select-3</option>
								    	<option>Select-4</option>
								    	<option>Select-5</option>
									</select>
								</div> -->
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info filterable">
				<div class="panel-heading text-right">
					<div class="row">
						<div class="col-md-12">
							<button id="filter_button" class="btn btn-success btn-filter with_print" ><i class="fa fa-filter"></i> Filter</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php $totalPrice=0; ?>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <thead>
								<tr class="active filters">
									<th>
										<input type="text" class="form-control" placeholder="SALE ID" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="DATE" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="CLIENT" disabled data-toggle="true" id="">
									</th>
									<th>
										<input type="text" class="form-control" placeholder="TOTAL AMOUNT" disabled data-toggle="true" id="">
									</th>
									<th>
										<span>VIEW</span>
									</th>
								</tr>
							  </thead>
							 <?php if($infos){ ?>
								<tbody>
									<?php foreach ($infos as $info) {?>
									<tr>
										<td><?php echo $info->saleID ?></td>
										<td><?php echo $info->saleDate ?></td>
										<td><?php echo $info->clientContactName ?></td>
										<td><?php echo $info->saleTotalAmount-$info->previousDue ?></td>
										<td><a href="<?= base_url("manager/viewInvoice/{$info->saleID}")?>" class="btn btn-success btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i></a></td>
									</tr>
									<?php $totalPrice=$totalPrice+($info->saleTotalAmount-$info->previousDue); }?> 
								</tbody>
								<?php } else echo "No Data Found!"; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<!-- <div class="col-md-4">
									<div class="form-group">
									    <label>Total Product</label>
									    <input type="text" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label>Total Weight</label>
									    <input type="text" class="form-control"/>
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="form-group">
									    <label>Total Price</label>
									    <input type="text" class="form-control" name="" value="<?php echo $totalPrice; ?>" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>