<?php include('header.php'); ?>
<?php function en2bnNumber ($number){
		$search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"); 
		$replace_array=array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
		$bn_number = str_replace($search_array, $replace_array, $number);
		return $bn_number;
	}
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
	<?php $int=0; $total=0; $discount=0;$vat=0; ?>
	<?php //echo base_url(); ?>
	<div class="">
		<div class="row show">
			<div class="col-md-12 card mainCard addorder">
				<div class="row">
					<div class="col-md-12">
						<h5 class="section-title st-mdb">
							Add Order
						</h5>
					</div>
				</div>
				<hr /><br />
				<div class="row">
					<div class="col-md-12 addorder">
						<div class="md-form">
							<input type="text" id="form1" class="form-control" value="<?php echo $info->user_name; ?>" disabled>
							<?php  
								//echo form_input(['name'=>'user_id', 'class'=>'form-control']);
								//echo form_input(['name'=>'user_id', 'class'=>'form-control', 'value'=>$info->user_name ]);
								
							?> 
							<label for="form1" class="">Customer</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="md-form">
							<?php $attributes = array('class' => 'abcd', 'id' =>'myForm', 'name' =>'myForm'); ?>
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
						<button type="submit" class="btn btn-default btn-block submit" style="margin-top:20px;">Add</button>
						<?php	echo form_close();	?>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-md-12">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-payment"><i class="fa fa-plus"></i> Payment
						</button>
					</div>
				</div>-->
			</div>
			<br />
			<ul>  
				<div class="well" id="result"></div>  
			</ul>
			<div class="row paymentButtonID" id="" style="display:none" >
				<div class="col-md-12">
					<a  type="button"  onClick="clearCart()"  class="btn btn-danger pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">Clear Cart</a>
					<button class="btn btn-default pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right" id="hideProductTable">Hide Product Table</button>
				</div>
			</div>
			<div class="" id="value">
				<div class="col-md-12 card mainCard">
					<?php //if($cart=$this->cart->contents()){ ?>
					<table class="table table-bordered" id="productTable">
						<thead class="table-custom-thead">
							<tr id="tableHeaderID" style="display:none" >
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
							
						</tbody>
					</table>
					
					<div class="row paymentButtonID" id="" style="display:none">
						<div class="col-md-6 col-md-offset-6">
							<div class="row">
								<div class="col-md-8 text-xs-right text-sm-right text-md-right text-lg-right"><h5 class="totalAmountShow" style="margin-top:15px;font-weight:700;"> </h5></div>
								<div class="col-md-4 text-xs-right text-sm-right text-md-right text-lg-right"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-payment"><i class="fa fa-plus"></i> Payment
								</button>
								<?php include('payment.php'); ?></div>	
							</div>								
						</div>
					</div>
					
					<?php //}  
					//else { ?>
						<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center m-bottom-fifty" id="emptyCartID">
							<div class="alert alert-danger" role="alert"><p id="my_cart_table" >আপনার ঝুড়ি খালি।</p></div>
						</div>
					<?php //} ?>
				</div>
				<?php //include('payment.php'); ?>
				<?php //echo $total; ?>
			</div>
		
		</div>
	</div>
<?php include('footer.php'); ?>