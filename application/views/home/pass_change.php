<?php include('header_account.php');?>
	<div class="row ">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
				</li>
				<li class="active">
					<strong>পাসওয়ার্ড পরিবর্তন</strong>
				</li>
			</ol>
			<div class="divider-new">
				<h4 class="h4-responsive"><b>পাসওয়ার্ড পরিবর্তন</b></h4>
			</div>
		</div>
	</div>
		<?php if($this->session->flashdata('feedback_successfull'))
		{ ?>
			<div class="alert alert-success">
				<strong>Success!</strong> <?php echo $this->session->flashdata('feedback_successfull'); ?>
			</div>
		<?php } 
		
		if($this->session->flashdata('feedback_failed'))
		{ ?>
			<div class="alert alert-danger">
				<strong>Oops!</strong> <?php echo $this->session->flashdata('feedback_failed'); ?>
			</div>
		<?php } ?>
	<?php $attributes = array('class' => 'abcd', 'id' => ''); ?>
    <?php echo form_open_multipart('home/update_password', $attributes);
		//echo form_hidden('user_id',$info->user_id); 
		echo form_hidden('user_email',$info->user_email); 
		//echo form_hidden('user_password',$info->user_password); 
	?>
	<div class="animated fadeInUp">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 pass-change" style="margin-top:25px;">
				<div class="">
					<div class="">
						<div class="md-form">
							<?php echo form_password(['name'=>'old_pass', 'class'=>'form-control', 'value'=>set_value('old_pass')]);
							echo form_error('old_pass'); ?>
							<label for="form1" class="">Old Password</label>
						</div>
						<div class="md-form">
							<?php echo form_password(['name'=>'new_pass', 'class'=>'form-control', 'value'=>set_value('new_pass')]);
							echo form_error('new_pass'); ?>
							<label for="form1" class="">New Password</label>
						</div>
						<div class="md-form">
							<?php echo form_password(['name'=>'confirm_pass', 'class'=>'form-control', 'value'=>set_value('confirm_pass')]);
							echo form_error('confirm_pass'); ?>
							<label for="form1" class="">Re-type New Password</label>
						</div>
						
						<div class="form-group">
							<button  type="submit" class="btn btn-default" value="Change" name="post">Change </button>
							<button  type="submit" class="btn btn-danger" value="Reset" name="reset">Reset</button>
						</div>
					
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

<!--Modals-->

		<?php include('contact-us-modal.php');?>
		<?php include('login-register-modal.php');?>
		<?php include('my-cart-modal.php');?>
		<?php include('product-details-modal.php');?>
		
    <!--/Modals-->
<?php include('footer.php');?>