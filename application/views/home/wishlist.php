<?php include('header_account.php');?>
				<div class="row ">
					<div class="col-md-10 col-md-offset-1">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
							</li>
							<li class="active">
								<strong>পছন্দের পণ্য</strong>
							</li>
						</ol>
						<div class="divider-new">
							<h4 class="h4-responsive">পছন্দের পণ্য</h4>
						</div>
					</div>
				</div>
                <!--Featured cards-->
                <div class="row my-wishlist">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-bordered table-info text-xs-center text-sm-center text-md-center text-lg-center">
									<br />
									<thead >
										<tr class="table-info">
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">#</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">পণ্যের নাম</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">পরিমাণ </th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">মূল্য</th>
											<th class="text-xs-center text-sm-center text-md-center text-lg-center"></th>
										</tr>
									</thead>
									<tbody class="table-info text-xs-center text-sm-center text-md-center text-lg-center">
										<tr >
											<th class="text-xs-center text-sm-center text-md-center text-lg-center">1</th>
											<td>Product 1</td>
											<td>৫ কেজি </td>
											<td>100$</td>
											<td><button class="btn btn-default">কিনুন </button></td>
										</tr>
									</tbody>
								</table>
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