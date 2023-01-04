<?php include('header_account.php');?>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url('root_admin/'); ?>">হোমপেজ</a>
				</li>
				<li class="active">
					<strong>প্রোফাইল</strong>
				</li>
			</ol>
			<div class="divider-new">
				<h4 class="h4-responsive"><b>প্রোফাইল</b></h4>
			</div>
		</div>
	</div>

		<div class="row m-top-fifty">
			<div class="col-md-10 col-md-offset-1 my_account" >

				<div class="row">
					<div class="col-md-12">
						<div class="md-form">
							<input placeholder="<?php echo $info->user_name; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Full Name</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="md-form" style="margin-top:35px;">
							<input placeholder="<?php echo $info->user_email; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Email</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="md-form" style="margin-top:35px;">
							<input placeholder="<?php echo $info->contact; ?>" type="text" id="form5" class="form-control" disabled>
							<label>Contact number</label>
						</div>
						<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							Change Contact
						</button>
						<div class="collapse" id="collapseExample">
							<div class="card card-block" style="padding-bottom:20px;">
								<div class="md-form">
                                            <input placeholder="Number" type="text" id="form5" class="form-control">
                                            <label>নতুন নম্বর</label>
                                        </div>
                                        <div class="" style="">
                                            <button type="submit" class="btn btn-default" value="Change Contact" name="post">নম্বর পরিবর্তন করুন</button>
                                            <button type="submit" class="btn btn-danger" value="Reset" name="reset">রিসেট</button>
                                        </div>
							</div>
						</div>
                    </div>
					<div class="col-md-12">
						<div class="md-form" style="margin-top:35px;">
							<textarea type="text" id="form7" class="md-textarea" disabled><?php echo $info->address; ?></textarea>
							<label for="form7">Address (Primary)</label>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--Modals-->

		<?php include('contact-us-modal.php');?>
		
    <!--/Modals-->
<?php include('footer.php');?>