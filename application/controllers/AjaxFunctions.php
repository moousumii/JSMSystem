<?php  //if (!defined('BASEPATH')) exit('No direct script access allowed');  

defined('BASEPATH') OR exit('No direct script access allowed');
   
class AjaxFunctions extends CI_Controller {   
    
 public function __construct()  {  
        parent:: __construct();  
		$this->load->model("ajax_model");
    } 
	public function ajax_get_client_info(){
		
		$info=$this->ajax_model->ajax_get_client_info($this->input->post('client_id'));
		if($info){
			$data = array(
				'status'=>true, 
				'client_add'=>$info->clientAddress,
				'balance'=>$info->clientBalance,
				'client_phn'=>$info->clientContactNumber
			);
		}
		else{
			$data = array(
				'status'=>false,
			);
		}
		echo json_encode($data);
	} 
	public function ajax_get_all_product_info_by_type(){
		
		$info=$this->ajax_model->ajax_get_all_product_info_by_type($this->input->post('type_id'));
		if($info){
			$data = array(
				'status'=>true, 
				'infos'=>$info
			);
		}
		else{
			$data = array(
				'status'=>false,
			);
		}
		echo json_encode($data);
	}
	public function ajax_add_cart(){
		
		$product=$this->input->post();
		$product_details=$this->ajax_model->get_product_details_by_barcode($this->input->post('productBarcode'));
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
		if($pastBuy>0){
			$data = array(
				'errors' => 'This Product is Already in Your Cart. ',
				'status'=>false
				);
		}
		else{
			
			$insert=array(
				'id'=>$product_details->productID,
				'qty'=>$qty,
				'price'=>$product_details->qualityPrice,
				'name'=>$product_details->productName,
				'barcode'=>$product_details->productBarcode,
				'weight'=>$product_details->productWeight,
				'total_quantity'=>$product_details->productQuantity,
				'additional_cost'=>$product_details->productAdditionalCost,
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
				'price'=>$product_details->qualityPrice,
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
				'price'=>$product_details->qualityPrice,
				'name'=>$product_details->productName,
				'total_quantity'=>$product_details->productQuantity,
				'weight'=>$product_details->productWeight,
				'additional_cost'=>$product_details->productAdditionalCost,
				'unit'=>$product_details->productUnitName,
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


	public function removeCart(){
	
		$this->cart->update(array(
				'rowid'=>$this->input->post('row_id'),
				'qty'=>0
			)
		);
			
		$data = array(
			'status'=>true, 
		);
		echo json_encode($data);
	
	}
	public function destroy(){
		$this->cart->destroy();
		$data = array(
				'status'=>true, 
				
				);
		echo json_encode($data);
	}
	
}  