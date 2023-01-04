		
		
		
		</div>
    </div>
    <section class="developer">
		<div class="thumbnail">
			<div class="caption">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 text-right">
							<b>System Developed By >> <a href="http://starlabit.com.bd/">StarLab IT</a></b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jQuery1.12.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jQuery-UI-1.12.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-timepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/table.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/chart.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>	
	<script type="text/javascript">
		$('.forselect2').select2();
	</script>	
	<script type="text/javascript">
		$(function(){
			var windowHeight = $(window).height();
			var navbarHeight = $('.navbar').height();
			var wrapperHeight = windowHeight - navbarHeight;
			$('#page-wrapper').css('min-height', wrapperHeight);
		});
	</script>
	<?php include('ajaxFunctions.php'); ?>
</body>

</html>
