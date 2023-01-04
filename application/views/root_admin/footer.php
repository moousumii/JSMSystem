			</div>
		</div>
	</main>


	<footer class="page-footer center-on-small-only elegant-color">
		<div class="footer-copyright">
			<div class="container-fluid">
				<div class="col-md-8 copyright">কপিরাইট © ২০১৫ - কেনাকাটা.কম </div>
				<div class="col-md-4 developer">Developed by <a href="http://starlabit.com/"><b>StarLab IT.</b></a></div>

			</div>
		</div>
	</footer>
	
	
	
	<script src="<?php echo base_url('assets/back-end/js/jQuery-1.11.0.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/jquery-ui.min.js'); ?>"></script>		
	<script src="<?php echo base_url('assets/back-end/js/tether.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/mdb.js'); ?>"></script>
	<script src="<?php echo base_url('assets/back-end/js/table.js'); ?>"></script>
	
	

	<script type="text/javascript">
		$(this).ready(function() {
			$("#name").autocomplete({

				minLength: 1,
				source: function(req, add) {
					$.ajax({
						url: "http://localhost/kenakata/autocomplete/lookup",
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
		var windowHeight = $(window).height();
		var navHeight = 63;
		var padTwenty = 22;
		var result = windowHeight - navHeight;
		$(document).ready(function(){
			$('main').css('min-height', result);			
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

	</body>

</html>