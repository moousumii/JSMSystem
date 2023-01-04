<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->

		<title>কেনাকাটা.কম</title>
		<!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" /> 
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/jquery-ui.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/jquery-ui.theme.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/font-awesome.min.css'); ?>" />
		
		
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/select2.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/select2-bootstrap.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/mdb.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/back-end/css/odometer-theme-car.css'); ?>" />
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
					url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.woff2'); ?>') format('woff2'), 
					url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.woff2'); ?>') format('woff'), 
					url('<?php echo base_url('assets/back-end/font/fontAwesome/fontawesome-webfont.ttf'); ?>') format('truetype');
			}
		</style>
		
	</head>

	<body class="fixed-sn graphite-skin">
		<header>	
			<!-- SideNav slide-out button -->
			<!--/. SideNav slide-out button -->

			 <!-- Sidebar navigation -->
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
                        <a href="<?php echo base_url('super_admin/dashBoard'); ?>" ><span class="nav-label"></span><i class="fa fa-th-large" aria-hidden="true"></i> DashBoard</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('super_admin/my_account'); ?>" ><span class="nav-label"></span><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('super_admin/add_category'); ?>" ><span class="nav-label"></span><i class="fa fa-tags" aria-hidden="true"></i> Add Category</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('super_admin/category'); ?>" ><span class="nav-label"></span><i class="fa fa-tags" aria-hidden="true"></i> Category Info</a>
                    </li>
					
					<!--<li>
                        <a href="<?php //echo base_url('super_admin/add_product'); ?>" ><i class="fa fa-flask"></i> <span class="nav-label"></span>Add Product</a>
                    </li>-->
					
					
					<li>
						<a class="collapsible-header waves-effect arrow-r"><i class="fa fa-plus" aria-hidden="true"></i> Add Product
							<i class="fa fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="<?php echo base_url('super_admin/add_single_product'); ?>" class="waves-effect">Add Single Product </a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/add_multiple_product'); ?>" class="waves-effect">Add Multiple Product</a>
								</li>
							</ul>
						</div>
					</li>
					
					<li>
                        <a href="<?php echo base_url('super_admin/products'); ?>" ><span class="nav-label"></span><i class="fa fa-product-hunt" aria-hidden="true"></i> Product Info</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('super_admin/addUser'); ?>" ><span class="nav-label"></span><i class="fa fa-user" aria-hidden="true"></i> Add Customer</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('super_admin/userInfo'); ?>" ><span class="nav-label"></span><i class="fa fa-user" aria-hidden="true"></i> Customer Info</a>
                    </li>
					<li>
						<a class="collapsible-header waves-effect arrow-r"><i class="fa fa-money" aria-hidden="true"></i> Accounts
							<i class="fa fa-angle-down rotate-icon"></i>
						</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
									<a href="<?php echo base_url('super_admin/cashReceipt'); ?>" class="waves-effect">Add Transactions </a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/transactions'); ?>" class="waves-effect">Transactions</a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/accountReceivablePayable'); ?>" class="waves-effect">Receivable &#8725; Payable</a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/expense'); ?>" class="waves-effect">Expenses</a>
								</li>
                            </ul>
                        </div>
                    </li>
					<li>
                        <a href="<?php echo base_url('super_admin/index'); ?>" ><span class="nav-label"></span><i class="fa fa-shopping-basket" aria-hidden="true"></i> Orders</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('super_admin/sales'); ?>" ><span class="nav-label"></span><i class="fa fa-exchange" aria-hidden="true"></i> Sales</a>
                    </li>
					<li>
						<a class="collapsible-header waves-effect arrow-r"><i class="fa fa-history" aria-hidden="true"></i> Log
							<i class="fa fa-angle-down rotate-icon"></i>
						</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
									<a href="<?php echo base_url('super_admin/bills'); ?>" ><span class="nav-label"></span>Bills</a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/walletHistory'); ?>" ><span class="nav-label">Wallet History</a>
								</li>
								<li>
									<a href="<?php echo base_url('super_admin/returnedProduct'); ?>" ><span class="nav-label"></span>  Returned Product</a>
								</li>
                            </ul>
                        </div>
                    </li>
					
				</ul>
				<!--/. Side navigation links -->				
			</ul>
			<!--/. Sidebar navigation -->

			<!-- Navbar-->
			<nav class="navbar navbar-fixed-top double-nav lighten-3">

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
					
					<li><a href="<?php  echo base_url('login/logout'); ?>" class=""><i class="fa fa-sign-out"></i><br><span style="margin-top:-2px;">Log Out</span></a></li>
					<!--<li><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus"></i><br><span style="margin-top:-2px;">Add Order</span></a></li>
					<div class="row">
						<div class="col-md-6 col-md-offset-6 col-xs-12 col-xs-offset-0">
							<div class="collapse" id="collapseExample" style="margin-top: 8px;">
								<div class="card card-block black-text">
									<div class=""> 
										<div class="addorder">
											<div class="row">
												<div class="col-md-12">
													<div class="md-form">
														<?php //$attributes = array('class' => 'abcd', 'id' => ''); ?>
														<?php //echo form_open('autocomplete/select_customer', $attributes); ?>		
															<?php  
															//echo form_input(['name'=>'user_id', 'id'=>'name', 'class'=>'form-control' ]);
															
															?> 
														<label for="form1" class="">Customer</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-inline">
														<fieldset class="form-group">
															<input name="group1" type="radio" id="radio30" value="1", checked="checked">
															<label for="radio30">Quick Sale</label>
														</fieldset>

														<fieldset class="form-group">
															<input name="group1" type="radio" value="2", id="radio31">
															<label for="radio31">Take Order</label>
														</fieldset>
													</div>
												</div>
												<div class="col-md-4">
													<?php //echo form_submit('submit', 'Submit', "class='submit'"); ?>
													<button  type="submit" class="btn btn-default submit" >GO</button>
													<button  type="reset" class="btn btn-danger" >Reset</button>
													<?php	//echo form_close();	?>
												</div>
											</div>
											
										</div>
										<br />
										<ul>  
											<div class="well" id="result">Kicchu Ekta</div>  
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>-->
					
				</ul>
			</nav>
			<!-- /.Navbar-->

		</header>
		
		<main>
			<div class="main-wrapper">
				<div class="container-fluid">