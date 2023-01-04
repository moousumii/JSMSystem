			</div>
        </div>
    </main>
    <!-- /.Main layout-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only">		
        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-4 col-xs-12">© ২০১৫ কপিরাইট  - কেনাকাটা.কম  </div>
					<div class="col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4">Developed By - <a href="http://starlabit.com/" target="_blank" style="font-weight:bold;color:#039BE5">StarLab IT</a></div>
				</div>
            </div>
        </div>
        <!--/.Copyright-->
    </footer>
    <!--/Footer-->
	
	
	<!--Modals-->

	<?php include('contact-us-modal.php');?>
	<?php include('login-register-modal.php');?>
	<?php include('my-cart-modal.php');?>
	<?php include('product-details-modal.php');?>
		
    <!--/Modals-->
	

    <!-- SCRIPTS -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/front-end/js/tether.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/js/mdb.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/js/filter-table.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/js/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/plugins/elevatezoom-master/jquery.elevatezoom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front-end/js/script.js'); ?>"></script>
	
	<script type="text/javascript">
		/*$(function(){
			var link = $('#slide-out .collapsible-body li a').attr('href');
			$(link).click(function(){
				$("#main-wrapper .container-fluid").load(link);
			});
		});*/
	</script>
	
	<script type="text/javascript">
		$("#product-image").elevateZoom({
		  zoomType: "inner",
		  cursor: "zoom-in"
		});
	</script>
	
	<script>
		document.getElementById("mySidenav").style.width = "0";
		function openNav() {
			document.getElementById("mySidenav").style.width = "310px";			
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";			
		}
	</script>
	
	<script type="text/javascript">// Quantity
		var q = $('.quantity');
		var something = <?php echo $productDetails->product_quantity ; ?>;
		q.each(function(){
			var $this = $(this),
				button = $this.children('button'),
				input = $this.children('input[type="number"]'),
				val = +input.val();

			button.on('click',function(){
				if($(this).hasClass('minus')){
					if(val === 1) return false;
					input.val(--val);
				}
				else{
					if(val === something )return false;
					else input.val(++val);
				}
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
	
		$("#owl-demo-5").owlCarousel({
	      items : 10,
	      navSpeed: 800,
	      nav : true,
	      navText:false,
	      loop:true,
	      //autoplay: true,
	      autoplaySpeed: 800,
	        responsive:{
		        0:{
		            items:1
		        },
		        340:{
		            items:2
		        },
				600:{
		            items:3
		        },
				
				768 : {
					items:4
				},
		        1140:{
		            items:5
		        }
				,
		        1450:{
		            items:6
		        }
				
		    }
	  	});
	</script>
	<script type="text/javascript">$('.datepicker').pickadate();</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.mdb-select').material_select();
		  });
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#my_cart_table').hide();
			$("#my_cart_table_button").click(function(){
				$("#my_cart_table").toggle();
			});
		});
	</script>
	<script type="text/javascript">
		new WOW().init();
	</script>
	
	<script type="text/javascript">
			var windowHeight = $(this).height();
			var navHeight = 58;
			var footerHeight = $('footer').height();
			var padTwenty = 22 ;
			var result = windowHeight - navHeight - footerHeight - padTwenty;
			$(document).ready(function(){
				$('main').css('min-height', result);				
			});
	</script>
	<script type="text/javascript">
			$(this).ready(function() {
				$("#name").autocomplete({

					minLength: 1,
					source: function(req, add) {
						$.ajax({
							//url: "http://[::1]/kenakata/autocomplete/search",  
							url: "<?php echo base_url(); ?>" + "autocomplete/search",
							dataType: 'json',
							type: 'POST',
							data: req,
							success: function(data) {
								if (data.response == "true") {
									add(data.message);
									// jQuery("#result").html(data.message);
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
	<!-- login validation -->
	<script type="text/javascript">
		// Ajax post
				$(document).ready(function() {
					$("#submit").click(function(event){
						event.preventDefault();
						var email = $("input#login_email").val();
						var password = $("input#pwd").val();
						//alert(email);
						jQuery.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>" + "home/customer_login",
							dataType: 'json',
							data: {
								email: email,
								password: password
							},
							success: function(res) {
								if (res) {
									// Show Entered Value
									 if( res.status === true )
										document.location.href = res.redirect;
									else{
										jQuery("div#result").show();
										jQuery("div#value").html(res.errors);
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
					$("#registerSubmit").click(function(event){
						event.preventDefault();
						var user_name = $("#user_name").val();
						var address_title = $("#address_title").val();
						var address = $("#address").val();
						var user_email = $("#user_email").val();
						var contact = $("#contact").val();
						var user_password = $("#user_password").val();
						var confirm_pass = $("#confirm_pass").val();
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>" + "home/register_customer",
							dataType: 'json',
							data: {
								user_name: user_name,
								address_title: address_title,
								address: address,
								user_email: user_email,
								contact: contact,
								user_password: user_password,
								confirm_pass: confirm_pass
							},
							success: function(res) {
								if (res) {
									// Show Entered Value
									 if( res.status === true )
										document.location.href = res.redirect;
									else{
										$("#registerResult").show();
										$("#registerValue").html(res.errors);
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
            $("#add_address").click(function(event) {
                event.preventDefault();
				var user_info_user_id = $("#user_id").val();
                var user_name = $("#user_name").val();
                var contact = $("#contact").val();
                var address_title = $("#address_title").val();
                var address = $("#address").val();
                var default_status = $("#default_status").val();
				//alert(user_name);
				//alert(address);
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "home/add_address",
                    dataType: 'json',
                    data: {
						user_info_user_id: user_info_user_id,
                        user_name: user_name,
                        contact: contact,
                        address_title: address_title,
                        address: address,
                        default_status: default_status
                    },
                    success: function(res) {
					//alert("yes");
                        if (res) {
                            // Show Entered Value
                            if (res.status === true){
								alert(user_name);
                                document.location.href = res.redirect;
							}
                            else {
								jQuery("#user_name").html(res.user_name);
								jQuery("#contact").html(res.contact);
								jQuery("#address_title").html(res.address_title);
                                jQuery("#address").html(res.address);
                                jQuery("#default_status").html(res.default_status);
								jQuery("#value").html(res.errors);
                            }
                        }
                    }
                });
            });
        });
    </script>
	
</body>

</html>