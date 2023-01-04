	<div class="row">
		<div class="col-md-12">
			<h5 class="all-title">পণ্য বিবরণী</h5>
			<hr />
		</div>
	</div>
	<div class="row products-details m-top-25 m-bottom-fifty">
		<div class="col-md-12">
			<div class="row">
				<div class="col-xs-12 col-md-5 m-bottom-25">
					<img id="product-image" src="<?php echo $productDetails->product_image;?>" class="img-fluid img-thumbnail" alt="" data-zoom-image="<?php echo $productDetails->product_image;?>">
				</div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<h5> 
								<?php echo $productDetails->product_name;?>
							</h5>

							<div class="price">
								<b>পরিমাণ: </b> <span class="quantity"><?php echo $productDetails->product_unit." ".$productDetails->unit_name;?></span>
								<p>
								   <b> মূল্য: </b><span class="price-after">৳<?php echo ($productDetails->product_price - $productDetails->discount_amount);  ?></span>
									<span class="price-before"><?php if( $productDetails->discount_amount > 0){ echo "৳".$productDetails->product_price ;}?></span>
									<?php if($productDetails->discount_percent > 0 ){?>
									<span class="label"><?php echo $productDetails->discount_percent."%";?></span>
									<?php }?>
								</p>
							</div>

							<h5>বিবরণ: </h5>

							<p>
								<?php echo $productDetails->parent_product_details;?>
							</p>
							<?php
									echo form_open('home/add_cart'); 
									echo form_hidden('product_id',$productDetails->product_id);
									echo form_hidden('product_name',$productDetails->product_name);
									echo form_hidden('total_quantity',$productDetails->product_quantity);
									echo form_hidden('product_image',$productDetails->product_image);
									echo form_hidden('product_price',$productDetails->product_price);
									echo form_hidden('discount',$productDetails->discount_amount);
									echo form_hidden('vat',$productDetails->vat);
									//echo form_hidden('quantity',1);
								?>
							<div class="quantity clearfix">
								<button type="button" class="minus btn btn-sm btn-info"><i class="fa fa-minus"></i></button>
								<!--<a type="button" href="<?php //echo base_url('home/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus btn btn-sm btn-default">-</a>-->
								<input type="number" name="quantity" value="1" name="quantity" readonly="" class="" />
								<button type="button" class="plus btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
							</div>


							<button type="submit" class="btn btn-info"><i class="fa fa-shopping-basket"></i> &nbsp; কিনুন</button>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h5 class="all-title">এরকম আরও পণ্য</h5>
			<hr />
		</div>
	</div>
	<div class="row related-products m-top-fifty">
		<div class="col-md-12">
			<div class="row">
				<?php if($relatedProduct != null){foreach ($relatedProduct as $product ): 
									//print_r($product)
							  ?>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 col-xl-2" id="product-item">
				<div class="card product-card">


					<div class="view overlay hm-black-strong">
						<div class="image-container">
							<img src="<?php echo $product->product_image ?>" class="img-fluid center-block" alt="">
						</div>
						<a href="<?php echo base_url('home/details/'.$product->product_id); ?>">
							<div class="mask flex-center">
								<h3>
									<p class="white-text">বিস্তারিত</p>
								</h3>
							</div>
						</a>
						<div class="card-block">
							<a href="<?php echo base_url('home/details/'.$product->product_id); ?>">
								<h4 class="card-title">
									<?php echo $product->product_name;?>
								</h4>
							</a>
						</div>
					</div>

					<?php if($product->discount_percent > 0 ){?>
					<span class="label"><?php echo $product->discount_percent."%";?></span>
					<?php }?>
					<?php 
						echo form_open('home/add_cart'); 
						echo form_hidden('product_id',$product->product_id);
						echo form_hidden('product_name',$product->product_name);
						echo form_hidden('product_image',$product->product_image);
						echo form_hidden('product_price',$product->product_price);
						echo form_hidden('discount',$product->discount_amount);
						echo form_hidden('vat',$product->vat);
						echo form_hidden('quantity',1); ?>
						<div class="cta">
							<p class="quantity">
								<?php echo $product->product_unit." ".$product->unit_name;?>
							</p>
							<p class="price">
								৳
								<?php echo ($product->product_price -  $product->discount_amount);  ?>
								<span><?php if( $product->discount_amount > 0){ echo $product->product_price ;}?></span>
							</p>
							<button type="submit" class="btn btn-elegant btn-block"><i class="fa fa-shopping-basket"></i> &nbsp; কিনুন </button>
						</div>
						<?php echo form_close(); ?>
				</div>
			</div>
			<?php endforeach; }?>
			</div>
		</div>
	</div>












