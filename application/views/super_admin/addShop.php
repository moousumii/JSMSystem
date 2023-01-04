<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add Shop</h3>
		</div>
	</div>
	<?php 
		echo form_open('superAdmin/storeShop');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
	    echo form_hidden('shopAddedDate',$date); 
	    echo form_hidden('shopStatus',1); 
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Shop Name</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'shopTitle', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('shopTitle')]);
									  echo form_error('shopTitle'); ?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Shop Address</label>
								<!--<input class="form-control">-->
								<?php echo form_textarea(['name'=>'shopAddress', 'rows'=>'2','class'=>'form-control', 'required'=>'required', 'value'=>set_value('shopAddress')]);
									  echo form_error('shopAddress'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Add Shop</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>