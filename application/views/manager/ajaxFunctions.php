<script>

	$(function(){ 
		/* select Client */

		$('#clientNameID').change(function(){
			var client_id = $('#clientNameID').val();
			
			if(client_id){
				
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "ajaxFunctions/ajax_get_client_info",
					dataType: 'json',
					data: {
					   client_id:client_id
					},
					success: function(res) {
					if (res) {
							if (res.status === true){
								//alert(res.balance);
								$('#hiddenClientID').val(client_id);
								$('#clientPhnID').val(res.client_phn);
								$('#clientAddID').val(res.client_add);
								$('#clientBalanceID').val(res.balance);

								//* for total price *//
								var old_totalPrice=$("#saleSubTotal").val();
								var balance=$("#clientBalanceID").val();
								var additional=$("#additionalID").val();
								var discount=$("#discountID").val();
								var paid=$("#paidID").val();
								var totalBill=((+old_totalPrice)+(+additional))-(+discount);
								var total=(+totalBill)+(+balance);
								$("#totalBillID").val(totalBill);
								$("#grandTotalID").val(total);
								var due=(+total)-(+paid);
								$("#dueId").val(due);
								
							}
							else {
								alert("Pleast Try Again");
							}
						}
					}
				});
			}
			else{
				alert("Please Select Client First");
			}
		});
		/* product Type Change */

		$('#productTypeID').change(function(){
			var type_id = $('#productTypeID').val();
			if(type_id){
				$('.remove_products').remove();
				$('.product_class').val("");
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "ajaxFunctions/ajax_get_all_product_info_by_type",
					dataType: 'json',
					data: {
					   type_id:type_id
					},
					success: function(res) {
					if (res) {
							if (res.status === true){
								var len = res.infos.length;
								for(var i=0;i<len;i++){
									$('#selectProductID')
									.append('<option class="remove_products " value="'+res.infos[i].productBarcode+'"> '+res.infos[i].productBarcode+'=>'+res.infos[i].productName+' </option>');
								}
								
							}
							else {
								//alert("No Floor has Found");
							}
						}
					}
				});
			}
			else{
				alert("Please Select A Bilding First");
			}
		});
		/* add to cart button */
		
		$('#addCartButton').click(function(){
			var productBarcode = $('#selectProductID').val();
			//alert(productBarcode);
			if(productBarcode){
				
				jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "ajaxFunctions/ajax_add_cart",
						dataType: 'json',
						data: {
							productBarcode: productBarcode,
							quantity: 1
						},
						success: function(res) {
							if (res) {
								
								if (res.status === true) {
									//alert("yes");
									$("#tableHeaderID").show();
									//document.getElementById("myForm").reset();
									if(res.past_buy === false){
										
										var product_id = res.product_id;
										var quantity = res.quantity;
										var total_quantity = res.total_quantity;
										var weight = res.weight;
										var price = (res.price*weight)+(+res.additional_cost);
										var name = res.name;
										var barcode = res.barcode;
										var rowid = res.rowid;
										var subtotal = price*quantity;
										//alert(barcode);
										var table = document.getElementById("productTable");
										var table_len = (table.rows.length);
										var row = table.insertRow(table_len).outerHTML = "<tr id='row" + product_id + "' class='active'><td id='serial_row" + table_len + "'>" + 1 + "</td><td id='barcode_row" + table_len + "'>" + barcode + "</td><td id='name_row" + table_len + "'>" + name + "</td><td id='price_row" + product_id + "'>" + weight + res.unit+ "</td><td id='subtotal_row" + product_id + "'>" + subtotal + "</td><td id='remove_row" + table_len + "' style='width:5%;text-align:center;' ><a id='my_cart_table_close' onclick='delete_row(\""+ rowid + "\","+product_id+","+price+")' ><i class='fa fa-remove'></i></a></td></tr>";
										
										//* for total price *//
										var old_totalPrice=$("#saleSubTotal").val();
										//alert(old_totalPrice);
										old_totalPrice=(+old_totalPrice)+(+subtotal);
										$("#saleSubTotal").val(old_totalPrice);
										//* for total price *//
										var old_totalPrice=$("#saleSubTotal").val();
										var balance=$("#clientBalanceID").val();
										var additional=$("#additionalID").val();
										var discount=$("#discountID").val();
										var paid=$("#paidID").val();
										var totalBill=((+old_totalPrice)+(+additional))-(+discount);
										var total=(+totalBill)+(+balance);
										$("#totalBillID").val(totalBill);
										$("#grandTotalID").val(total);
										var due=(+total)-(+paid);
										$("#dueId").val(due);


	
									}
									
								}
								else {
									alert(res.errors);
									jQuery("#quantity_errors").show();
									jQuery("#quantity_errors").html(res.errors);
									
								}
							}
						}
					});
			}
			else{
				alert("Please Select A Product First");
			}
		});
		
		/* Cost Change */

		$('.costChangeID').keyup(function(){
			
			//* for total price *//
			var old_totalPrice=$("#saleSubTotal").val();
			var balance=$("#clientBalanceID").val();
			var additional=$("#additionalID").val();
			var discount=$("#discountID").val();
			var paid=$("#paidID").val();
			var totalBill=((+old_totalPrice)+(+additional))-(+discount);
			var total=(+totalBill)+(+balance);
			$("#totalBillID").val(totalBill);
			$("#grandTotalID").val(total);
			var due=(+total)-(+paid);
			$("#dueId").val(due);
			
		});
		//receive amount

		$('#receivePaymentAmountID').keyup(function(){
			
			var balance=$("#clientBalanceID").val();
			if(balance){
				var receivePaymentAmount=$("#receivePaymentAmountID").val();
				var receiveAmount=$("#receiveAmountID").val(receivePaymentAmount);
				var due=(+balance)-(+receivePaymentAmount);
				$("#currentDueAmountID").val(due);

			}
			else{
				alert('Please Select a Client First');
				$("#receivePaymentAmountID").val("");
			}
			
			
		});
		
	});
</script>
<script type="text/javascript">
		function delete_row(row_id,no,price) {
			//event.preventDefault();
			//alert(price);
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "ajaxFunctions/removeCart",
				dataType: 'json',
				data: {
					row_id: row_id,
					//quantity: quantity,
				},
				success: function(res) {
					if (res) {
						// Show Entered Value
						if (res.status === true) {
							
							
							//* for total price *//
							var old_totalPrice=$("#saleSubTotal").val();
							old_totalPrice=(+old_totalPrice)-(+price);
							$("#saleSubTotal").val(old_totalPrice);
							//* for total price *//
							var old_totalPrice=$("#saleSubTotal").val();
							var balance=$("#clientBalanceID").val();
							var additional=$("#additionalID").val();
							var discount=$("#discountID").val();
							var paid=$("#paidID").val();
							var totalBill=((+old_totalPrice)+(+additional))-(+discount);
							var total=(+totalBill)+(+balance);
							$("#totalBillID").val(totalBill);
							$("#grandTotalID").val(total);
							var due=(+total)-(+paid);
							$("#dueId").val(due);

							document.getElementById("row" + no + "").outerHTML = "";
							var table = document.getElementById("productTable");
							var table_len = (table.rows.length);
							//alert(table_len);
							  //document.getElementById("productTable").outerHTML = "";
							if(table_len==1){
								$("#tableHeaderID").hide();
								//$(".paymentButtonID").hide();
								//$("#emptyCartID").show();
								
							}
							
						} else {
							//jQuery("#quantity_errors").show();
							//jQuery("#quantity_errors").html(res.errors);
						}
					}
				}
			});
			
		}
	</script>
	<script >
		$(function(){ 

			var newPrice=$('#totalnewPriceID').val();
			$('#addedProductPriceTotalID').val(newPrice);
			var newWeight=$('#totalnewWeightID').val();
			$('#addedProductWeightTotalID').val(newWeight);
			var newProduct=$('#totalnewProductID').val();
			$('#addedProductTotalID').val(newProduct);

			var soldPrice=$('#totalsoldPriceID').val();
			//alert(soldPrice);
			$('#soldProductPriceTotalID').val(soldPrice);
			var soldWeight=$('#totalsoldWeightID').val();
			$('#soldProductWeightTotalID').val(soldWeight);
			var soldProduct=$('#totalsoldProductID').val();
			$('#soldProductTotalID').val(soldProduct);
		});
		
	</script>
	<script >
		$(function(){ 

			var cadit=$('#totalCaditID').val();
			$('#totalCaditAmountID').val(cadit);
			
			var debit=$('#totalDebitID').val();
			$('#totalDebitAmountID').val(debit);
			//alert(cadit);
			var balance=(+cadit)-(+debit);
			$('#totalBalanceID').val(balance);

			
		});
		
	</script>
	<script >
		$(function(){ 

			var income=$('#totalIncomeID').val();
			$('#totalIncomeAmountID').val(income);
			
			var expense=$('#totalExpenseID').val();
			$('#totalExpenseAmountID').val(expense);
			//alert(cadit);
			var balance=(+income)-(+expense);
			$('#netTotalBalanceID').val(balance);

			
		});
		
	</script>
	<script >
		$(function(){ 

			var product=$('#IDTotalProduct').val();
			var weight=$('#IDTotalWeight').val();
			var price=$('#IDTotalPrice').val();
			
			$('#TotalProductID').val(product);
			$('#TotalWeightID').val(weight);
			$('#TotalPriceID').val(price);

			
		});
		
	</script>