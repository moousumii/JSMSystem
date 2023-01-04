<!-- Modal Login -->
    <div class="modal fade modal-ext" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body">
				
				
					<ul class="nav nav-tabs tabs-2 special-color" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">লগ ইন</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#panel2" role="tab">রেজিস্টার</a>
						</li>
					</ul>

					<!-- Tab panels -->
					<div class="tab-content">

						<!--Panel 1-->
						<div class="tab-pane active" id="panel1" role="tabpanel">
							<br>
							<br>
							<?php echo form_open() ?>
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<?php echo form_input(['name'=>'email', 'id' => 'login_email', 'class'=>'form-control', 'value'=>set_value('email')]);
										  echo form_error('email'); ?>
									<label for="form42">ইউজার নাম</label>
								</div>

								<div class="md-form">
									<i class="fa fa-key prefix"></i>
									<?php echo form_password(['name'=>'password', 'id' => 'pwd', 'class'=>'form-control', 'value'=>set_value('password')]);
										  echo form_error('password'); ?>
									<label for="form34">পাসওয়ার্ড</label>
								</div>
								<div class="md-form form-group text-md-center">
									<button  type="submit" class="btn btn-default" value="" name="login" id="submit">লগ ইন</button>
									<!--<button  type="submit" class="btn btn-default" value="" name="login" >লগ ইন</button>-->
									<button  type="reset" class="btn btn-danger" value="Reset" name="reset">রিসেট</button>
								</div>
							<?php	echo form_close(); ?>
							
							<?php

								// Display Result Using Ajax
								echo "<div id='result' style='display: none'>";
								
								echo "<label class='label_output'><div id='value'> </div></label>";
								echo "<br>";
								echo "<br>";
								
								echo "</div>";
							?>
						</div>
						<!--/.Panel 1-->

						<!--Panel 2-->
						<div class="tab-pane" id="panel2" role="tabpanel">
							<br>
							<br>

							<?php echo form_open('home/register_customer');
								$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
								$date= $dt->format('Y-m-d h:i:s');
								echo form_hidden('add_date',$date);
							?>
								<div class="row">
									<div class="col-md-12">
										<div class="md-form">
											<i class="fa fa-user prefix"></i>
											<?php echo form_input(['name'=>'user_name', 'id'=>'user_name', 'class'=>'form-control', 'value'=>set_value('user_name')]);
												  echo form_error('user_name'); ?>
											<label for="form81" data-error="wrong" data-success="right">পুরো নাম</label>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="margin-top:32px;">
										<div class="md-form">
											<i class="fa fa-home prefix"></i>
											<?php echo form_input(['name'=>'address_title', 'id'=>'address_title', 'class'=>'form-control', 'value'=>set_value('address_title')]);
												  echo form_error('address_title'); ?>
											<label for="form81" data-error="wrong" data-success="right">ঠিকানা টাইটেল</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="md-form">
											<i class="fa fa-map-marker prefix"></i>
											<?php echo form_textarea(['name'=>'address', 'id'=>'address', 'class'=>'md-textarea', 'rows'=>'2', 'value'=>set_value('address')]);
												  echo form_error('address');  ?>
											<label for="form76">ঠিকানা </label>
										</div>
									</div>		
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<div class="md-form">
											<i class="fa fa-envelope prefix"></i>
											<?php echo form_input(['name'=>'user_email', 'id'=>'user_email', 'class'=>'form-control', 'value'=>set_value('user_email')]);
												  echo form_error('user_email'); ?>
											<label for="form81" data-error="wrong" data-success="right">ইমেইল</label>
										</div>
									</div>

									<div class="col-md-6">
										<div class="md-form">
											<i class="fa fa-mobile prefix"></i>
											<?php echo form_input(['name'=>'contact', 'id'=>'contact', 'class'=>'form-control', 'value'=>set_value('conttact')]);
												  echo form_error('contact'); ?>
											<label for="form82" data-error="wrong" data-success="right">ফোন/মোবাইল নাম্বার </label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="md-form">
											<i class="fa fa-key prefix"></i>
											<?php echo form_password(['name'=>'user_password', 'id'=>'user_password', 'class'=>'form-control', 'value'=>set_value('')]);
												  echo form_error('user_password'); ?>
											<label for="form82" data-error="wrong" data-success="right">পাসওয়ার্ড দিন </label>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="md-form">
											<i class="fa fa-key prefix"></i>
											<?php echo form_password(['name'=>'confirm_pass', 'id'=>'confirm_pass', 'class'=>'form-control', 'value'=>set_value('')]);
												  echo form_error('confirm_pass'); ?>
											<label for="form82" data-error="wrong" data-success="right">পুনরায় পাসওয়ার্ড দিন </label>
										</div>
									</div>
								</div>
								<div class="md-form form-group text-md-center">
									<button  type="submit" class="btn btn-default" value="Add" name="add" id="registerSubmit">রেজিস্টার</button>
									<button  type="reset" class="btn btn-danger" value="Reset" name="reset">রিসেট</button>
								</div>
							<?php	echo form_close(); ?>
							<?php

								// Display Result Using Ajax
								echo "<div id='registerResult' style='display: none'>";
								
								echo "<label class='label_output'><div id='registerValue'> </div></label>";
								echo "<br>";
								echo "<br>";
								
								echo "</div>";
							?>

						</div> 
						<!--/.Panel 2-->

					</div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>