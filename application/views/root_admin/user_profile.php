<?php include('header.php'); ?>
	
	<div class="row m-top-25">
		<div class="container">
		
			<div class="row">
				<div class="">
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url('root_admin/'); ?>">Home</a>
						</li>
						<li class="active">
							<strong>User Profile</strong>
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
				<div class="col-md-12 card mainCard user-profile">
					<div class="row">
							<div class="col-md-12">
								<h5 class="section-title st-mdb">
									User Profile
								</h5>
							</div>
						</div>
						<hr /><br />
					<form action="">
						<div class="md-form">
							<input placeholder="<?php echo $data->name; ?>" type="text" id="form5" class="form-control" disabled>
							<label for="form5">Name</label>
						</div>
						<div class="md-form">
							<input placeholder="<?php echo $data->contact; ?>" type="text" id="form5" class="form-control" disabled>
							<label for="form5">Contact Number</label>
						</div>
						<div class="md-form">
							<input placeholder="<?php echo $data->role_name; ?>" type="text" id="form5" class="form-control" disabled>
							<label for="form5">Designation</label>
						</div>
						<div class="md-form">
							<input placeholder="<?php if($data->admin_status==1) echo" Active ";  else echo "Deactive "; ?>" type="text" id="form5" class="form-control" disabled>
							<label for="form5">Status</label>
						</div>
						<div class="">
							<a type="button" href="<?php echo base_url("root_admin/edit_user/{$data->admin_id}"); ?>" class="btn btn-default">Edit User</a>
							<a type="button" href="<?php echo base_url("root_admin/delete/{$data->admin_id}"); ?>" class="btn btn-danger">Delete</a>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
			
						
                       
		
<?php include ('footer.php');?>