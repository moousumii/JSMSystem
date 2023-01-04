<!-- Modal -->
    <div class="modal fade cart-modal" id="cart-modal-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-md-center" id="myModalLabel">আপনার ঝুড়ি</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
					<?php if($cart=$this->cart->contents()){ ?>
                    <table class="table table-bordered table-hover">
						<br />
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                <th>পরিমাণ </th>
                                <th>মূল্য</th>
                                <th>Sub Total</th>
                                <th>সরিয়ে দিন</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach($cart as $item): ?>
                            <tr class="table-success">
                                <th scope="row">1</th>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['qty']; ?> </td>
                                <td><?php echo $item['price']; ?>$</td>
                                <td><?php echo $item['subtotal']; ?>$</td>
                                <td><a><i class="fa fa-remove"></i></a><?php echo anchor('home/remove/'.$item['rowid'],'remove'); ?></td>
                                <td><a><i class="fa fa-remove"></i></a><?php echo anchor('home/add/'.$item['rowid'].'/'.$item['qty'],'Add'); ?></td>
                            </tr>
						<?php endforeach ;  ?>
                            
                            <tr class="total">
                                <th scope="row"></th>
                                <td></td>
                                <td>মোট</td>
                                <td><?php echo $this->cart->total();  ?>$</td>
                            </tr>
                        </tbody>
                    </table>
					
                </div>
                <!--Footer-->
                <div class="modal-footer">
					<button class="btn btn-default">চেক-আউট</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন </button>
                    <button type="button" class="btn btn-danger" ><?php echo anchor('home/destroy/','Cancle'); ?> </button>
                </div>
					<?php } else { ?>
					<p>আপনার ঝুড়ি খালি।</p>
					<?php } ?>
            </div>
            <!--/.Content-->
        </div>
    </div>