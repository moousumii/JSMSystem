<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div>
	<div>
		<ul>
			<?php 
				foreach($products as $product):
				echo form_open('home/add_cart');
			?>
			<li>
				<div><?php echo $product->product_name; ?></div>
				<div>$<?php echo $product->product_price; ?></div>
				<div>
					<?php
						/*if( $product->option_name){
							echo form_label($product->option_name, 'options_'.$product->id);
							echo form_dropdown(
								$product->option_name,
								$product->option_values,
								NULL,
								'id="option_".$product->id.'
							);
						
						}*/
					?>
					
				</div>
			</li>
		</ul>
	</div>
	<div>
		<?php 
			echo form_hidden('id',$product->product_id);
			echo form_submit('add', 'Add to Cart');
		?>
	</div>
	<?php echo form_close();
		endforeach; ?>
</div>
<div id="cart">
	<?php 
		if($cart=$this->cart->contents()){
			//print_r($cart);
	?>
	<table>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Image</th>
			<th>Option</th>
			<th>Sub Total</th>
			<th>Remove</th>
		</tr>
		<?php foreach($cart as $item): ?>
		<tr>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['price']; ?></td>
			<td><?php echo $item['qty']; ?></td>
			<td><?php echo $item['image']; ?></td>
			<td><?php if($this->cart->has_options($item['rowid'])){
				foreach($this->cart->product_options($item['rowid'])as $option=>$value){
					echo $option.":".$value;
				}
			}//echo $item['options']; ?></td>
			<td><?php echo $item['subtotal']; ?></td>
			<td><?php echo anchor('home/remove/'.$item['rowid'],'remove'); ?></td>
			<td><?php echo anchor('home/add/'.$item['rowid'].'/'.$item['qty'],'Add'); ?></td>
		</tr>
		<?php endforeach ;  ?>
		<tr>
		<?php $rows = count($this->cart->contents()); ?>
			<td>Total item</td>
			<td></td>
			<td></td>
			<td><?php echo $rows;   ?></td>
			<td><?php echo anchor('home/destroy/','Cancle');   ?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td></td>
			<td></td>
			<td><?php echo $this->cart->total();   ?></td>
			<td><?php echo anchor('home/destroy/','Cancle');  } ?></td>
		</tr>
	</table>
</div>
</body>
</html>