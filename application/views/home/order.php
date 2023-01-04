<?php include('header_account.php');?>
	<div class="row ">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
				</li>
				<li class="active">
					<strong>ওর্ডার</strong>
				</li>
			</ol>
			<div class="divider-new">
				<h4 class="h4-responsive"><b>ওর্ডার</b></h4>
			</div>
		</div>
	</div>
                <!--Featured cards-->
				<div class="animated fadeInUp">
					<div class="row order">
					<div class="col-md-10 col-md-offset-1">
						<?php //foreach($orders as $order): ?>

							<!--First panel-->
							<div class="panel panel-primary filterable">
									<div class="panel-heading">
										<div class="pull-right">
											<button id="filter_button" class="btn btn-info btn-xs btn-filter" style="color:#fff;"><i class="fa fa-filter"></i> Filter
											</button>
										</div>
									</div>
									<!--Panel body-->
									<div class="table-responsive">
											<table class="table table-bordered table-info text-xs-center text-sm-center text-md-center text-lg-center">
												<thead class="">
													<tr class="filters">
														<th>
															<input type="text" class="form-control text-xs-center text-sm-center text-md-center text-lg-center" placeholder="Date" disabled data-toggle="true">
														</th>
														<th>
															<input type="text" class="form-control text-xs-center text-sm-center text-md-center text-lg-center" placeholder="Discount" disabled>
														</th>
														
														<th>
															<input type="text" class="form-control text-xs-center text-sm-center text-md-center text-lg-center" placeholder="Total Amount" disabled>
														</th>
														<th>
															<input type="text" class="form-control text-xs-center text-sm-center text-md-center text-lg-center" placeholder="Order Type" disabled>
														</th>
														<th>
															<input type="text" class="form-control text-xs-center text-sm-center text-md-center text-lg-center" placeholder="Action" disabled>
														</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach($orders as $order): ?>
													<?php $order->order_date=date('d M, Y', strtotime($order->order_date)); ?>
													<tr>
														<td><?php echo $order->order_date; ?></td>
														<td><?php echo $order->total_discount; ?></td>
														<td><?php echo $order->total_price; ?></td>
														<td><?php echo $order->type_name; ?></td>
														<td>
															<!--<a href="<?php //echo base_url("home/reorder/{$order->order_id}") ; ?>" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="reorder">Reorder</a>-->
															<a href="<?php echo base_url("home/order_details/{$order->order_id}") ; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Details">Details</a>
														</td>
													</tr>
													<?php endforeach ; ?>
												</tbody>
											</table>
										</div>
									
							</div>
							
							
					</div>
					</div>
                </div>
                <!--/Featured cards-->
<!--Modals-->

		<?php include('contact-us-modal.php');?>
		<?php include('login-register-modal.php');?>
		<?php include('my-cart-modal.php');?>
		<?php include('product-details-modal.php');?>
		
    <!--/Modals-->				
<?php include('footer.php');?>