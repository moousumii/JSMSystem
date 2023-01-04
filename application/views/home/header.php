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

<body class="graphite-skin">
    <header>
        <ul id="slide-out" class="side-nav fixed default-side-nav dark-side-nav">
            <div class="logo-wrapper hidden-lg-up">
                <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/front-end/images/logo.png'); ?>" class="img-fluid flex-center"></a>
            </div>

            <form class="search-form hidden-md-up" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="সার্চ করুন">
                </div>
            </form>

            <ul class="collapsible collapsible-accordion">
                <li class="dropdown">
                    <?php foreach($categories as $category): ?>
                    <li>
						<a class="collapsible-header waves-effect arrow-r"> 
							<?php echo $category->category_name; ?><i class="fa fa-angle-down rotate-icon"></i>
						</a>

                        <div class="collapsible-body">
                            <ul>
                                <?php foreach($childs as $child): ?>
                                <?php if($child->parent_id==$category->category_id){ ?>
                                <li><a href="<?php echo base_url('home/products/'.$child->category_id); ?>" class="waves-light testClass"><?php echo $child->category_name; ?></a></li>
                                <?php } endforeach; ?>
                            </ul>
                        </div>
                    </li>
                </li>
                <?php endforeach; ?>
            </ul>
        </ul>

        <nav class="navbar navbar-fixed-top double-nav light-blue darken-1">
			<div class="pull-left hidden-lg-up">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
			<div class="breadcrumb-dn">
					<h3 style="width:190px;">কেনাকাটা.কম</h3>
                </div>
				
			<!--<ul class="nav navbar-nav hidden-md-down" style="padding-left:240px;">
                    <li class="nav-item search">
                        <form class="form-inline">
							<input class="form-control" type="text" placeholder="&#xF002; Search">
						</form>
                    </li>
                </ul>-->
			<ul class="nav navbar-nav hidden-md-down" style="padding-left:240px;">
                <li class="nav-item search">
                    <?php $attributes = array('class' => 'form-inline', 'id' =>'myForm', 'name' =>'myForm'); ?>
					<?php echo form_open('',$attributes); ?>				
						<?php  
							echo form_input(['name'=>'product_id', 'id'=>'name', 'class'=>'form-control','placeholder'=>'&#xF002; Search' ]);
						?> 					
						<?php echo form_close();?>
                </li>
            </ul>
			<div class="well" id="result" ></div>  
			
            <ul class="nav-icons">
                <li class="pull-md-left">

                </li>

                <li><a href="#" class="" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-envelope-o"></i><br><span>যোগাযোগ</span></a></li>
                <?php if(!$this->session->userdata('customer')) { ?>
                <li data-toggle="modal" data-target="#modal-login"><a class=""><i class="fa fa-sign-in"></i><br><span>লগ ইন </span></a></li>
                <?php } if($this->session->userdata('customer')) { ?>
                <li><a href="<?php  echo base_url('home/logout'); ?>" class=""><i class="fa fa-sign-out"></i><br><span>লগ আউট</span></a></li>
                <li><a href="<?php echo base_url('home/my_account'); ?>" class=""><i class="fa fa-user"></i><br><span>অ্যাকাউন্ট </span></a></li>
                <?php } ?>


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

            <a href="javascript:void(0)" type="button" class="btn btn-elegant btn-lg closebtn" onclick="closeNav()"><i class="fa fa-times fa-2x pull-xs-left"></i><span class="pull-xs-right"> ৳ 1200</span></a>
            <?php $int=0; ?>
            <?php foreach($cart as $item): $int++; ?>
			<div class="row proTable text-md-left" style="padding:5px;border-bottom:1px solid #cfcfcf;">
            	<div class="col-xs-2 col-md-2" style="padding-left:0.9rem;">
					<?php if($item['qty'] < $item['total_quantity']) { ?>
                            <label style="display:block">
								<a type="button" href="<?php echo base_url('home/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus">
									<!--<input type="radio" name="options" id="option1" >-->
									<i class="fa fa-caret-up fa-2x"></i>
								</a>  
							</label>
							<?php }   else{  ?> 
								<label style="display:block">
									<!--<a type="button" href="" class="plus">
									<input type="radio" name="options" id="option1" >-->
									<i class="fa fa-caret-up fa-2x"></i></a>  
								</label>
							<?php } ?>
                            <span class="qty" style="display:block"><?php echo $item['qty']; ?> </span>
							
                            <label style="display:block">
								<a type="button" href="<?php echo base_url('home/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="minus">
									<!--<input type="radio" name="options" id="option2">-->
									<i class="fa fa-caret-down fa-2x"></i>
								</a>
							</label>
				</div>
				<div class="col-xs-3 col-md-3">
					<img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt="">
				</div>
				<div class="col-xs-7 col-md-7">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<b><?php echo $item['name']; ?></b>
						</div>
					</div>
					<div class="row m-top-5">
						<div class="col-xs-2 col-md-2">
							1x<?php echo ($item['price']-$item['discount']); ?>
						</div>
						<div class="col-xs-6 col-md-6">
							<?php if($item['discount']>0){  ?>
                            <div class="cta">
                                <p class="price">
										৳
                                    <?php echo ($item['subtotal']-($item['qty']*$item['discount'])); ?> 
                                    <span>৳ <?php echo $item['subtotal']; ?></span>
                                </p>
                            </div>
                        <?php } 
								else{ ?>
                            <div class="cta">
                                <p class="price">
										৳ <?php echo $item['subtotal']; ?>
                                </p>
                            </div>
                        <?php } ?>
						</div>
						<div class="col-xs-3 col-md-3" style="padding-right:0.9rem;text-align:right">
							<a href="<?php echo base_url('home/remove/'.$item['rowid']); ?>"><i class="fa fa-remove"></i></a>
						</div>
					</div>
				</div>
            </div>
			<?php endforeach ;  ?>
            <a class="btn btn-elegant btn-lg btn-block checkout-buttton" href="<?php echo base_url('home/checkout'); ?>">Check Out</a>
        </div>



    </header>

    <main>
        <div class="main-wrapper " id="main-wrapper">
            <div class="container-fluid">