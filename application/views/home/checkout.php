<?php include('header_account.php');?>
	<div class="row m-top-fifty">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
				</li>
				<li class="active">
					<strong>চেকআউট</strong>
				</li>
			</ol>
			<div class="divider-new">
				<h4 class="h4-responsive">চেকআউট</h4>
			</div>
		</div>
	</div>
<div class="row my_cart">
	<div class="col-md-10 col-md-offset-1" style="margin-top:30px;margin-bottom:60px;">
		<?php $attributes = array('class' => 'abcd', 'id' => ''); ?>
		<?php echo form_open('home/store_order', $attributes);
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$date= $dt->format('Y-m-d h:i:s');
			$user_id=$this->session->userdata('customer');
			$total= $this->cart->total(); 
			//echo $date;
			echo form_hidden('order_date',$date); 
			echo form_hidden('user_info_user_id',$user_id); 
			echo form_hidden('status_status_id',1); 
			
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
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-address"><i class="fa fa-plus"></i> Add Billing Address
				</button>
			</div>
		</div>
		<div class="row" >
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
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add-address"><i class="fa fa-plus"></i> Add Shipping Address
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
		</div>
		
		<div class="row">
			<div class="col-md-12" style="margin-top:30px;">
				<button type="button" class="btn btn-primary" id="my_cart_table_button">See Your Products</button>
				<button type="submit" class="btn btn-default">Check Out</button>
			</div>
		</div>
	</div>
	<?php //echo form_close(); ?>
	
    <div class="col-md-10 col-md-offset-1">
		<?php if($cart=$this->cart->contents()){ ?>
			<table class="table table-bordered" id="my_cart_table">
				<br />
				<thead class="table-info text-md-center">
					<tr>
						<th>#</th>
						<th>পণ্য</th>
						<th>পরিমাণ </th>
						<th>মূল্য</th>
						<th>উপমোট</th>
						<th>সরিয়ে দিন</th>
					</tr>
				</thead>
				<tbody>
					<?php $int=0; $total=0; $discount=0;$vat=0; ?>
					<?php foreach($cart as $item): $int++;?>
					<tr class="table-success" id="my_cart_table_tr">
						<th scope="row"><?php echo $int; ?></th>
						<td>
							<div class="clearfix">
								<div>
									<img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt="">
								</div>
								<a href="<?php echo base_url('home/details/'.$item['id']); ?>"><?php echo $item['name']; ?></a>
							</div>
						</td>
						<td style="width:18%">
							<div class="quantity clearfix">
								<a href="<?php echo base_url('home/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus" class="minus">-</a>
								<input type="text" value="<?php echo $item['qty']; ?>" name="" readonly="">
								<a href="<?php echo base_url('home/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="plus" class="plus">+</a>
							</div>
						</td>
						<?php if($item['discount']>0) { ?>
						<td>
							<span style="color: red;text-decoration: line-through;"><?php echo $item['price']; ?>$ </span>
							<?php echo ($item['price']-$item['discount']); ?>৳
						</td>
						<?php } 
						else { ?>
						<td> <?php echo $item['price']; ?>৳	</td> <?php } ?>
						<td><?php echo ($item['subtotal']-($item['qty']*$item['discount'])); ?>৳</td>
						<td><a id="my_cart_table_close" onclick="" href="<?php echo base_url('home/remove/'.$item['rowid']); ?>"><i class="fa fa-remove"></i></a></td>
						<?php $total=$total+($item['subtotal']-($item['qty']*$item['discount'])); ?>
						<?php $discount=$discount+($item['qty']*$item['discount']); ?>
						<?php $vat=$vat+((($item['subtotal']-($item['qty']*$item['discount']))*$item['vat'])/100); ?>
						
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
						<td><?php echo $this->cart->total(); ?>৳</td>
					</tr>
					<tr class="total">
						<th scope="row"></th>
						<td></td>
						<td></td>
						<td>ডিসকাউন্ট</td>
						<td><?php echo $discount; ?>৳</td>
					</tr>
					<tr class="total">
						<th scope="row"></th>
						<td></td>
						<td></td>
						<td>ভ্যাট </td>
						<td><?php echo $vat; ?>৳</td>
					</tr>
					<tr class="total">
						<th scope="row"></th>
						<td></td>
						<td></td>
						<td>সর্বমোট</td>
						<td><?php echo $total+$vat; ?>৳</td>
					</tr>
					<?php
						$total_price=$total+$vat;
						echo form_hidden('total_price',$total_price);
						echo form_hidden('total_discount',$discount);
						echo form_close();
					?>
					
				</tbody>
			</table>
		<?php }  
		else { ?>
			<p id="my_cart_table" >আপনার ঝুড়ি খালি।</p>
		<?php } ?>
	</div>
</div>


<!--Modals-->

	<?php include('contact-us-modal.php');?>
	<?php include('login-register-modal.php');?>
	<?php include('add-address-modal.php');?>

<!--/Modals-->
<?php include('footer.php');?>