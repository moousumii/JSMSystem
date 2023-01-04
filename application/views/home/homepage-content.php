
<div class="m-top-25"></div>
		<div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('feedback_successfull'))
					{ ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                    <strong>Success!</strong>
                    <?php echo $this->session->flashdata('feedback_successfull'); ?>
                </div>
                <?php } 
					
					if($this->session->flashdata('feedback_failed'))
					{ ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                    <strong>Oops!</strong>
                    <?php echo $this->session->flashdata('feedback_failed'); ?>
                </div>
                <?php } ?>
            </div>
        </div>
<div class="row">
    <div class="col-md-12">
        <div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half m-bottom-fifty" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view hm-black-slight">
                        <img src="<?php echo base_url('assets/front-end/images/chocolate-milk-wallpaper-2.jpg'); ?>" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view hm-black-slight">
                        <img src="<?php echo base_url('assets/front-end/images/dairy-milk-chocolate-with-beautiful-quotes.jpg'); ?>" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view hm-black-slight">
                        <img src="<?php echo base_url('assets/front-end/images/Food___Bread_rolls_croissants__040482_.jpg'); ?>" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h4 class="h4-responsive" style="padding:10px;background-color:#fff;border-radius:4px;">সকল পণ্য</h4>
            </div>
        </div>
        <div class="row main-products">
            <div class="col-md-12">
                <div class="row">
                    <div class="hl-2-col">

                        <?php foreach($categories as $category): ?>
                        <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-0 col-md-3 col-md-offset-0" id="product-item">
                            <div class="main-card product-card">
                                <div class="view overlay hm-white-slight">
                                    <div class="image-container">
                                        <img src="<?php echo $category->category_image; ?>" class="img-fluid" alt="">
                                    </div>
                                    <a>
                                        <div class="mask"></div>
                                    </a>
                                </div>
                                <div class="card-block text-xs-center text-sm-center text-md-center text-lg-center">
                                    <a href=<?php echo base_url( 'home/products/'.$category->category_id); ?>><?php echo $category->category_name; ?></a>

                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="section photo_gallery">
            <div class="row">
                <div class="col-md-12">
                    <div class="divider-new">
                        <h4 class="h4-responsive">সর্বাধিক বিক্রিত পণ্য</h4>
                    </div>
                </div>
            </div>
            <div class="row most-sold m-top-fifty">
                <div class="col-md-12">
                    <!--Gallery-->
                    <div id="owl-demo-5">
                        <?php foreach ($mostSale as $product): ?>

                        <div class="item">
                            <div class="card product-card">
                                <div class="view overlay hm-bluegrey-strong">
                                    <div class="image-container">
                                        <img src="<?php echo $product->product_image?>" class="img-fluid center-block" alt="">
                                    </div>
                                    <a href=<?php echo base_url( 'home/details/'.$product->product_id); ?>>
										<div class="mask flex-center">
											<h3><p class="white-text">বিস্তারিত</p></h3>
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
									//echo form_hidden('product_id',$product->product_id);
									//echo form_hidden('quantity',1);
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
                                        <p class="quantity">
                                            <?php echo $product->product_unit." ".$product->unit_name;?>
                                        </p>
                                        <p class="price">৳
                                            <?php echo ($product->product_price -  $product->discount_amount);  ?>
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
        <!--/Featured cards-->
    </div>
</div>
