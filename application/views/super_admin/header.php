<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Example Store</title>

    <!-- Custom Fonts -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/metisMenu.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
	
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('superAdmin/index'); ?>">Example Store</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?php  echo base_url('superAdmin/myAccount'); ?>"><i class="fa fa-user fa-fw"></i> My Account</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php  echo base_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('superAdmin/index'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('superAdmin/extendDate'); ?>"><i class="fa fa-dashboard fa-fw"></i> Extend Date</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('superAdmin/addBillMemo'); ?>"><i class="fa fa-table fa-fw"></i> Add Bill / Memo</a>
                        </li>
						<li>
                            <a href="<?php echo base_url('superAdmin/returnProduct'); ?>"><i class="fa fa-table fa-fw"></i> Return Product</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('superAdmin/addProductToStock'); ?>"> Add Product to Store</a>
                                    <!--<a href="<?php // echo base_url('super_admin/addProductToStock'); ?>"> Add Product to Stock</a>-->
                                </li>
                                <li>
                                    <a href="buttons.html">Print Barcode</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('superAdmin/viewProduct'); ?>">View Product</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Expense<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('superAdmin/addExpense'); ?>"> Add Expense</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html"> Search Product</a>
                                    <a href="<?php echo base_url('superAdmin/incomeExpenseReport'); ?>"> Income-Expense Report</a>
                                    <a href="<?php echo base_url('superAdmin/showInventory'); ?>"> Show Inventory</a>
                                    <a href="<?php echo base_url('superAdmin/productSaleReport'); ?>"> Product Sale Report</a>
                                    <a href="<?php echo base_url('superAdmin/returnReport'); ?>"> Return Report</a>
                                    <a href="<?php echo base_url('superAdmin/salesmanPerformaneceReport'); ?>"> Salesmem Performance Report</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Other<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('superAdmin/addNewProduct'); ?>"> Add New Product</a>
                                    <a href="<?php echo base_url('superAdmin/allSupplier'); ?>"> All Supplier</a>
                                    <a href="<?php echo base_url('superAdmin/allSalesman'); ?>"> All Salesman</a>
                                    <a href="<?php echo base_url('superAdmin/allManager'); ?>"> All Manager</a>
                                    <a href="<?php echo base_url('superAdmin/adjustStock'); ?>"> Adjust Stock</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> StarLab Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('superAdmin/allProductGroup'); ?>"> All Product Group</a>
                                    <a href="<?php echo base_url('superAdmin/allExpenseField'); ?>"> All Expense Field</a>
                                    <a href="<?php echo base_url('superAdmin/allShop'); ?>"> All Shop</a>
                                    <a href="<?php echo base_url('superAdmin/allUser'); ?>"> All User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">