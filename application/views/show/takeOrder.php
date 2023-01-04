<?php include('header.php'); ?>
<?php include('add-address-modal.php');?>
<?php /*function en2bnNumber ($number){
		$search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"); 
		$replace_array=array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
		$bn_number = str_replace($search_array, $replace_array, $number);
		return $bn_number;
	}*/
	?>
    <div class="row">
        <div class="">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('super_admin/'); ?>">Home</a>
                </li>
                <li class="active">
                    <strong>Add Order</strong>
                </li>
            </ol>
        </div>
    </div>
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
        <div class="col-md-12 card mainCard takeOrder">
            <?php //echo $address['billing_address_id']; ?>
            <?php //echo base_url(); ?>
            <div class="row">
                <div class="col-md-12 addorder">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="section-title st-mdb">
                                Add Order
                            </h5>
                        </div>
                    </div>
                    <hr /><br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" value="<?php echo $info->user_name; ?>" disabled>
                                <?php  
									//echo form_input(['name'=>'user_id', 'class'=>'form-control']);
									//echo form_input([ 'class'=>'form-control', 'value'=>$info->user_name ]);
									
								?>
                                    <label for="form1" class="">Customer</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-form">
                                <?php $attributes = array('class' => 'abcd', 'id' =>'myForm', 'name' =>'myForm');  ?>
                                <?php echo form_open('',$attributes); ?>
                                <?php  
										echo form_input(['name'=>'product_id', 'id'=>'name', 'class'=>'form-control' ]);
										//echo form_input(['name'=>'product', 'class'=>'name']);
										   // echo form_input('product_name','','id="id"'); 
											//echo form_input('product_id','','id=""');  
										?>
                                    <!--<input type="text" class="form-control">-->
                                    <label for="form1" class="">Product</label>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="md-form">
                                <?php echo form_input(['name'=>'bar_code', 'id'=>'bar_code', 'class'=>'form-control' ]); ?>
                                <label for="form1" class="">Bar Code Number</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="md-form">
                                <?php  
										echo form_input(['name'=>'quantity', 'class'=>'form-control','id'=>'quantity' ]);
										
										?>
                                    <!--<input type="text" class="form-control">-->
                                    <label for="form1" class="">Quantity</label>
                                    <div style="" id="quantity_errors" class="warningSize red-text"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <?php //echo form_submit('submit', 'Submit', "class='submit'"); ?>
                            <button type="submit" class="btn btn-default btn-block submit" style="margin-top: 20px;">Add</button>
                        </div>
                    </div>

                    <?php	echo form_close();	?>
                </div>
            </div>
            <br />

            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <div class="well" id="result"></div>
                    </ul>
                </div>
            </div>
            <br />

            <div class="row">
                <div class="col-md-12 pull-right">
                    <a type="button" href="<?php echo base_url('autocomplete/destroy'); ?>" class="btn btn-danger pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">Clear Cart</a>
                    <button class="btn btn-default pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right" id="hideProductTable">Hide Product Table</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="" id="value">
                        <div>
                            <?php $int=0; $total=0; $discount=0;$vat=0; ?>
                            <?php if($cart=$this->cart->contents()){ ?>

                            <table class="table table-bordered" id="productTable">
                                <thead class="table-custom-thead">
                                    <tr>
                                        <th style="text-align:center">#</th>
                                        <th style="text-align:center">পণ্য</th>
                                        <th style="text-align:center">পণ্য বিবরণী</th>
                                        <th style="text-align:center">পরিমাণ </th>
                                        <th style="text-align:center">মূল্য</th>
                                        <th style="text-align:center">উপমোট</th>
                                        <th style="text-align:center">Available</th>
                                        <th style="text-align:center">অপসারণ</th>
                                    </tr>
                                </thead>
                                <tbody class="table-custom-tbody text-xs-center text-sm-center text-md-center text-lg-center">

                                    <?php foreach($cart as $item): $int++;?>
                                    <?php //$quantity=en2bnNumber($item['qty']); ?>
                                    <tr class="" id="my_cart_table_tr">
                                        <td style="width:8%">
                                            <?php echo $int; ?>
                                        </td>
                                        <td style="width:17%">
                                            <div class="clearfix">
                                                <div>
                                                    <img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt="" style="margin:0px auto;">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width:20%">
                                            <div class="clearfix">
                                                <a href="<?php echo base_url('home/details/'.$item['id']); ?>">
                                                    <?php echo $item['name']; ?>
                                                </a>
                                            </div>
                                        </td>

                                        <td style="width:10%">
                                            <!--<div class="quantity clearfix">
													<?php /*
														echo form_open(); 
														echo form_hidden('row_id',$item['rowid']); 
														echo form_hidden('qty',$item['qty']); 
													?>
														<?php //echo form_submit('submit', 'Submit', "class='minus btn btn-sm btn-default'"); ?>
														<button type="submit" class="minus btn btn-sm btn-default" id="minus_btn">-</button>
														<?php	//echo form_close();	?>
															<input type="text" value="<?php echo $quantity; ?>" name="quantity" readonly="">
															<button type="submit" class="plus btn btn-sm btn-default" id="plus_btn">+</button>
															<?php	echo form_close();	*/?>
												</div>-->

                                            <div class="quantity clearfix">
                                                <a type="button" href="<?php echo base_url('autocomplete/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="minus btn btn-sm btn-default">-</a>
                                                <input type="text" value="<?php echo $item['qty']; ?>" name="quantity" readonly="">
                                                <?php if($item['qty']<$item['total_quantity']){ ?>
                                                <a type="button" href="<?php echo base_url('autocomplete/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus btn btn-sm btn-default">+</a>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <?php if($item['discount']>0) { ?>
                                        <td style="width:10%">
                                            <span style="color: red;text-decoration: line-through;"><?php echo $item['price']; ?>৳ </span>
                                            <?php echo ($item['price']-$item['discount']); ?>৳
                                        </td>
                                        <?php } 
											else { ?>
                                            <td style="width:15%">
                                                <?php echo $item['price']; ?>৳</td>
                                            <?php } ?>
                                            <td style="width:5%">
                                                <?php echo ($item['subtotal']-($item['qty']*$item['discount']));?>৳
                                            </td>

                                            <td style="width:5%">
                                                <?php echo $item['total_quantity']; ?>
                                            </td>

                                            <td style="width:15%"><a id="my_cart_table_close" onclick="" href="<?php echo base_url('autocomplete/remove/'.$item['rowid']); ?>"><i class="fa fa-remove"></i></a></td>
                                    </tr>
                                    <?php $total=$total+($item['subtotal']-($item['qty']*$item['discount'])); ?>
                                    <?php $discount=$discount+($item['qty']*$item['discount']); ?>
                                    <?php $vat=$vat+((($item['subtotal']-($item['qty']*$item['discount']))*$item['vat'])/100); ?>
                                    <?php endforeach ;  ?>

                                    <tr class="total">
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td>মোট</td>
                                        <td>
                                            <?php echo $total+$vat; ?>৳</td>
                                    </tr>
                                    <!--<tr class="total">
											<th scope="row"></th>
											<td></td>
											<td></td>
											<td>ডিসকাউন্ট</td>
											<td><?php //echo $discount; ?>৳</td>
										</tr>-->
                                    <tr class="total">
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td>ভ্যাট </td>
                                        <td>
                                            <?php echo $vat; ?>৳</td>
                                    </tr>
                                    <tr class="total">
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td>সর্বমোট</td>
                                        <td>
                                            <?php echo $total+$vat; ?>৳</td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php }  
								else { ?>
                                <div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center m-bottom-fifty">
                                    <div class="alert alert-danger" role="alert">
                                        <p id="my_cart_table">আপনার ঝুড়ি খালি।</p>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row m-top-fifty">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="section-title st-mdb">
                                Add Address
                            </h5>
                        </div>
                    </div>
                    <hr /><br />
                    <div class="row my_cart">
                        <div class="col-md-12" style="margin-top:30px;margin-bottom:60px;">
                            <?php $attributes = array('class' => 'abcd', 'id' => ''); ?>
                            <?php echo form_open('super_admin/addTakeOrder', $attributes);
						
						$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
						$date= $dt->format('Y-m-d H:i:s');
						$user_id=$this->session->userdata('cart_customer');
						$total= $this->cart->total(); 
						//echo $date;
						echo form_hidden('order_date',$date);
						echo form_hidden('user_info_user_id',$user_id); 
						echo form_hidden('confirmed_by',$this->session->userdata('admin_id'));
						echo form_hidden('status_status_id',5); 
						
						
					?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="mdb-select" name="billing_address_id">
							<option value="" disabled selected>Choose your option</option>
							<?php foreach($addresses as $address){ ?>
								<option value="<?php echo $address->adr_id; ?>"><?php echo $address->address_title; ?></option>
							<?php } ?>
							</select>
                                        <label>Billing Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#takeOrderAddAddressModal"><i class="fa fa-plus"></i> Add Billing Address
							</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:56px;">
                                        <select class="mdb-select" name="shipping_address_id">
								<option value="" disabled selected>Choose your option</option>
								<?php foreach($addresses as $address){ ?>
								<option value="<?php echo $address->adr_id; ?>"><?php echo $address->address_title; ?></option>
							<?php } ?>
							</select>
                                        <label>Shipping Address</label>
                                    </div>
                                    <div class="col-md-6" style="margin-top:56px;">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#takeOrderAddAddressModal"><i class="fa fa-plus"></i> Add Shipping Address
							</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:56px;">
                                        <select class="mdb-select" name="order_type">
								<option value="" disabled selected>Choose your option</option>
								<option value="1" >Takeaway</option>
								<option value="2" >Store pickup</option>
								<option value="3" >Home delivery</option>
								
							</select>
                                        <label>Order Type</label>
                                    </div>

                                    <div class="col-md-6" style="margin-top:56px;">
                                        <select class="mdb-select" name="order_payment_type">
								<option value="" disabled selected>Choose your option</option>
								<option value="1" >Cash</option>
								<option value="2" >Wallet</option>					
							</select>
                                        <label>Payment Method</label>
                                    </div>

                                </div>
                                <!--<div class="row">
						<div class="col-md-6">
							<div class="md-form">
								<input placeholder="Select date" type="text" id="date-picker-example" class="form-control datepicker" name="payment_date" >
								<label for="date-picker-example">Delivery Date</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="md-form">
								<input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker" name="payment_time" >
								<label for="input_starttime">Delivery Time</label>
							</div>
						</div>					
					</div> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Done</button>
                                    </div>
                                </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php //include('payment.php'); ?>
	<?php include('footer.php'); ?>