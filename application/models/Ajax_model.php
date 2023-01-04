 <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_model extends CI_Model{ 
	public function ajax_get_client_info($client_id)
	{
		$q=$this->db
				->select('clientContactNumber,clientAddress,clientBalance')
				->from('client_info')
				->where('clientID',$client_id)
				->get();
				
		if($q->num_rows()){
			return $q->row();
		}
		else{
			return FALSE;
		}
		
	}
	public function ajax_get_all_product_info_by_type($type_id)
	{
		$q=$this->db
				->select('productId,productName,productBarcode')
				->from('product_info')
				->where('product_type_info_productTypeID',$type_id)
				->where('productQuantity>',0)
				->where('product_status_info_productStatusId!=',2)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
		
	}
	public function get_product_details_by_barcode($barcode)
	{
		$q=$this->db
				->select('product_info.productID,product_info.productName,product_info.productBarcode,product_info.productAdditionalCost,product_info.productWeight,product_info.productQuantity,product_info.productUnitName,product_info.productQuantity,quality_price_info.qualityPrice')
				->from('product_info')
				->join('quality_price_info','quality_price_info.qualityId=product_info.quality_price_info_qualityId')
				->where('productBarcode',$barcode)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	
} 