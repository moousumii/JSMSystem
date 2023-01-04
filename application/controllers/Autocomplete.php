<?php  //if (!defined('BASEPATH')) exit('No direct script access allowed');  

defined('BASEPATH') OR exit('No direct script access allowed');
   
class Autocomplete extends CI_Controller {   
    
 public function __construct()  {  
        parent:: __construct();  
  $this->load->model("MAutocomplete");
    }  
  
	public function ajax_add_cart(){
		
		$product=$this->input->post();
		$product_details=$this->MAutocomplete->get_product_details_by_barcode($this->input->post('productBarcode'));
		if($this->input->post('quantity')){
			$qty=$this->input->post('quantity');
		}else{
			$qty=1;
		}
		
		$pastBuy=0;
		$cartContent=$this->cart->contents();
		if($cartContent !=null){
			foreach($cartContent as $content){
				if($content['id'] == $product_details->productID){
					$pastBuy = $content['qty'];
				}
			}
		}
		if(($qty+$pastBuy)>$product_details->productQuantity){
			$data = array(
				'errors' => 'Available: '.($product_details->productQuantity-$pastBuy),
				'status'=>false
				);
		}
		else{
			
			$insert=array(
				'id'=>$product_details->productID,
				'qty'=>$qty,
				'price'=>$product_details->productSalePrice,
				'name'=>$product_details->productName,
				'barcode'=>$product_details->productBarcode,
				'total_quantity'=>$product_details->productQuantity,
			);
			
			$this->cart->insert($insert);	
			$cart=$this->cart->contents();
			//$data['status'] = true; //Set response  
			$numItems = count($this->cart->contents());
			$i = 0;
			foreach($this->cart->contents() as $key) { 
			if($i+1 == $numItems) { 
			$saved_rowid = $key['rowid']; 
			} 
			$i++; 
			}
			
			if($pastBuy>0){
				$data = array(
				'product_id'=>$product_details->productID,
				'quantity'=>$qty+$pastBuy,
				'price'=>$product_details->productSalePrice,
				'barcode'=>$product_details->productBarcode,
				'total_quantity'=>$product_details->productQuantity,
				'rowid'=>$saved_rowid,
				'status'=>true,
				'past_buy'=>true
				);
			}
			else{
				$data = array(
				'product_id'=>$product_details->productID,
				'quantity'=>$qty,
				'price'=>$product_details->productSalePrice,
				'name'=>$product_details->productName,
				'total_quantity'=>$product_details->productQuantity,
				//'image'=>$product_details->product_image,
				'barcode'=>$product_details->productBarcode,
				'rowid'=>$saved_rowid,
				'status'=>true,
				'past_buy'=>false
				);
			}
        }    
		echo json_encode($data);
		//redirect($this->agent->referrer());
	}
	
	public function plus_product(){
			$qty=$this->input->post('qty');
			$this->cart->update(array(
				'rowid'=>$this->input->post('row_id'),
				'qty'=>$qty
			)
		);
		
		$data = array(
				'status'=>true, 
				//'redirect'=>$this->agent->referrer()
				);
		echo json_encode($data);
	}
	public function minus_product(){
		//echo $this->input->post('row_id');exit;
			$this->cart->update(array(
				'rowid'=>$this->input->post('row_id'),
				'qty'=>$this->input->post('qty')
			)
		);
		
		$data = array(
				'status'=>true, 
				//'redirect'=>$this->agent->referrer()
				);
		echo json_encode($data);
	}
	
	public function remove(){
	//print_r($rowid);exit;
	//echo $this->input->post('row_id');exit;
			$this->cart->update(array(
				'rowid'=>$this->input->post('row_id'),
				'qty'=>0
			)
		);
		
		$data = array(
				'status'=>true, 
				//'redirect'=>$this->agent->referrer()
				);
		echo json_encode($data);
			/*$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>0
			)
		);*/
		//$this->load->library('user_agent');
		//redirect($this->agent->referrer());
	}
	
	public function destroy(){
		$this->cart->destroy();
		$data = array(
				'status'=>true, 
				//'redirect'=>$this->agent->referrer()
				);
		echo json_encode($data);
		//$this->load->library('user_agent');
		//redirect($this->agent->referrer());
	}
	
	public function ajax_incomeExpenseReport(){
		
		$data=$this->input->post();
		$data['startDate']= date('Y-m-d', strtotime($data['startDate']));
		$data['startTime']= date('H:i:s', strtotime($data['startTime']));
		$startDate=$data['startDate']." ".$data['startTime'] ;
		$data['endDate']= date('Y-m-d', strtotime($data['endDate']));
		$data['endTime']= date('H:i:s', strtotime($data['endTime']));
		$endDate=$data['endDate']." ".$data['endTime'] ;
		$shop_id=$this->session->userdata('userShop');
		//print_r($startDate);
		//print_r($endDate);
		$transection_details=$this->MAutocomplete->get_transection_by_dates_and_shop_id($startDate,$endDate,$shop_id);
		//print_r($transection_details);exit;
		$this->load->view('manager/incomeExpenseReport',['infos'=>$transection_details]);
		
		/*$data = array(
		    'transectionID'=>$transection_details->transectionID,
			'transectionTotalAmount'=>$transection_details->transectionTotalAmount,
			'transectionType'=>$transection_details->transectionType,
			'transectionDate'=>$transection_details->transectionDate,
			'status'=>true
		);  */
		//echo json_encode($data);
		//redirect($this->agent->referrer());
	}
	
	public function ajax_add_return_to_cart(){
		
		$product=$this->input->post();
		$product_details=$this->MAutocomplete->get_product_details_by_barcode($this->input->post('productBarcode'));
		if($this->input->post('quantity')){
			$qty=$this->input->post('quantity');
		}else{
			$qty=1;
		}
		
		$pastBuy=0;
		$cartContent=$this->cart->contents();
		if($cartContent !=null){
			foreach($cartContent as $content){
				if($content['id'] == $product_details->productID){
					$pastBuy = $content['qty'];
				}
			}
		}
		$insert=array(
			'id'=>$product_details->productID,
			'qty'=>$qty,
			'price'=>$product_details->productSalePrice,
			'name'=>$product_details->productName,
			'barcode'=>$product_details->productBarcode,
			'total_quantity'=>$product_details->productQuantity,
			'productType'=>0,
		);
		
		$this->cart->insert($insert);	
		$cart=$this->cart->contents();
		//$data['status'] = true; //Set response  
		$numItems = count($this->cart->contents());
		$i = 0;
		foreach($this->cart->contents() as $key) { 
			if($i+1 == $numItems) { 
			$saved_rowid = $key['rowid']; 
			} 
			$i++; 
		}
		
		if($pastBuy>0){
			$data = array(
			'product_id'=>$product_details->productID,
			'quantity'=>$qty+$pastBuy,
			'price'=>$product_details->productSalePrice,
			'barcode'=>$product_details->productBarcode,
			'total_quantity'=>$product_details->productQuantity,
			'rowid'=>$saved_rowid,
			'status'=>true,
			'productType'=>0,
			'past_buy'=>true
			);
		}
		else{
			$data = array(
			'product_id'=>$product_details->productID,
			'quantity'=>$qty,
			'price'=>$product_details->productSalePrice,
			'name'=>$product_details->productName,
			'total_quantity'=>$product_details->productQuantity,
			//'image'=>$product_details->product_image,
			'barcode'=>$product_details->productBarcode,
			'rowid'=>$saved_rowid,
			'status'=>true,
			'productType'=>0,
			'past_buy'=>false
			);
		}
		echo json_encode($data);
		//redirect($this->agent->referrer());
	}
	public function ajax_add_new_to_cart(){
		
		$product=$this->input->post();
		$product_details=$this->MAutocomplete->get_product_details_by_barcode($this->input->post('productBarcode'));
		if($this->input->post('quantity')){
			$qty=$this->input->post('quantity');
		}else{
			$qty=1;
		}
		
		$pastBuy=0;
		$cartContent=$this->cart->contents();
		if($cartContent !=null){
			foreach($cartContent as $content){
				if($content['id'] == $product_details->productID ){
					$pastBuy = $content['qty'];
				}
			}
		}
		$insert=array(
			'id'=>$product_details->productID,
			'qty'=>$qty,
			'price'=>$product_details->productSalePrice,
			'name'=>$product_details->productName,
			'barcode'=>$product_details->productBarcode,
			'total_quantity'=>$product_details->productQuantity,
			'productType'=>1,
		);
		
		$this->cart->insert($insert);	
		$cart=$this->cart->contents();
		//$data['status'] = true; //Set response  
		$numItems = count($this->cart->contents());
		$i = 0;
		foreach($this->cart->contents() as $key) { 
			if($i+1 == $numItems) { 
			$saved_rowid = $key['rowid']; 
			} 
			$i++; 
		}
		
		if($pastBuy>0){
			$data = array(
			'product_id'=>$product_details->productID,
			'quantity'=>$qty+$pastBuy,
			'price'=>$product_details->productSalePrice,
			'barcode'=>$product_details->productBarcode,
			'total_quantity'=>$product_details->productQuantity,
			'rowid'=>$saved_rowid,
			'status'=>true,
			'productType'=>1,
			'past_buy'=>true
			);
		}
		else{
			$data = array(
			'product_id'=>$product_details->productID,
			'quantity'=>$qty,
			'price'=>$product_details->productSalePrice,
			'name'=>$product_details->productName,
			'total_quantity'=>$product_details->productQuantity,
			//'image'=>$product_details->product_image,
			'barcode'=>$product_details->productBarcode,
			'rowid'=>$saved_rowid,
			'status'=>true,
			'productType'=>1,
			'past_buy'=>false
			);
		}
		echo json_encode($data);
		//redirect($this->agent->referrer());
	}
}  