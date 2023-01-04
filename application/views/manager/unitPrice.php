<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Unit Price</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-md-12">
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('manager/');?>">Dash Board</a> </li>
            <li>Admin</li>
            <li>Unit Price</li>
         </ol>
      </div>
	</div>

	<?php include('messages.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
							  <!-- <caption class="text-center"><h3 style="margin-top: 0px;">Debit (Receipts)</h3></caption> -->
							  <thead>
								<tr>
								  <th>QUALITY</th>
								  <th>PRICE PER GRAM</th>
								</tr>
							  </thead>
							  <tbody>

							  	<?php foreach ($values as $value) {
							  		echo form_open('manager/unitPrice', 'class="unitPrice-form"');
							  		echo form_hidden('qualityId', $value->qualityId); ?>
							  		<tr>
									  <td><?php echo $value->quality ?></td>
									  <td>
									  	<?php echo form_input(['name'=>'qualityPrice', 'class'=>'form-control','value'=>set_value('qualityPrice').$value->qualityPrice]); ?>
									  </td>
									  <td><button type="submit" class="btn btn-success">Update Price</button></td>
									</tr>

									<?php echo form_close() ?>

							  	<?php } ?>

							  </tbody>
							</table>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">Update Price</button>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>