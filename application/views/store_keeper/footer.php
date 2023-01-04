		
		
		
		</div>
    </div>

    <!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/table.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-barcode.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
	
	<script type="text/javascript">
		$('.forselect2').select2();
	</script>
	<script>
		$(document).ready(function(){
			$('.showreadonly').hide();
		});
	</script>
	
	<script type="text/javascript">
		$(function(){
			$('#removeReadonlyButton').click(function(){
				//alert('hm');
				$('.removeReadonly').removeAttr('readonly', 'readonly');
				$('#removeReadonlyButton').css('display','none');
				$('.showreadonly').show();
				$('.hidereadonly').hide();
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			$('#addReadonlyButton').click(function(){
				//alert('hm');
				$('.removeReadonly').attr('readonly', 'readonly');
				$('#removeReadonlyButton').show();
				$('.showreadonly').hide();
				$('.hidereadonly').show();
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$(".addProductID").change(function(event){
				//alert("The text has been changed.");
				var product_id = $("#select2").val();
				//alert(product_id);
				jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "storeKeeper/ajax_productInfoByID",
                    dataType: 'json',
                    data: {
                       product_id:product_id
                    },
                    success: function(res) {
					if (res) {
                            if (res.status === true){
								//alert("YES");
								$("#addproductSupplierName").val(res.productSupplierName);
								$("#addproductGroupName").val(res.productGroupName);
								$("#addproductGroupName").val(res.productGroupName);
								$("#addproductPurchasePrice").val(res.productPurchasePrice);
								$("#addproductSalePrice").val(res.productSalePrice);
								$("#addproductQuantity").val(res.productQuantity);
							}
                            else {
								
                            }
                        }
                    }
                });
			});
		});
	</script>
	
	<script>
		$(function(){
			$("#addBarcodePrintbutton").click(function(event){
				event.preventDefault();
				//alert("The text has been changed.");
				
				var product_id=$(".barcodeProductID").val();
				var productQuantity=$(".barcodeProductQuantity").val();
				if(!productQuantity){
					productQuantity=1;
				}
				//alert(product_id);
				jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "storeKeeper/ajax_productBarcodeInfoByID",
                    dataType: 'json',
                    data: {
                       product_id:product_id
                    },
                    success: function(res) {
					if (res) {
                            if (res.status === true){
								var i;
								//alert(settings);
								for (i = 0; i < productQuantity; i++) {
									$(".barcodeDiv").append("<div class='col-md-2 col-xs-2 col-sm-2 countRow' style='font-size:12px;padding:2px;margin-bottom:0.5px;font-weight:700;'><div class='thumbnail' style='margin-bottom:0px;border:1px dotted;border-radius:0px;'><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>ABCD Store</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>"+res.productName+"</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>Price: "+res.productSalePrice+"</p><p style='text-align:center;margin:0px auto;' class='printFont barcodeTarget"+res.productBarcode+"'></p></center></div></div>");generateBarcode(res.productBarcode);
									$(".barcodeDiv").append("<div class='col-md-2 col-xs-2 col-sm-2 countRow' style='padding:2px;margin-bottom:0.5px;font-weight:700;'><div class='thumbnail' style='margin-bottom:0px;border:1px dotted;border-radius:0px;'><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>ABCD Store</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>"+res.productName+"</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>Price: "+res.productSalePrice+"</p><p style='text-align:center;margin:0px auto;' class='printFont barcodeTarget"+res.productBarcode+"'></p></center></div></div>");generateBarcode(res.productBarcode);
									$(".barcodeDiv").append("<div class='col-md-2 col-xs-2 col-sm-2 countRow' style='padding:2px;margin-bottom:0.5px;font-weight:700;'><div class='thumbnail' style='margin-bottom:0px;border:1px dotted;border-radius:0px;'><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>ABCD Store</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>"+res.productName+"</p><p style='text-align:center;margin:0px;font-size:12px;font-weight:700;'>Price: "+res.productSalePrice+"</p><p style='text-align:center;margin:0px auto;' class='printFont barcodeTarget"+res.productBarcode+"'></p></center></div></div>");generateBarcode(res.productBarcode);									
									var rowLength=$('.countRow').length;
									//alert(rowLength);
									if(rowLength%60==0){
										//$(".barcodeDiv").append("<br/>");
										//.barcodeDiv{page-break-after:auto }
										//$(".barcodeDiv").append("<div class='breakPage' style=''>hi</div>");
										//alert(rowLength);
									}
								}
							}
                            else {
								$("#barcodeError").html("This field is required");
                            }
                        }
                    }
                });
			});
			function generateBarcode(value){
				var value = value;
				var btype = "code39";
				//var renderer = "css";			
				var settings = {
					output: "css",
					bgColor: "#FFF",
					color: "#000",
					barWidth: 1,
					barHeight: 23.5
				};
				$(".barcodeTarget"+value).html("").show().barcode(value, btype, settings);
				//$('#barcodeTarget').html('').show().barcode(value, btype, settings);
				
			}
		});
	</script>
	<script>
		$(document).ready(function(){
			$('.cancleButton').hide();
			$('.saveButton').hide();
			$('.selectClass').hide();
		});
	</script>
	<script type="text/javascript">
		function cancle(no){
				var inputclass="removeReadonly"+no;
				var spanclass="span"+no;
				var selectclass="selectClass"+no;
				var save="save_button"+no;
				var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				//alert(inputclass);
				$("#"+inputclass).attr('readonly', 'readonly');
				$("#"+save).hide();
				$("#"+cancle).hide();
				$("#"+edit).show();
				$("#"+selectclass).hide();
				$("#"+spanclass).show();
				 
				
		}
	</script>
	<script type="text/javascript">
		function edit_row(no){
				
				var inputclass="removeReadonly"+no;
				var spanclass="span"+no;
				var selectclass="selectClass"+no;
				var save="save_button"+no;
				var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				//alert(inputclass);
				$("#"+inputclass).removeAttr('readonly', 'readonly');
				$("#"+save).show();
				$("#"+selectclass).show();
				$("#"+cancle).show();
				$("#"+edit).hide();
				$("#"+spanclass).hide();
				
		}
	</script>
	<script type="text/javascript">
		function save_row(no){
		
				var inputclass="removeReadonly"+no;
				var selectclass="selectClass"+no;
				var spanclass="span"+no;
				var save="save_button"+no;
				var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				//alert(selectclass);
				var groupName=$("#"+inputclass).val();
				var groupStatus=$("#"+selectclass).val();
				//if(!groupStatus)
				//groupStatus=1;
				//alert(groupStatus);
				//alert(groupStatus);

				jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "storeKeeper/ajax_editGroup/"+no,
                    dataType: 'json',
                    data: {
                       groupName:groupName,
                       groupStatus:groupStatus
                    },
                    success: function(res) {
					if (res) {
                            if (res.status === true){
								//alert("YES");
								$("#"+inputclass).val(res.groupName);
								$("#"+spanclass).show();
								if(res.groupStatus==1)
								$("#"+spanclass).html("Active");
								if(res.groupStatus==0)
								$("#"+spanclass).html("InActive");
								$("#"+selectclass).hide();
								$("#"+save).hide();
								$("#"+cancle).hide();
								$("#"+edit).show();
							}
                            else {
								
                            }
                        }
                    }
                });
		}
	</script>
	<!--inventory table filter -->
	<script type="text/javascript">
			$(this).ready(function() {
				$('.filterable #filter_button').click(function(){
					var $panel = $(this).parents('.filterable'),
					$filters = $panel.find('.filtersField input'),
					$tbody = $panel.find('.table tbody');
					if ($filters.prop('disabled') == true) {
						$filters.prop('disabled', false);
						$filters.first().focus();
					} else {
						$filters.val('').prop('disabled', true);
						$tbody.find('.no-result').remove();
						$tbody.find('tr').show();
					}
				});
				
			});
	</script>
	<script>
			$('.filterable .filtersField input').keyup(function(e){
				//alert("hi");
					if($("#filterbarCode").val()|| $("#filterproductName").val()|| $("#filterproductGroup").val()||$("#filtersoldUnit").val()||$("#filterstockUnit").val()||$("#filtersupplierName").val()){
						
						var arr = [$("#filterbarCode").val(),$("#filterproductName").val(),$("#filterproductGroup").val(),$("#filtersoldUnit").val(),$("#filterstockUnit").val(),$("#filtersupplierName").val()];
						//arr[]
						//alert(arr.length);
							jQuery.ajax({
							//url: "http://[::1]/kenakata/autocomplete/lookup",  
							url: "<?php echo base_url(); ?>" + "storeKeeper/ajaxShowInventoryFilter",
							dataType: 'json',
							type: 'POST',
							data: {arr:arr},
							success: function(data) {
								if(data.status===true){
									$( ".remove_tr").remove();
									var len = data.infos.length;
									//alert(len);
									var txt = "";
									if(len > 0){
										for(var i=0;i<len;i++){
											if(data.infos[i].productBarcode && data.infos[i].productName){
												
												txt += "<tr class='remove_tr'><td>"+data.infos[i].productBarcode+"</td><td>"+data.infos[i].productName+"</td><td>"+data.infos[i].groupName+"</td><td>"+data.infos[i].productSaleCounter+"</td><td>"+data.infos[i].productQuantity+"</td><td>"+data.infos[i].supplierCompanyName+"</td><td>"+data.infos[i].productAddedDate+"</td><td><a href='<?php echo base_url('storeKeeper/productDetails/"+data.infos[i].productID+"'); ?>' type='button' class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='top' title='Details'><i class='fa fa-info'></i></a></td></tr>";
												//alert(txt);
											}
										}
										if(txt != ""){
											$("#showInventorytable").append(txt);
										}
									}
								}
							},
						});
					}
					else{
						$( ".remove_tr").remove();
					}
			});
	</script>
</body>

</html>
