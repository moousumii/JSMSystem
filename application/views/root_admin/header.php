<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>কেনাকাটা.কম</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/jquery-ui.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/jquery-ui.theme.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/font-awesome.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/mdb.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/style_table.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/style.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/responsive.css'); ?>" />
		<style type="text/css">
			@font-face {
				font-family: 'Roboto';
				font-style: normal;
				font-weight: 400;
				src: url('<?php echo base_url('assets/back-end/font/roboto/Roboto-Regular.eot'); ?>');
				src: local('Roboto'), local('Roboto-Regular'),
				   url('<?php echo base_url('assets/back-end/font/roboto/Roboto-Regular.woff2'); ?>') format('woff2'), 
				   url('<?php echo base_url('assets/back-end/font/roboto/Roboto-Regular.woff'); ?>') format('woff'), 
				   url('<?php echo base_url('assets/back-end/font/roboto/Roboto-Regular.ttf'); ?>') format('truetype');
			}
			@font-face {
				font-family: 'FontAwesome';
				font-weight: normal;
				font-style: normal;
				src: url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.eot'); ?>');
				src: 
					url('<?php echo base_url('assets/back-end/font/fontAwesome/Roboto-Regular.woff2'); ?>') 		format('woff2'), 
					url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.woff2'); ?>') format('woff'), 
					url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.ttf'); ?>') format('truetype');
			}
		</style>
	</head>

	<body class="fixed-sn graphite-skin">
		<header>	
			<ul id="slide-out" class="side-nav fixed admin-side-nav dark-side-nav">

				<div class="logo-wrapper">
					<img src="http://0.gravatar.com/avatar/60efa32c26a19f3ed2e42798afb705ba?s=100&d=mm&r=g" class="img-fluid img-circle">
					<div class=""><p class="user white-text">User<br>
					Mafi</p></div>
				</div>
				<!--/. Logo -->

				<!-- Side navigation links -->
				<ul class="collapsible collapsible-accordion">					
					<li>
                        <a href="<?php echo base_url('root_admin/'); ?>" ><span class="nav-label"></span> <i class="fa fa-th-large" aria-hidden="true"></i> DashBoard</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('root_admin/my_account'); ?>" ><span class="nav-label"></span> <i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                    </li>					
					<li>
                        <a href="<?php echo base_url('root_admin/user'); ?>" ><span class="nav-label"> </span><i class="fa fa-users" aria-hidden="true"></i> User Info</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('root_admin/add_user'); ?>" ><span class="nav-label"></span> <i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a>
                    </li>					
				</ul>
				<!--/. Side navigation links -->
			</ul>
			<!--/. Sidebar navigation -->

			<!-- Navbar-->
			<nav class="navbar navbar-fixed-top double-nav special-color">

				<!-- SideNav slide-out button -->
				<div class="pull-left hidden-md-up">
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
				</div>

				<!-- Breadcrumb-->
				<div class="breadcrumb-dn hidden-md-down">
					<ol class="breadcrumb">
					  <li>Welcome to Admin Panel</li>
				</div>

				<!--Navigation icons-->
				<ul class="nav-icons">
					<li style="padding-top:0px;"><a href="<?php echo base_url('login/logout'); ?>" class=""><i class="fa fa-sign-out"></i><br><span style="margin-top:-2px;">Log Out</span></a></li>
				</ul>
			</nav>
			<!-- /.Navbar-->

		</header>
		
		<main>
			<div class="main-wrapper">
				<div class="container-fluid">