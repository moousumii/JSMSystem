 <?php defined('BASEPATH') OR exit('No direct script access allowed');
class MAutocomplete extends CI_Model{ 
	public function get_product_details_by_barcode($barcode)
	{
		$q=$this->db
				->select('product_info.productID,product_info.productName,product_info.productBarcode,product_info.productSalePrice,product_info.productQuantity')
				->from('product_info')
				->where('productBarcode',$barcode)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_transection_by_dates_and_shop_id($startDate,$endDate,$shop_id)
	{
		$q=$this->db
				->select('*')
				->from('transection_info')
				->where('transectionDate >=',$startDate)
				->where('transectionDate <=',$endDate)
				->where('shop_info_transectionShopID',$shop_id)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	
} 