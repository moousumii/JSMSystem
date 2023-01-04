<?php include('header_account.php');?>
	
	<div class="row m-top-eighty">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url('home/'); ?>">হোমপেজ</a>
							</li>
							<li class="active">
								<strong>প্রোফাইল</strong>
							</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs tabs-5 special-color" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">প্রোফাইল</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#panel2" role="tab">ঠিকানা ব্যবস্থাপনা</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#panel3" role="tab">পাসওয়ার্ড পরিবর্তন</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#panel4" role="tab">ওর্ডার</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#panel5" role="tab">ঝুড়ি</a>
							</li>
							
						</ul>

						<!-- Tab panels -->
						<div class="tab-content card">

							<!--Panel 1-->
							<div class="tab-pane fade in active" id="panel1" role="tabpanel">
								<br>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

							</div>
							<!--/.Panel 1-->

							<!--Panel 2-->
							<div class="tab-pane fade" id="panel2" role="tabpanel">
								<br>

									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

							</div>
							<!--/.Panel 2-->

							<!--Panel 3-->
							<div class="tab-pane fade" id="panel3" role="tabpanel">
								<br>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

							</div>
							<!--/.Panel 3-->
							
							<!--Panel 4-->
							<div class="tab-pane fade" id="panel4" role="tabpanel">
								<br>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

							</div>
							<!--/.Panel 4-->
							
							<!--Panel 5-->
							<div class="tab-pane fade" id="panel5" role="tabpanel">
								<br>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

							</div>
							<!--/.Panel 5-->

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<!--Modals-->
		<?php include('contact-us-modal.php');?>
		<?php include('login-register-modal.php');?>
		<?php include('my-cart-modal.php');?>
		<?php include('product-details-modal.php');?>
		<?php include('add-address-modal.php');?>
    <!--/Modals-->
<?php include('footer.php');?>