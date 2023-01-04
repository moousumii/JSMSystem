<?php include('header.php') ?>
<div class="row m-top-25">
				<div class="">
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url('root_admin/'); ?>">Home</a>
						</li>
						<li class="active">
							<strong>Dashboard</strong>
						</li>
					</ol>
				</div>
			</div>
<div class="row card dashboard mainCard">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h5 class="section-title st-mdb">
					Root Admin Dashboard
				</h5>
			</div>			
		</div>
		<hr /><br />
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo base_url('root_admin/my_account'); ?>">
					<div class="card tex-md-center special-color white-text dashboradCard">
						<div class="dashboardIcon text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
							<i class="fa fa-user fa-2x" aria-hidden="true"></i>
						</div>
						<div class="card-block">
							<h4 class="card-title">My Account</h4>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url('root_admin/user'); ?>">
					<div class="card tex-md-center special-color white-text dashboradCard">
						<div class="dashboardIcon text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
							<i class="fa fa-users fa-2x" aria-hidden="true"></i>
						</div>
						<div class="card-block">
							<h4 class="card-title">User Info</h4>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url('root_admin/add_user'); ?>">
					<div class="card tex-md-center special-color white-text dashboradCard">
						<div class="dashboardIcon text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
							<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
						</div>
						<div class="card-block">
							<h4 class="card-title">Add User</h4>
						</div>
					</div>
				</a>
			</div>
		</div>		
	</div>
</div>


<?php include('footer.php') ?>