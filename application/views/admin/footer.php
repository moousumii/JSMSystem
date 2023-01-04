		
		
		
		</div>
    </div>

    <!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-timepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/table.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
	<script type="text/javascript">
		$('.forselect2').select2();
	</script>
	<script>
		$(function(){
			$('.showreadonly').hide();
			$('.cancleButton').hide();
			$('.saveButton').hide();
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
	<script type="text/javascript">
		function cancle(no,qty){
				var inputclass="removeReadonly"+no;
				var save="save_button"+no;
				var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				var quantity=$("#"+inputclass).val();
				//alert(inputclass);
				$("#"+inputclass).attr('readonly', 'readonly');
				$("#"+inputclass).val(qty);
				$("#"+save).hide();
				$("#"+cancle).hide();
				$("#"+edit).show();
				 
				
		}
	</script>
	<script type="text/javascript">
		function edit_row(no){
				
				var inputclass="removeReadonly"+no;
				var save="save_button"+no;
				//var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				//alert(inputclass);
				$("#"+inputclass).removeAttr('readonly', 'readonly');
				$("#"+save).show();
				//$("#"+cancle).show();
				$("#"+edit).hide();
				
		}
	</script>
	<script type="text/javascript">
		function save_row(no){
		
				var inputclass="removeReadonly"+no;
				var save="save_button"+no;
				//var cancle="cancle_button"+no;
				var edit="edit_button"+no;
				//alert(inputclass);
				var quantity=$("#"+inputclass).val();

				jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "admin/ajax_adjustStock/"+no,
                    dataType: 'json',
                    data: {
                       productQuantity:quantity
                    },
                    success: function(res) {
					if (res) {
                            if (res.status === true){
								//alert("YES");
								$("#"+inputclass).val(res.quantity);
								$("#"+inputclass).attr('readonly', 'readonly');
								$("#"+save).hide();
								//$("#"+cancle).hide();
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
							url: "<?php echo base_url(); ?>" + "admin/ajaxShowInventoryFilter",
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
												
												txt += "<tr class='remove_tr'><td>"+data.infos[i].productBarcode+"</td><td>"+data.infos[i].productName+"</td><td>"+data.infos[i].groupName+"</td><td>"+data.infos[i].productSaleCounter+"</td><td>"+data.infos[i].productQuantity+"</td><td>"+data.infos[i].supplierCompanyName+"</td><td>"+data.infos[i].productAddedDate+"</td><td><a href='<?php echo base_url('admin/productDetails/"+data.infos[i].productID+"'); ?>' type='button' class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='top' title='Details'><i class='fa fa-info'></i></a></td></tr>";
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
