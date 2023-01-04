<?php include('header_account.php');?>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url('super_admin/'); ?>">Home</a>
                        </li>
                        <li class="active">
                            <strong>Edit Order</strong>
                        </li>
                    </ol>
                    <div class="divider-new">
                        <h4 class="h4-responsive">ঝুড়ি</h4>
                    </div>

                </div>
            </div>

            <div class="row my_cart">
                <div class="col-md-12">
                    <?php if($cart=$this->cart->contents()){ ?>
                    <table class="table table-bordered">
                        <br />
                        <thead class="table-custom-thead text-xs-center text-sm-center text-md-center text-lg-center ">
                            <tr>
                                <th> পণ্য</th>
                                <th>পণ্যের নাম</th>
                                <th>পরিমাণ </th>
                                <th>মূল্য</th>
                                <th>উপমোট</th>
                                <th>সরিয়ে দিন</th>
                            </tr>
                        </thead>
                        <tbody class="table-custom-tbody">
                            <?php $int=0; ?>
                            <?php foreach($cart as $item): $int++;?>
                            <tr class="" id="my_cart_table_tr">
                                <!--<th scope="row"><?php //echo $int; ?></th>-->
                                <td><img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt=""></td>
                                <td>
                                    <div class="clearfix">
                                        <a href="<?php echo base_url('home/details/'.$item['id']); ?>">
                                            <?php echo $item['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td style="width:18%">
                                    <div class="quantity clearfix">
                                        <!--<button type="button" class="minus btn btn-sm btn-default">-</button>-->
                                        <a type="button" href="<?php echo base_url('home/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus btn btn-sm btn-default">-</a>
                                        <input type="text" value="<?php echo $item['qty']; ?>" name="quantity" readonly="">
                                        <?php if($item['qty'] < $item['total_quantity']) { ?>
                                        <a type="button" href="<?php echo base_url('home/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus btn btn-sm btn-default">+</a>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $item['price']; ?>$</td>
                                <td>
                                    <?php echo $item['subtotal']; ?>$</td>
                                <td><a id="my_cart_table_close" onclick="" href="<?php echo base_url('home/remove/'.$item['rowid']); ?>"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <?php endforeach ;  ?>
                            <!--<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">2</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/dairy-milk-chocolate-with-beautiful-quotes.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">3</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/Food___Bread_rolls_croissants__040482_.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">4</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/4241007-fruit.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">1</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/4241007-fruit.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">2</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/dairy-milk-chocolate-with-beautiful-quotes.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">3</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/Food___Bread_rolls_croissants__040482_.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr>
						<tr class="table-success" id="my_cart_table_tr">
							<th scope="row">4</th>
							<td>
								<div class="clearfix">
									<div>
										<img class="img-fluid" src="<?php echo base_url('assets/front-end/images/4241007-fruit.jpg'); ?>" width="50" height="50" alt="">
									</div>
									<a href="#">পণ্যের নাম</a>
								</div>
							</td>
							<td style="width:18%">
								<div class="quantity clearfix">
									<button class="minus">-</button>
									<input type="text" value="1" name="" readonly="">
									<button class="plus">+</button>
								</div>
							</td>
							<td>100$</td>
							<td><a id="my_cart_table_close" onclick="closeTr()"><i class="fa fa-remove"></i></a></td>
						</tr> -->

                            <tr class="total">
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td>মোট</td>
                                <td>
                                    <?php echo $this->cart->total(); ?>$</td>
                            </tr>
                            <tr class="total">
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td>ডিসকাউন্ট</td>
                                <td>400$</td>
                            </tr>
                            <tr class="total">
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td>ভ্যাট </td>
                                <td>400$</td>
                            </tr>
                            <tr class="total">
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td>সর্বমোট</td>
                                <td>400$</td>
                            </tr>


                        </tbody>
                    </table>
                    <?php }  
						else { ?>
                    <p id="my_cart_table">আপনার ঝুড়ি খালি।</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modals-->

<?php include('contact-us-modal.php');?>
<?php include('login-register-modal.php');?>
<?php include('my-cart-modal.php');?>
<?php include('product-details-modal.php');?>
<?php include('add-address-modal.php');?>

<!--/Modals-->
<?php include('footer.php');?>