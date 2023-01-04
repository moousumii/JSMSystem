<?php include('header_account.php');?>

	<div class="row ">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
				</li>
				<li class="active">
					<strong>ওর্ডার বিবরণী</strong>
				</li>
			</ol>
			<div class="divider-new">
				<h4 class="h4-responsive"><b>ওর্ডার বিবরণী</b></h4>
			</div>
		</div>
	</div>
	<?php 
		$info['info']->order_date=date('d M, Y', strtotime($info['info']->order_date));
	?>
	<div class="">
		<div class="row order">
		<div class="col-md-12">
			<div class="pull-xs-right pull-md-right pull-sm-right pull-lg-right" >Date: <?php echo $info['info']->order_date; ?></div>
			<br />
			<table class="table table-bordered table-info text-xs-center text-sm-center text-md-center text-lg-center">
									<br />
									<thead >
										<tr >
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">#</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">পণ্য</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">পরিমাণ </th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">মূল্য</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">মোট</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">মোট</th>
										</tr>
									</thead>
									<tbody class="text-xs-center text-sm-center text-md-center text-lg-center">
										<?php $int=0; foreach($orders as $order):  $int++; ?>
										<tr class="table-info">
											<th class="text-xs-center text-sm-center text-md-center text-lg-center"><?php echo $int; ?></th>
											<td class="row">
												<img class="" src="<?php echo $order->product_image; ?>" width="50" height="50" alt="">
												<span><?php echo $order->product_name; ?></span>
											</td>
											<td><?php echo $order->quantity; ?> </td>
											<td><?php echo $order->sale_price; ?></td>
											<td><?php echo ($order->sale_price*$order->quantity); ?></td>
										
										<?php
											echo form_open('home/add_cart_reorder'); 
											echo form_hidden('product_id',$order->product_id);
											echo form_hidden('quantity',1);
											echo form_hidden('sourceUrl',uri_string());
										?>
											<td class="cta">
												<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-shopping-basket"></i> &nbsp; কিনুন </button>
											</td>
										</tr>
										<?php echo form_close(); ?>
										<?php endforeach ; ?>
										
										<tr class="total">
											<td ></td>
											<td >Order Type</td>
											<td><?php echo $info['info']->type_name; ?></td>
											<td>Discount</td>
											<td><?php echo $info['info']->total_discount; ?></td>
										</tr>
										<tr class="total">
											<td ></td>
											<td></td>
											<td></td>
											<td><b>মোট</b></td>
											<td><b><?php echo $info['info']->total_price; ?></b></td>
										</tr>
										<!--<tr class="total">
											<?php //if($info['shipping']): ?>
												<td >Shipping Address</td>
												<td>
													<span><?php //echo $info['shipping']->user_name; ?></span><br/>
													<span><?php //echo $info['shipping']->contact; ?></span><br/>
													<span><?php //echo $info['shipping']->address_title; ?></span><br/>
													<span><?php //echo $info['shipping']->address; ?></span>
												</td>
											<?php //endif ; ?>
											<?php //if($info['billing']): ?>
												<td>Billing Address</td>
												<td>
													<span><?php //echo $info['billing']->user_name; ?></span><br/>
													<span><?php //echo $info['billing']->contact; ?></span><br/>
													<span><?php //echo $info['billing']->address_title; ?></span><br/>
													<span><?php //echo $info['billing']->address; ?></span>
												</td>
											<?php //endif ; ?>
										</tr>-->
									</tbody>
								</table>
								
								<div class="row" style="margin-bottom:15px;margin-top:30px;">
									<div class="">
										<div class="col-md-6 text-xs-center text-sm-center text-md-center text-lg-center">
											<div class="card z-depth-2" style="padding-bottom:15px;">
												<div class="card-block">
													<!--Title-->
													<h4 class="card-title"><b>Shipping Address</b></h4><hr />
													<!--Text-->
													<p class="card-text">
														Address Type: <?php echo $info['shipping']->address_title; ?><br />
														Name: <?php echo $info['shipping']->user_name; ?><br/>
														<b>Address: <?php echo $info['shipping']->address; ?> </b><br />
														Contact: <?php echo $info['shipping']->contact; ?><br />
														Bangladesh <br />
													</p>
												</div>

											</div>
										</div>
										<div class="col-md-6 text-xs-center text-sm-center text-md-center text-lg-center">
											<div class="card z-depth-2" style="padding-bottom:15px;">
												<div class="card-block">
													<!--Title-->
													<h4 class="card-title"><b>Billing Address</b></h4><hr />
													<!--Text-->
													<p class="card-text">
														Address Type: <?php echo $info['billing']->address_title; ?><br />
														Name: <?php echo $info['billing']->user_name; ?><br/>
														<b>Address: <?php echo $info['billing']->address; ?> </b><br />
														Contact: <?php echo $info['billing']->contact; ?><br />
														Bangladesh <br />
													</p>
												</div>

											</div>
										</div>
										
									</div>
								</div>
								
								<div style="margin-bottom:60px;">
									<!--<a class="btn btn-default" href="<?php //echo base_url("home/reorder/{$info['info']->order_id}") ; ?>" >Reorder</a> -->
									
									<a class="btn btn-danger" href="<?php echo base_url("home/order") ; ?>">Back </a>
								</div>
		</div>
		</div>
	</div>
	
	
<!--Modals-->
	<?php include('contact-us-modal.php');?>
	<?php include('login-register-modal.php');?>
	<?php include('my-cart-modal.php');?>
	<?php include('product-details-modal.php');?>
<!--/Modals-->				
<?php include('footer.php');?>