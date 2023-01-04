<?php
$user=$this->session->userdata('admin_id');
include ('header.php');
?>

	<div class="row m-top-25">
		<div class="container">
			<div class="row">
				<div class="">
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url('root_admin/'); ?>">Home</a>
						</li>
						<li class="active">
							<strong>My Account</strong>
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
				<div class="col-md-12 card mainCard my_account">
					<div class="row">
							<div class="col-md-12">
								<h5 class="section-title st-mdb">
									My Account
								</h5>
							</div>
						</div>
						<hr /><br />
					<div class="row">
						<div class="col-md-12">
							<div class="md-form">
							<input placeholder="<?php echo $info->name ; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Full Name</label>
						</div>
						<div class="md-form">
							<input placeholder="<?php echo $info->role_name ; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Designation</label>
						</div>
						<div class="md-form">
							<input placeholder="<?php echo $info->email ; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Email</label>
						</div>
						<div class="md-form">
							<input placeholder="+880 <?php echo $info->contact ; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Contact number</label>

							<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								Change Number
							</button>
							<?php
									$attributes = array('class' => 'form-horizontal');
									echo form_open("root_admin/update_contact", $attributes);
									echo form_hidden('old_contact',$info->contact);
									?>
								<div class="collapse" id="collapseExample">
									<div class="card card-block">
										<div class="md-form">
											<?php echo form_input(['name'=>'contact', 'class'=>'form-control', 'value'=>set_value('contact')]);
												echo form_error('contact'); ?>
											<label>New Contact Number</label>
										</div>
										<div class="" style="">
											<button  type="submit" class="btn btn-default" value="Change Contact" name="post">Save</button>
											<button  type="submit" class="btn btn-danger" value="Reset" name="reset">Reset</button>
											
											<?php //echo form_submit(['name'=>'post', 'value'=>'Change Contact', 'type'=>'submit', 'class'=>'btn btn-primary btn-xs']) ;
												//echo form_reset(['name'=>'reset', 'value'=>'Reset', 'type'=>'reset', 'class'=>'btn btn-danger btn-xs']) ;
												echo form_close(); ?>
										</div>
									</div>
								</div>
						</div>

						<div class="md-form">
							<input placeholder="***********" type="text" id="form5" class="form-control" disabled>
							<label>Password</label>

							<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExamples" aria-expanded="false" aria-controls="collapseExamples">
								Change Password
							</button>
							<?php
									
									echo form_open("root_admin/change_password");
									?>
								<div class="collapse" id="collapseExamples">
									<div class="card card-block">
										<div class="md-form">
											<input type="password" id="change_pass" class="form-control" name="old_pass">
											<label>Old Password</label>
										</div>
										<div class="md-form">
											<input type="password" pattern=".{8,}" title="At lest 8 characters" id="change_pass" class="form-control" name="new_pass">
											<label>New Password</label>
										</div>
										<div class="md-form">
											<input type="password" id="change_pass" class="form-control" name="confirm_pass">
											<label>Re-type New Password</label>
										</div>

										<div class="form-group">
											<button  type="submit" class="btn btn-default" >Save</button>
											<button  type="reset" class="btn btn-danger" >Reset</button>
											
											<?php //echo form_submit(['name'=>'post', 'value'=>'Change Password', 'type'=>'submit', 'class'=>'btn btn-primary']) ;
												//echo form_reset(['name'=>'reset', 'value'=>'Reset', 'type'=>'reset', 'class'=>'btn btn-danger']) ;
												echo form_close(); ?>
										</div>
									</div>
								</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

			
	
	
	<div class="animated fadeInUp">
		
	</div>

<?php
include ('footer.php');
?>