<table class="table table-bordered" id="productTable">
						<thead class="table-custom-thead">
							<tr>
								<th style="text-align:center" >#</th>
								<th style="text-align:center" >Product</th>
								<th style="text-align:center" >Details</th>
								<th style="text-align:center" >Quantity </th>
								<th style="text-align:center" >Price</th>
								<th style="text-align:center" >SubTotal</th>
								<th style="text-align:center" >Available</th>
								<th style="text-align:center" >Remove</th>
							</tr>
						</thead>
						<tbody class="table-custom-tbody text-xs-center text-sm-center text-md-center text-lg-center">
							
							<?php foreach($cart as $item): $int++;?>
							<?php $quantity=en2bnNumber($item['qty']); ?>
							<tr class="" id="my_cart_table_tr">
								<td style="width:10%"><?php echo $int; ?></td>
								<td style="width:10%">
									<div class="clearfix">
										<div>
											<img class="img-fluid" src="<?php echo $item['image']; ?>" width="50" height="50" alt="" style="margin:0px auto;">
										</div>
									</div>
								</td>
								<td style="width:20%">
									<div class="clearfix">
										<a href="<?php echo base_url('home/details/'.$item['id']); ?>"><?php echo $item['name']; ?></a>
									</div>
								</td>
								
								<td style="width:20%">
									<!--<div class="quantity clearfix">
										<?php
											/*echo form_open(); 
											echo form_hidden('row_id',$item['rowid']); 
											echo form_hidden('qty',$item['qty']); 
										?>
										<?php //echo form_submit('submit', 'Submit', "class='minus btn btn-sm btn-default'"); ?>
										<button  type="submit" class="minus btn btn-sm btn-default" id="minus_btn" >-</button>
										<?php	//echo form_close();	?>
										<input type="text" value="<?php echo $quantity; ?>" name="quantity" readonly="">
										<button  type="submit" class="plus btn btn-sm btn-default" id="plus_btn" >+</button>
										<?php	echo form_close();	*/?>
									</div>-->
									<div class="quantity clearfix">
										<a type="button" href="<?php echo base_url('autocomplete/minus_product/'.$item['rowid'].'/'.$item['qty']); ?>" class="minus btn btn-sm btn-default">-</a>
										<input type="text" value="<?php echo $item['qty']; ?>" name="quantity" readonly="">
										<?php if($item['qty']<$item['total_quantity']){ ?>
										<a type="button" href="<?php echo base_url('autocomplete/plus_product/'.$item['rowid'].'/'.$item['qty']); ?>"class="plus btn btn-sm btn-default">+</a>
										<?php } ?>
									</div>
								</td>
								
								<?php if($item['discount']>0) { ?>
								<td style="width:20%">
									<span style="color: red;text-decoration: line-through;"><?php echo $item['price']; ?>৳ </span>
									<?php echo ($item['price']-$item['discount']); ?>৳
								</td>
								<?php } 
								else { ?>
								<td style="width:10%"><?php echo $item['price']; ?>৳</td> <?php } ?>
								<td style="width:5%"><?php echo ($item['subtotal']-($item['qty']*$item['discount'])); ?>৳</td>
								<td style="width:5%"><?php echo $item['total_quantity']; ?></td>
								<td style="width:5%"><a id="my_cart_table_close" onclick="" href="<?php echo base_url('autocomplete/remove/'.$item['rowid']); ?>"><i class="fa fa-remove"></i></a></td>
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
								<td><?php echo $total+$vat; ?>৳</td>
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
								<td><?php echo $vat; ?>৳</td>
							</tr>
							<tr class="total">
								<th scope="row"></th>
								<td></td>
								<td></td>
								<td>সর্বমোট</td>
								<td><?php echo $total+$vat; ?>৳</td>
							</tr>
						</tbody>
					</table>