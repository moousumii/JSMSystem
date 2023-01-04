<?php include ('header.php');?>
	
	<div class="row m-top-25">
		<div class="container">			
			<div class="row">
				<div class="">
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url('root_admin/'); ?>">Home</a>
						</li>
						<li class="active">
							<strong>Add User</strong>
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('feedback_successfull'))
						{ ?>
					<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						<strong>Success!</strong>
						<?php echo $this->session->flashdata('feedback_successfull'); ?>
					</div>
					<?php } 
						
						if($this->session->flashdata('feedback_failed'))
						{ ?>
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						<strong>Oops!</strong>
						<?php echo $this->session->flashdata('feedback_failed'); ?>
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					
					<?php $attributes = array('class' => 'abcd', 'id' => ''); ?>
					<?php echo form_open('root_admin/store_user', $attributes);
					$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
					$date= $dt->format('Y-m-d h:i:s');
					//echo $date;
					echo form_hidden('join_date',$date); 
					
					?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 card mainCard">
					<div action="">
						<div class="row">
							<div class="col-md-12">
								<h5 class="section-title st-mdb">
									Add User
								</h5>
							</div>
						</div>
						<hr /><br />
						<div class="row">
							<div class="col-md-12">
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<?php echo form_input(['name'=>'name', 'class'=>'form-control', 'value'=>set_value('name')]);
									echo form_error('name'); ?>
									<label for="form2">Full Name</label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<?php echo form_input(['name'=>'email', 'class'=>'form-control', 'value'=>set_value('email')]);
									echo form_error('email');  ?>
									<label for="form2">Email Address</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form">
									<i class="fa fa-phone prefix"></i>
									<?php echo form_input(['name'=>'contact', 'class'=>'form-control', 'value'=>set_value('contact')]);
									echo form_error('contact'); ?>
									<label for="form2">Contact Number</label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="md-form">
									<i class="fa fa-key prefix"></i>
									<?php echo form_password(['name'=>'password', 'class'=>'form-control', 'value'=>set_value('password')]);
									echo form_error('password'); ?>
									<label for="form2">Password</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form">
									<i class="fa fa-key prefix"></i>
									<?php echo form_password(['name'=>'confirm_password', 'class'=>'form-control','value'=>set_value('confirm_password')]);
									echo form_error('confirm_password'); ?>
									<label for="form2"> Confirm Password</label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-11 col-md-offset-1" style="margin-top:20px;">
								<select class="mdb-select" name="admin_role_role_id">
									<?php foreach($roles as $role){ ?>
										<option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('admin_role_role_id'); ?>
								<label>Post</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-11 col-md-offset-1" style="margin-top:20px;">
								<button  type="submit" class="btn btn-default" value="Add" name="add">Add</button>
								<button  type="submit" class="btn btn-danger" value="Reset" name="reset">Reset</button>
									<?php //echo form_submit(['name'=>'add', 'value'=>'Add', 'type'=>'submit', 'class'=>'btn btn-default']) ;
									//echo form_reset(['name'=>'reset', 'value'=>'Reset', 'type'=>'submit', 'class'=>'btn btn-danger']);
									echo form_close(); ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include ('footer.php');?>