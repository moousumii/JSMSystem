<?php include('header.php'); ?>
			<div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url('root_admin/'); ?>">Home</a>
                        </li>
                        <li class="active">
                            <strong>Edit Profile</strong>
                        </li>
                    </ol>
                    <div class="divider-new">
						<h4 class="h4-responsive">Edit Profile</h4>
					</div>

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
		

			

	
	<div class="">
		<div class="row">
			<?php
				echo form_open("root_admin/update_user/{$data->admin_id}"); 
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$date= $dt->format('Y-m-d h:i:s');
				//echo $date;
				echo form_hidden('update_date',$date);
			?>
			<div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
				<div class="row">
					<div class="col-md-12">
						<div class="md-form">
							<?php 
							echo form_input(['name'=>'name','placeholder'=>'Full Name', 'class'=>'form-control', 'value'=>set_value('name',$data->name)]);
							echo form_error('name');?>
							<label>Full Name</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="md-form">
							<?php echo form_input(['name'=>'contact','placeholder'=>'Contact Number',  'class'=>'form-control', 'value'=>set_value('contact',$data->contact)]);
							echo form_error('contact'); ?>
							<label>Contact Number</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="md-form">
							<?php echo form_input(['name'=>'email','placeholder'=>'Email Address', 'class'=>'form-control', 'value'=>set_value('email',$data->email)]);
							echo form_error('email');  ?>
							<label>Email Address</label>
						</div>
					</div>
					
					
					<div class="col-md-6" style="margin-top:20px;">		
						<select class="mdb-select" name="admin_role_role_id" value="<?php //echo $data->role_name; ?>">
							<option value="<?php echo $data->role_id; ?>"><?php echo $data->role_name; ?></option>
							<option value="2">Supper Admin</option>
							<option value="3">Manager</option>
							<option value="4">Sales Counter</option>
						</select>
						<label>Designation</label>
					</div>
					
					<div class="col-md-6" style="margin-top:20px;">		
						<select class="mdb-select" name="admin_status" value="<?php// if($data->admin_status) echo "Active"; else echo "Inactive";?>">
							<option value="<?php echo $data->admin_status; ?>">
								<?php if($data->admin_status) echo "Active"; else echo "InActive"; ?>
							</option>
							<option value="0">InActive</option>
							<option value="1">Active</option>

						</select>
						<label>Status</label>
					</div>


					<div class="col-md-12" style="margin-top:20px;">
						<button  type="submit" class="btn btn-default" value="Save Changes" name="edit">Save Changes</button>
						
						<a href="<?php echo base_url("root_admin/profile/{$data->admin_id}"); ?>" type="submit" class="btn btn-danger"> Cancel </a>
						
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include ('footer.php');?>