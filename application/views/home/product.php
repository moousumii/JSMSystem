<?php
if(!is_array($products)){
	return;
}	
	$t=date('Y-m-d h:m:s');
	
//  exit();?>
	<div class="m-top-25"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="">
				<h5 class="all-title">SubCategory Name</h5>
				<hr />
			</div>
		</div>
	</div>
	
	<div class="row products m-top-25 m-bottom-25">
        <div class="col-md-12">
        	<div class="row">
				<div class="">
					<?php foreach ($products as $product ): 
        //print_r($product)
        ?>

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 col-xl-2" id="product-item">
            <div class="card product-card">
                <div class="view overlay hm-bluegrey-strong">
                    <div class="image-container">
						<img src="<?php echo $product->product_image ?>" class="img-fluid center-block" alt="">
					</div>
                    <a href="<?php echo base_url('home/details/'.$product->product_id); ?>">
						<div class="mask flex-center">
							<h3><p class="white-text">বিস্তারিত</p></h3>
						</div>
					</a>
                </div>
				
					<div class="card-block">
						<a href="<?php echo base_url('home/details/'.$product->product_id); ?>"></a>
						<h4 class="card-title"><?php echo $product->product_name;?></h4>
					</div>
                <?php if($product->discount_percent > 0 ){?>
                	<span class="label"><?php echo $product->discount_percent."%";?></span>
                <?php }?>

                <?php
					echo form_open('home/add_cart'); 
					echo form_hidden('product_id',$product->product_id);
					echo form_hidden('product_name',$product->product_name);
					echo form_hidden('total_quantity',$product->product_quantity);
					echo form_hidden('product_image',$product->product_image);
					echo form_hidden('product_price',$product->product_price);
					echo form_hidden('discount',$product->discount_amount);
					echo form_hidden('vat',$product->vat);
					echo form_hidden('quantity',1);
					echo form_hidden('sourceUrl',uri_string());
				?>
                <div class="cta">
					<p class="quantity"><?php echo $product->product_unit." ".$product->unit_name;?></p>
					<p class="price">৳<?php echo ($product->product_price -  $product->discount_amount);  ?>
					  <span><?php if( $product->discount_amount > 0){ echo $product->product_price ;}?></span>
					</p>
					<button type="submit" class="btn btn-info btn-block"><i class="fa fa-shopping-basket"></i> &nbsp; কিনুন </button>
				</div>
				<?php echo form_close(); ?>
        	</div>
        </div>
        <?php endforeach; ?>
				</div>
			</div>
        </div>

	</div>
	