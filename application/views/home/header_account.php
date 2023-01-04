<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>কেনাকাটা.কম</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/mdb.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/owl.carousel.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/filter-table.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front-end/css/responsive.css'); ?>" />

</head>

<body>
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed default-side-nav dark-side-nav">

            <!-- Logo -->
            <div class="logo-wrapper waves-light">
                <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/front-end/images/logo.png'); ?>" class="img-fluid flex-center"></a>
            </div>
            <!--/. Logo -->

            <!--Search Form-->
            <form class="search-form hidden-md-up" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="সার্চ করুন">
                </div>
            </form>

            <!--/.Search Form-->

            <!-- Side navigation links -->
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="<?php echo base_url('home/my_account'); ?>" class="collapsible-header waves-light">প্রোফাইল</a>
                </li>

                <li>
                    <a href="<?php echo base_url('home/address_management'); ?>" class="collapsible-header waves-light">ঠিকানা ব্যবস্থাপনা </a>
                </li>
                <li>
                    <a href="<?php echo base_url('home/pass_change'); ?>" class="collapsible-header waves-light">পাসওয়ার্ড পরিবর্তন</a>
                </li>

                <li>
                    <a href="<?php echo base_url('home/order'); ?>" class="collapsible-header waves-light">ওর্ডার </a>
                </li>
                <li>
                    <a href="<?php echo base_url('home/my_cart'); ?>" class="collapsible-header waves-light">ঝুড়ি </a>
                </li>

            </ul>
            <!--/. Side navigation links -->
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar-->
        <nav class="navbar navbar-fixed-top double-nav elegant-color">

            <!-- SideNav slide-out button -->
            <div class="pull-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                <form class="form-inline pull-md-right hidden-md-down">
                    <input class="form-control" type="text" placeholder="সার্চ">
                </form>
            </div>



            <!--Navigation icons-->
            <ul class="nav-icons">
                <li class="pull-md-left">

                </li>

                <li><a href="#" class="" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-envelope-o"></i><br><span>যোগাযোগ</span></a></li>
                <?php if(!$this->session->userdata('customer')) { ?>
                <li data-toggle="modal" data-target="#modal-login"><a href="#" class=""><i class="fa fa-sign-in"></i><br><span>লগ ইন </span></a></li>
                <?php } if($this->session->userdata('customer')) { ?>
                <li><a href="<?php  echo base_url('home/logout'); ?>" class=""><i class="fa fa-sign-out"></i><br><span>লগ আউট</span></a></li>
                <li><a href="<?php echo base_url('home/my_account'); ?>" class=""><i class="fa fa-user"></i><br><span>অ্যাকাউন্ট </span></a></li>
                <?php } ?>
                <!--<li><a href="#cart-modal-ex" data-toggle="modal" class=""><i class="fa fa-shopping-basket"></i><br><span>ঝুড়ি</span></a></li><span class="nav-counter"> -->

                <li><a onclick="openNav()"><i class="fa fa-shopping-basket" id="basket"></i><br><span>ঝুড়ি</span></a></li><span class="nav-counter"> 
				<?php 
					if($cart=$this->cart->contents()){
						$rows = count($this->cart->contents());
						echo $rows;
						//echo $this->cart->total();
					} 
					else echo "0";
				?>
				</span>
            </ul>
        </nav>

        <div id="mySidenav" class="mySidenav">


            <a href="javascript:void(0)" type="button" class="btn btn-danger btn-sm closebtn" onclick="closeNav()"><i class="fa fa-times fa-2x"></i></a>
            <table class="table table-responsive text-xs-center text-sm-center text-md-center text-lg-center ">
                <tbody>
                    <?php $int=0; ?>
                    <?php foreach($cart as $item): $int++; ?>
                    <tr class="table-success">
                        <!--<td style="width:10%"><?php //echo $int; ?></td>-->
                        <td style="width:10%">
                            <label style="display:block">
										<a type="button" href="<?php echo base_url('home/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus"><input type="radio" name="options" id="option1"><i class="fa fa-caret-up fa-2x"></i></a>
									</label>
                            <span class="qty" style="display:block"><?php echo $item['qty']; ?> </span>
                            <label style="display:block">
										<a type="button" href="<?php echo base_url('home/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="minus"><input type="radio" name="options" id="option2"><i class="fa fa-caret-down fa-2x"></i></a>
									</label>
                        </td>
                        <td style="width:25%"><img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt=""></td>

                        <td style="width:30%">
                            <?php echo $item['name']; ?><br />1x
                            <?php echo ($item['price']-$item['discount']); ?>
                        </td>
                        <?php if($item['discount']>0){  ?>
                        <td style="width:25%">
                            <div class="cta">
                                <p class="price">
					৳
                                    <?php echo ($item['subtotal']-($item['qty']*$item['discount'])); ?> <br />
                                    <span>৳ <?php echo $item['subtotal']; ?></span>
                                </p>
                            </div>
                        </td>
                        <?php } 
								else{ ?>
                        <td style="width:25%">
                            <div class="cta">
                                <p class="price">
					৳
                                    <?php echo $item['subtotal']; ?>
                                </p>
                            </div>
                        </td>
                        <?php } ?>

                        <td style="width:10%"><a href="<?php echo base_url('home/remove/'.$item['rowid']); ?>type=" button " class="btn btn-sm btn-danger ">X</a></td>
								
                            </tr>
						<?php endforeach ;  ?>
                           
                        </tbody>
                    </table>
			<a class="btn btn-default btn-lg btn-block checkout-buttton " href="<?php echo base_url( 'home/checkout'); ?>">Check Out</a>
        </div>
        <!-- /.Navbar-->

    </header>

    <main>
        <div class="main-wrapper" id="main-wrapper">
            <div class="container-fluid">