<?php include('header.php') ?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Add Expense Field</h3>
    </div>
</div>
<?php 
		echo form_open('superAdmin/storeExpenseField');
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d h:i:s');
	    echo form_hidden('expenseFieldAddedDate',$date); 
	    echo form_hidden('expenseFieldStatus',1); 
	?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Expense Field Name</label>
                                <!--<input class="form-control">-->
                                <?php echo form_input(['name'=>'expenseFieldName', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('expenseFieldName')]);
								echo form_error('expenseFieldName'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Add Expense Field</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>