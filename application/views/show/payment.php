<!-- Payment Modal -->
<div class="modal fade modal-ext" id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
           
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Customer Payment </h3>
            </div>
            
            <!--Body-->
            <div class="modal-body text-xs-left text-sm-left text-md-left text-lg-left">
				<h5 class="totalAmountShow"> </h5>
				<?php echo form_open('super_admin/addPosOrder');  ?>
				<?php 
					$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
					$date= $dt->format('Y-m-d H:i:s');
					$user_id=$this->session->userdata('cart_customer');
					echo form_hidden('order_date',$date); 
					echo form_hidden('delivery_date',$date); 
					echo form_hidden('confirmed_by',$this->session->userdata('admin_id')); 
					echo form_hidden('user_info_user_id',$user_id); 
					echo form_hidden('status_status_id',13); 
					echo form_hidden('order_type',4); 
					
				?>
				<?php
						//$total_price=$total+$vat;
						//echo form_hidden('total_price',$total_price);
						//echo form_hidden('total_discount',$discount);
						
						//echo form_hidden('vat',$vat);
					?>
				<input type="hidden" name="total_price" value="0" id="totalInputVal"/>
				<input type="hidden" name="total_discount" value="0" id="totalDiscountInputVal"/>
                <div class="md-form" style="margin-top:25px;">
                    <?php echo form_input(['name'=>'receved_total', 'class'=>'form-control', 'value'=>set_value('receved_total')]);
						  echo form_error('receved_total'); ?>
                    <label for="form2">Paid Amount</label>
                </div>
				<div class="md-form">
					<?php echo form_input(['name'=>'discount_amount', 'class'=>'form-control', 'value'=>set_value('discount_amount')]);
						  echo form_error('discount_amount'); ?>
					<label for="form2">Discount Amount (if any )</label>
				</div>
				<div class="md-form">
					<select class="mdb-select" name="order_payment_type">
						<option value="" disabled selected>Choose your option</option>
						<option value="1" >Cash</option>
						<option value="2" >Wallet</option>					
					</select>
					<label>Payment Method</label>
				</div>
                <div class="text-xs-center">
                    <button type="submit" class="btn btn-default ">Done</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>