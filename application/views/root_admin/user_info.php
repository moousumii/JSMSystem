<?php include('header.php');   ?>
	
<div class="row m-top-25">
	<div class="container">
			<div class="row">
                <div class="">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url('root_admin/'); ?>">Home</a>
                        </li>
                        <li class="active">
                            <strong>All User</strong>
                        </li>
                    </ol>
                </div>
				
                <div class="col-lg-2">
				
                </div>
            </div>
			
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('feedback_successfull'))
						{ ?>
					<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						<strong>Success!</strong>
						<?php echo $this->session->flashdata('feedback_successfull'); ?>
					</div>
					<?php } 
						
						if($this->session->flashdata('feedback_failed'))
						{ ?>
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						<strong>Oops!</strong>
						<?php echo $this->session->flashdata('feedback_failed'); ?>
					</div>
					<?php } ?>
				</div>
			</div>

            <div class="row">
                <div class="col-md-12">
					<div class="row card mainCard">
						<div class="col-md-12 user_info">
							<div class="panel panel-primary filterable">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<h5 class="section-title st-mdb">
												All User
											</h5>
										</div>
										<div class="col-md-6 col-xs-12" style="margin-top:20px;">
											<div class="pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
												<button id="filter_button" class="btn btn-default btn-xs btn-filter" style="color:#fff;"><i class="fa fa-filter"></i> Filter
												</button>									
											</div>	
										</div>
									</div>								
								</div>
								<table class="table table-sm table-bordered">
									<thead class="table-custom-thead">
										<tr class="filters">
											<th>
												<input type="text" style="text-align:center;" class="form-control" placeholder="Name" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" style="text-align:center;" class="form-control" placeholder="Designation" disabled data-toggle="true">
											</th>
											<th>
												<input type="text" style="text-align:center" class="form-control" placeholder="Contact" disabled>
											</th>
											<th>
												<input type="email" style="text-align:center" class="form-control" placeholder="Email Address" disabled>
											</th>
											<th>
												<input type="text" style="text-align:center" class="form-control" placeholder="Status" disabled>
											</th>
											<th>
												<input type="text" style="text-align:center" class="form-control" placeholder="Options" disabled>
											</th>
										</tr>
									</thead>
									<?php foreach($infos as $info):  //print_r($info);?>
									<tbody class="table-custom-tbody">
										<tr class="">
											<td style="text-align:center"><?php echo $info->name; ?></td>
											<td style="text-align:center"><?php echo $info->role_name; ?></td>
											<td style="text-align:center"><?php echo $info->contact; ?></td>
											<td style="text-align:center"><?php echo $info->email; ?></td>
											<td style="text-align:center"><?php if($info->admin_status==1) echo "Active";
											else echo "InActive"; ?></td>
											
											<td style="text-align:center">
												<?php  /*echo form_open("root_admin/profile");
												echo form_hidden('admin_id',$info->admin_id);
												echo form_submit(['name'=>'post', 'value'=>'Details', 'type'=>'submit', 'class'=>'btn btn-primary']) ; echo form_close();*/
												?>
												<a type="button" href="<?php echo base_url("root_admin/profile/{$info->admin_id}"); ?>" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Details"> <i class="fa fa-info"></i> </a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<?php //echo anchor("root_admin/delete_user/{$info->userID}",'Delete'); ?>
						</div>

						<div align="center">
							<ul class="pagination">
							   <?php echo $this->pagination->create_links(); ?>
								<!--<li><a href="#">Next</a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>	
			



<?php include('footer.php');   ?>