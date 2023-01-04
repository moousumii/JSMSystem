<?php include('header.php');?>
	

	<h5 class="section-title st-mdb">সকল পণ্য</h5>

	<!--Featured cards-->
	<div class="row main-products">

		<div class="col-md-3">
			<div class="card product-card">
				<?php 
					foreach($products as $product):
					echo form_open('home/add_cart');
				?>
				<div class="view overlay hm-black-strong">
					<a>
						<div class="mask">
							<p>সকল পণ্য</p>
						</div>
					</a>
					<img src="<?php echo base_url('assets/front-end/images/dairy-milk-chocolate-with-beautiful-quotes.jpg'); ?>" class="img-fluid" alt="">

					<span class="label">-20%</span>

					<div class="card-block">
						<a><h4 class="card-title"><?php echo $product->name; ?></h4></a>
					</div>
				</div>

				<div class="cta">
					<p class="quantity">১ কেজি</p>
					<p class="price">$ <?php echo $product->price; ?> <span>$৭০০</span></p>
					<button class="btn btn-info" data-toggle="modal" data-target="#quick-look-ex">বিস্তারিত</button>
					<button class="btn btn-default" onclick="toastr.success('Hi! I am success message.');"><i class="fa fa-shopping-basket"></i> <?php 
					echo form_hidden('id',$product->id);
					echo form_submit('add', 'Add to Cart');
				?></button>
				</div>
				
				
				
			</div>
		</div>

		
	</div>
	<!--/Featured cards-->
<?php include('footer.php');?>