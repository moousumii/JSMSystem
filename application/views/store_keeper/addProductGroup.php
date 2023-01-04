<?php include('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Add New Product Group</h3>
		</div>
	</div>
	<?php echo form_open('storeKeeper/storeProductGroup');
		  $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		  $date= $dt->format('Y-m-d H:i:s');
	      echo form_hidden('groupaddedDate',$date); 
	      echo form_hidden('groupStatus',1); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Group Name</label>
								<!--<input class="form-control">-->
								<?php echo form_input(['name'=>'groupName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('groupName')]);
									  echo form_error('groupName'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Add Group</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php include('footer.php') ?>