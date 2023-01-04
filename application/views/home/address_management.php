<?php include('header_account.php');?>
<?php include('add-address-modal.php');?>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
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
					</div>
				</div>
				<div class="row ">
					<div class="col-md-10 col-md-offset-1">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url('home/'); ?>">হোমপেজ</a>
							</li>
							<li class="active">
								<strong>ঠিকানা ব্যবস্থাপনা </strong>
							</li>
						</ol>
						<div class="row">
							<div class="pull-xs-right pull-sm-right pull-md-right pull-lg-right">
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-address"><i class="fa fa-plus"></i> Add Address
								</button>
							</div>
						</div>
						<div class="row">
							
							<div class="divider-new">
								<h4 class="h4-responsive"><b>ঠিকানা ব্যবস্থাপনা </b></h4>
							</div>
							
							<div class="col-md-6 col-md-offset-3 text-xs-center text-sm-center text-md-center text-lg-center">
								<div class="card">
									<div class="card-block">
										<!--Title-->
										<h4 class="card-title"><b>প্রাথমিক ঠিকানা</b></h4><hr />
										<!--Text-->
										<p class="card-text">
											<b>Name:</b> <?php echo $default->user_name; ?><br/>
											<b>Address: </b><?php echo $default->address; ?> <br />
											<b>Contact:</b> <?php echo $default->contact; ?><br />
											Bangladesh <br />
										</p>
										<div style="padding-bottom:15px;">
											<a href="<?php echo base_url("home/editaddress/{$default->adr_id}"); ?>" class="btn btn-sm btn-default">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Delete</a>
										</div>
									</div>

								</div>
							</div>
							
						</div>
						<?php if($infos): ?>						
						<div class="row">
							<div class="divider-new">
								<h4 class="h4-responsive"><b>অন্যান্য ঠিকানা</b></h4><hr />
							</div>
							<?php foreach($infos as $address): ?>
							<div class="col-md-6 text-xs-center text-sm-center text-md-center text-lg-center" >
								<div class="card" style="padding-bottom:10px;">
									<div class="card-block">
										<!--Title-->
										<h4 class="card-title"><b><?php echo ucfirst($address->address_title); ?></b></h4><hr />
										<!--Text-->
										<p class="card-text">
											<b>Name:</b>  <?php echo $address->user_name; ?><br/>
											<b>Address: <?php echo $address->address; ?> </b><br />
											<b>Contact:</b> <?php echo $address->contact; ?><br />
											Bangladesh <br />
										</p>
										<div class="edit-buttons pull-md-center" style="padding-bottom:15px;">
											<a href="<?php echo base_url("home/editaddress/{$address->adr_id}"); ?>" class="btn btn-sm btn-default">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Delete</a>
										</div>
									
									</div>
								</div>	
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>




	<!--Modals-->
		<?php include('contact-us-modal.php');?>
		<?php //include('login-register-modal.php');?>
		<?php include('my-cart-modal.php');?>
		<?php include('product-details-modal.php');?>
		
    <!--/Modals-->
<?php include('footer.php');?>