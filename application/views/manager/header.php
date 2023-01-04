<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RumJhum Jewelers</title>
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jQuery-UI-v1.12.1.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-timepicker.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/select2.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style_table.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/metisMenu.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Kurale" rel="stylesheet"> -->

    <style type="text/css">
        /*@font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url('<?php //echo base_url('assets/fonts/roboto/Roboto-Regular.eot')?>');
            src: local('Roboto'), local('Roboto-Regular'),
               url('<?php //echo base_url('assets/fonts/roboto/Roboto-Regular.woff2')?>') format('woff2'), 
               url('<?php //echo base_url('assets/fonts/roboto/Roboto-Regular.woff')?>') format('woff'), 
               url('<?php //echo base_url('assets/fonts/roboto/Roboto-Regular.ttf')?>') format('truetype');
        }*/
    </style>


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

                <!--<ul class="nav navbar-top-links navbar-left hidden-xs hidden-sm">
                    <li><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('manager/');?>">RumJhum Jewelers</a>
                <ul class="nav navbar-top-links navbar-right pull-right hidden-md hidden-lg">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            
                            <li><a href="<?php  echo base_url('manager/myAccount'); ?>"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php  echo base_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-top-links navbar-right hidden-xs hidden-sm">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?php  echo base_url('manager/myAccount'); ?>"><i class="fa fa-user fa-fw"></i> My Account</a>
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
                        <!-- <li class="text-center user-img hidden-xs hidden-sm">
                            <img src="<?php echo base_url('assets/images/forhad mama1.jpg')?>" alt="" class="img-responsive img-circle" /> <br /> User: Riaz Ahmed
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('manager/index'); ?>"><i class="fa fa-bar-chart fa-fw"></i> Dashboard </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-balance-scale fa-fw"></i> Invoicing<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/addSale'); ?>"> Add Sale / Invoice</a>
                                    <a href="<?php echo base_url('manager/addReturn'); ?>"> Add Return</a>
                                    <!-- <a href="<?php echo base_url('manager/viewInvoice'); ?>"> View Invoice / Print</a> -->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-usd fa-fw"></i> Accounts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/allExpenseField'); ?>"> All Expense Field</a>
                                    <a href="<?php echo base_url('manager/allExpense'); ?>"> All Expense</a>
                                    <a href="<?php echo base_url('manager/receivePayment'); ?>"> Receive Payment</a>
                                    <a href="<?php echo base_url('manager/addBill'); ?>"> Add Bill</a>
                                    <a href="<?php echo base_url('manager/allClient'); ?>"> All Client</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-fw"></i> Stock<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/viewStock'); ?>"> View All Product</a>
                                    <a href="<?php echo base_url('manager/addProduct'); ?>"> Add Product</a>
                                    <a href="<?php echo base_url('manager/productType'); ?>"> Product Type / Group</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/stockReport'); ?>"> Stock Report</a>
                                    <a href="<?php echo base_url('manager/stockUpdateReport'); ?>">Stock Update Report</a>
                                    <a href="<?php echo base_url('manager/saleReport'); ?>"> Sale Report</a>
                                    <a href="<?php echo base_url('manager/cashBook'); ?>"> Cash Book</a>
                                    <a href="<?php echo base_url('manager/transactionReport'); ?>"> Transaction Report</a>
                                    <a href="<?php echo base_url('manager/incomeExpenseReport'); ?>"> Income Expense Report</a>
                                    <!--<a href="<?php //echo base_url('manager/'); ?>"> Settlements</a>-->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/unitPrice'); ?>"> Unit Price</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-window-restore fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/transactionReport'); ?>">   Transactions Report</a>
                                    <a href="<?php echo base_url('manager/profitLossReport'); ?>"> Profit-Loss Report</a>
                                    <a href="<?php echo base_url('manager/incomeExpenseReport'); ?>"> Income-Expense Report</a>
                                    <a href="<?php echo base_url('manager/productEntryReport'); ?>"> Product Entry Report</a>
                                    <a href="<?php echo base_url('manager/saleReport'); ?>">   Sale Report</a>
                                    <a href="#"> System log</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('manager/allUser'); ?>"> All User</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">