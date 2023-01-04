			</div>
		</div>
	</main>


	<!--Footer-->
	<footer class="page-footer center-on-small-only elegant-color">

		<!--Copyright-->
		<div class="footer-copyright">
			<div class="container-fluid">
				<div class="col-md-8 copyright">Copyright © 2016 <a href="#"> কেনাকাটা.কম </a></div>
				<div class="col-md-4 developer">Developed by <a href="#"><b>StarLab IT.</b></a></div>

			</div>
		</div>
		<!--/.Copyright-->

	</footer>
	<!--/Footer-->

	<!--  Script -->

	<script src="<?php echo base_url('assets/back-end/js/jQuery-1.11.0.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/tether.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/mdb.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/table.js'); ?>"></script>

	<script type="text/javascript">
		/*$(document).ready(function(){
						var i=1;
						var a = ""
						$(".submit").click(function(){
							$('#addr'+i).html(
							"<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>"
							);
							
							$('#productTable').append('<tr id="addr'+(i+1)+'"></tr>');
							i++; 
						});
					});*/
	</script>

	<script type="text/javascript">
		var windowHeight = $(window).height();
		var navHeight = 63;
		var padTwenty = 22;
		var result = windowHeight - navHeight;
		$(document).ready(function() {
			$('main').css('min-height', result);
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#hideProductTable').click(function() {
				$('#productTable').toggle();
			});
		});
	</script>

	<script type="text/javascript">
		$(this).ready(function() {
			$("#name").autocomplete({

				minLength: 1,
				source: function(req, add) {
					$.ajax({
						//url: "http://[::1]/kenakata/autocomplete/lookup",  
						url: "<?php echo base_url(); ?>" + "autocomplete/lookup",
						dataType: 'json',
						type: 'POST',
						data: req,
						success: function(data) {
							if (data.response == "true") {
								add(data.message);
								//var a=$("#name").val();
								//$(".name").val(a);
								//$(".name").val( data["message"][1]["value"] );

								console.log(data);
							}
						},
					});
				},
			});
		});
	</script>
	
	<script type="text/javascript">
		$(this).ready(function() {
			$("#bar_code").autocomplete({

				minLength: 1,
				source: function(req, add) {
					$.ajax({
						url: "<?php echo base_url(); ?>" + "autocomplete/bar_code",
						dataType: 'json',
						type: 'POST',
						data: req,
						success: function(data) {
							if (data.response == "true") {
								add(data.message);
								//var a=$("#name").val();
								//$(".name").val(a);
								//$(".name").val( data["message"][1]["value"] );

								// console.log(data);
							}
						},
					});
				},

			});
		});
	</script>
	<script>
		// SideNav Init
		$(".button-collapse").sideNav();
		// Tooltips init        
		$('[data-toggle="tooltip"]').tooltip()
	</script>
	<script type="text/javascript">
		$('.datepicker').pickadate();
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.mdb-select').material_select();
		});
	</script>
	<script>
		$(window).load(function() {
		 
		 <?php 
				if($cart=$this->cart->contents()){
					$rows = count($this->cart->contents()); ?>
					var count = <?php echo $rows ?>;
					$("#tableHeaderID").show();
					$(".paymentButtonID").show();
					$("#emptyCartID").hide();
					var totalPrice=$("#totalInputVal").val();
					var totalDiscount=$("#totalDiscountInputVal").val();
					<?php foreach($cart as $item): $int++;?>
					//alert(totalPrice);
					var product_id = <?php echo $item['id'] ?>;
					var quantity = <?php echo $item['qty'] ?>;
					var price = <?php echo $item['price'] ?>;
					var name =" <?php echo $item['name'] ?>";
					var product_discount = <?php echo $item['discount'] ?>;
					var total_quantity = <?php echo $item['total_quantity'] ?>;
					var image = "<?php echo $item['image'] ?>";
					var vat =<?php echo $item['vat'] ?>;
					var rowid ="<?php echo $item['rowid'] ?>";
					var sell_price=price-product_discount;
					var subtotal = sell_price * quantity;
					var subtotalDiscount = product_discount * quantity;
					var table = document.getElementById("productTable");
					var table_len = (table.rows.length);
					totalPrice=(+subtotal)+(+totalPrice);
					totalDiscount=(+subtotalDiscount)+(+totalDiscount);
					 
					var row = table.insertRow(table_len).outerHTML = "<tr id='row" + product_id + "'><td id='image_row" + table_len + "'><div><img src='" + image + "' class='img-fluid' width='50' height='50' style='margin:0px auto;' /></div></td><td id='name_row" + table_len + "'>" + name + "</td><td id='quantity_row" + table_len + "'><div class='quantity clearfix'> <button type='button' class='minus btn btn-sm btn-info' onclick='minusQuantity(\""+ rowid + "\","+product_id+","+sell_price+","+product_discount+")'><i class='fa fa-minus'></i></button> <input type='number' name='quantity' value='"+quantity+"' class='quantity' id='qty" + product_id + "' readonly='' /> <button type='button' class='plus btn btn-sm btn-info' onclick='plusQuantity(\""+ rowid + "\","+total_quantity+","+product_id+","+sell_price+","+product_discount+")'><i class='fa fa-plus'></i></button></div></td><td id='price_row" + table_len + "'><span style='color: red;text-decoration: line-through;' id='mainprice"+product_id+"' >"+price+ " ৳ </span>" + sell_price + "  ৳</td><td id='subTotal_row" + table_len + "'><div id='subtotal" + product_id + "'>"+subtotal+ " ৳</div></td><td id='available_row" + table_len + "'>" + total_quantity + "</td><td id='remove_row" + table_len + "' style='width:5%' ><a id='my_cart_table_close' onclick='delete_row(\""+ rowid + "\","+product_id+","+product_id+","+sell_price+","+product_discount+")' ><i class='fa fa-remove'></i></a></td></tr>";
					if(product_discount<1){
						var priceid="mainprice"+product_id;
						$("#"+priceid).hide();
												
					}
					<?php endforeach ; ?>
					$("#totalInputVal").val(totalPrice);
					$("#totalDiscountInputVal").val(totalDiscount);
					$(".totalAmountShow").html("Total Amount: "+totalPrice+" ৳");
				<?php } ?>
				 //alert(totalPrice);
				
		});
	</script>

	<script type="text/javascript">
		// Ajax post
		$(document).ready(function() {
			$(".submit").click(function(event) {
				event.preventDefault();
				var product_id = $("input#name").val();
				var quantity = $("input#quantity").val();
				var bar_code = $("input#bar_code").val();
				if(product_id || bar_code){
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "autocomplete/add_cart",
						dataType: 'json',
						data: {
							product_id: product_id,
							quantity: quantity,
							bar_code: bar_code
						},
						success: function(res) {
							if (res) {
								
								if (res.status === true) {
									var totalPrice=$("#totalInputVal").val();
									var totalDiscount=$("#totalDiscountInputVal").val();
									//alert(totalDiscount);
									// Show Entered Value
									$("#tableHeaderID").show();
									$(".paymentButtonID").show();
									$("#emptyCartID").hide();
									jQuery("#quantity_errors").hide();
									document.getElementById("myForm").reset();
									if(res.past_buy === true){
										var product_id = res.product_id;
										var quantity = res.quantity;
										var price = res.price;
										var product_discount = res.discount;
										var sell_price=price-product_discount;
										var subtotal = sell_price * quantity;
										var subtotalDiscount = product_discount * quantity;
										var qid="qty"+product_id;
										var subid="subtotal"+product_id;
										var old_qty=$("#"+qid).val();
										old_discount=old_qty*product_discount;
										old_qty=old_qty*sell_price;
										//alert(old_discount);
										totalDiscount=(+totalDiscount)-(+old_discount);
										totalDiscount=(+subtotalDiscount)+(+totalDiscount);
										totalPrice=(+totalPrice)-(+old_qty);
										totalPrice=(+subtotal)+(+totalPrice);
										$("#"+qid).val(quantity);
										$("#"+subid).html(subtotal);
										
									}
									else{
										var product_id = res.product_id;
										var quantity = res.quantity;
										var price = res.price;
										var name = res.name;
										var product_discount = res.discount;
										var total_quantity = res.total_quantity;
										var image = res.image;
										var vat = res.vat;
										var rowid = res.rowid;
										var sell_price=price-product_discount;
										var subtotal = sell_price * quantity;
										var subtotalDiscount = quantity *product_discount;
										//alert(subtotalDiscount);
										var table = document.getElementById("productTable");
										var table_len = (table.rows.length);
										//alert(subtotalDiscount);
										totalPrice=(+subtotal)+(+totalPrice);
										totalDiscount=(+subtotalDiscount)+(+totalDiscount);
										//alert(table_len);
										var row = table.insertRow(table_len).outerHTML = "<tr id='row" + product_id + "'><td id='image_row" + table_len + "'><div><img src='" + image + "' class='img-fluid' width='50' height='50' style='margin:0px auto;' /></div></td><td id='name_row" + table_len + "'>" + name + "</td><td id='quantity_row" + table_len + "'><div class='quantity clearfix'> <button type='button' class='minus btn btn-sm btn-info' onclick='minusQuantity(\""+ rowid + "\","+product_id+","+sell_price+","+product_discount+")'><i class='fa fa-minus'></i></button> <input type='number' name='quantity' value='"+quantity+"' class='quantity' id='qty" + product_id + "' readonly='' /> <button type='button' class='plus btn btn-sm btn-info' onclick='plusQuantity(\""+ rowid + "\","+total_quantity+","+product_id+","+sell_price+","+product_discount+")'><i class='fa fa-plus'></i></button></div></td><td id='price_row" + table_len + "'><span style='color: red;text-decoration: line-through;' id='mainprice"+product_id+"' >"+price+ " ৳ </span>" + sell_price + " ৳</td><td id='subTotal_row" + table_len + "'><div id='subtotal" + product_id + "'>"+subtotal+ "  ৳</div></td><td id='available_row" + table_len + "'>" + total_quantity + "</td><td id='remove_row" + table_len + "' style='width:5%' ><a id='my_cart_table_close' onclick='delete_row(\""+ rowid + "\","+product_id+","+sell_price+","+product_discount+")' ><i class='fa fa-remove'></i></a></td></tr>";
										//$("#value").load(window.location + " #value");
										if(res.discount<1){
											var priceid="mainprice"+product_id;
											$("#"+priceid).hide();
											
											
										}
									}
									$("#totalDiscountInputVal").val(totalDiscount);
									$("#totalInputVal").val(totalPrice);
									$(".totalAmountShow").html("Total Amount: "+totalPrice+" ৳");

								} else {
									jQuery("#quantity_errors").show();
									jQuery("#quantity_errors").html(res.errors);
								}
							}
						}
					});
				}
			});
		});
	</script>
	<script type="text/javascript">// Plus Quantity
			function plusQuantity(row_id,total_qty,len,price,discount){
				//alert(total_qty);
				
				var qid="qty"+len;
				var subid="subtotal"+len;
				var input_val = $("#"+qid).val();
				input_val=++input_val;
				var sub_total=input_val*price;
				  //alert(sub_total);
				 // alert(input_val);
				if(total_qty>=input_val){
					//event.preventDefault();
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "autocomplete/plus_product",
						dataType: 'json',
						data: {
							row_id: row_id,
							qty: input_val,
						},
						success: function(res) {
							if (res) {
								// Show Entered Value
								if (res.status === true) {
									$("#"+qid).val(input_val);
									$("#"+subid).html(sub_total);
									var totalPrice=$("#totalInputVal").val();
									totalPrice=(+price)+(+totalPrice);
									$("#totalInputVal").val(totalPrice);
									$(".totalAmountShow").html("Total Amount: "+totalPrice+" ৳");
									var totalDiscount=$("#totalDiscountInputVal").val();
									totalDiscount=(+discount)+(+totalDiscount);
									$("#totalDiscountInputVal").val(totalDiscount);
									
								} else {
									//jQuery("#quantity_errors").show();
									//jQuery("#quantity_errors").html(res.errors);
								}
							}
						}
					});
					
				}
			}
	</script>
	<script type="text/javascript">// Plus Quantity
			function minusQuantity(row_id,len,price,discount){
				//event.preventDefault();
				var qid="qty"+len;
				var subid="subtotal"+len;
				var input_val = $("#"+qid).val();
				input_val=--input_val;
				var sub_total=input_val*price;
				if(input_val>0){
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "autocomplete/minus_product",
						dataType: 'json',
						data: {
							row_id: row_id,
							qty: input_val,
						},
						success: function(res) {
							if (res) {
								// Show Entered Value
								if (res.status === true) {
									$("#"+qid).val(input_val);
									$("#"+subid).html(sub_total);
									var totalPrice=$("#totalInputVal").val();
									totalPrice=(+totalPrice)-(+price);
									$("#totalInputVal").val(totalPrice);
									$(".totalAmountShow").html("Total Amount: "+totalPrice+" ৳");
									var totalDiscount=$("#totalDiscountInputVal").val();
									totalDiscount=(+totalDiscount)-(+discount);
									$("#totalDiscountInputVal").val(totalDiscount);
									
								} else {
									//jQuery("#quantity_errors").show();
									//jQuery("#quantity_errors").html(res.errors);
								}
							}
						}
					});
					
				}
			}
	</script>
	<script type="text/javascript">
		function delete_row(row_id,no,price,discount) {
			//event.preventDefault();
			//alert(discount);
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "autocomplete/remove",
				dataType: 'json',
				data: {
					row_id: row_id,
					//quantity: quantity,
				},
				success: function(res) {
					if (res) {
						// Show Entered Value
						if (res.status === true) {
							
							var qid="qty"+no;
							var input_qty = $("#"+qid).val();
							//alert(input_qty);
							var sub_total=(+input_qty)*price;
							var sub_totalDiscount=(+input_qty)*discount;
							//alert(sub_totalDiscount);
							var totalDiscount=$("#totalDiscountInputVal").val();
							//alert(totalDiscount);
							totalDiscount=(+totalDiscount)-(+sub_totalDiscount);
							//alert(totalDiscount);
							$("#totalDiscountInputVal").val(totalDiscount);
							var totalPrice=$("#totalInputVal").val();
							totalPrice=(+totalPrice)-(+sub_total);
							$("#totalInputVal").val(totalPrice);
							$(".totalAmountShow").html("Total Amount: "+totalPrice+" ৳");
							document.getElementById("row" + no + "").outerHTML = "";
							var table = document.getElementById("productTable");
							var table_len = (table.rows.length);
							//alert(table_len);
							  //document.getElementById("productTable").outerHTML = "";
							if(table_len==1){
								$("#tableHeaderID").hide();
								$(".paymentButtonID").hide();
								$("#emptyCartID").show();
								
							}
							
						} else {
							jQuery("#quantity_errors").show();
							jQuery("#quantity_errors").html(res.errors);
						}
					}
				}
			});
			
		}
	</script>
	<script type="text/javascript">
		function clearCart() {
			//event.preventDefault();
			//alert("hi");
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "autocomplete/destroy",
				dataType: 'json',
				data: {
					//row_id: row_id,
					//quantity: quantity,
				},
				success: function(res) {
					if (res) {
						// Show Entered Value
						if (res.status === true) {
							//document.getElementById("row" + no + "").outerHTML = "";
							/*document.getElementById("productTable")
							.outerHTML = "";*/
							var table = document.getElementById("productTable");
							var table_len = (table.rows.length)-1;
							$("table tr").slice(-table_len).remove();
							$("#tableHeaderID").hide();
							$(".paymentButtonID").hide();
							$("#emptyCartID").show();
							$("#totalDiscountInputVal").val(0);
							$("#totalInputVal").val(0);
							$(".totalAmountShow").html("Total Amount: 0 ৳");
							
							
						} else {
							//jQuery("#quantity_errors").show();
							//jQuery("#quantity_errors").html(res.errors);
						}
					}
				}
			});			
		}
	</script>
	<script type="text/javascript">
		function newwin(y) {
			alert(y);
			var row_id = y;
			var qty = 1;
			event.preventDefault();
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "autocomplete/minus_product",
				dataType: 'json',
				data: {
					row_id: row_id,
					qty: qty
				},
				success: function(res) {
					if (res) {
						// Show Entered Value
						if (res.status === true) {
							alert("Product does  exist");
							//jQuery("div#value").html(res.cart);
							//jQuery("div#value").show();
							$("#value").load(window.location + " #value");
						} else {
							//jQuery("div#result").show();
							//alert("Product does not exist");
							jQuery("div#value").html(cart);
							//jQuery("div#value_pwd").html(res.pwd);
						}
					}
				}
			});
		}
	</script>
	<script type="text/javascript">
		// Ajax post
		$(document).ready(function() {
			$("#minus_btn").click(function(event) {
				event.preventDefault();
				var row_id = $("input[name=row_id]").val();
				var qty = $("input[name=qty]").val();
				alert(row_id);
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "autocomplete/minus_product",
					dataType: 'json',
					data: {
						row_id: row_id,
						qty: qty
					},
					success: function(res) {
						if (res) {
							// Show Entered Value
							if (res.status === true) {
								alert("Product does  exist");
								//jQuery("div#value").html(res.cart);
								//jQuery("div#value").show();
								$("#value").load(window.location + " #value");
							} else {
								//jQuery("div#result").show();
								//alert("Product does not exist");
								jQuery("div#value").html(cart);
								//jQuery("div#value_pwd").html(res.pwd);
							}
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		// Ajax post
		$(document).ready(function() {
			$("#plus_btn").click(function(event) {
				event.preventDefault();
				var row_id = $("input[name=row_id]").val();
				var qty = $("input[name=qty]").val();
				//alert(row_id);
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "autocomplete/plus_product",
					dataType: 'json',
					data: {
						row_id: row_id,
						qty: qty
					},
					success: function(res) {
						if (res) {
							// Show Entered Value
							if (res.status === true) {
								//alert("Product does  exist");
								//jQuery("div#value").html(res.cart);
								//jQuery("div#value").show();
								$("#value").load(window.location + " #value");
							}

						}
					}
				});
			});
		});
	</script>
	</body>

</html>