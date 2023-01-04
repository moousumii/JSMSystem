<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storekeeper_model extends CI_Model {

	public function my_info($user_id){
        $q=$this->db
            ->select('*')
            ->from('admin_info')
            ->where('adminID',$user_id)
            ->where('adminStatus', 1)
            ->get();
        if($q->num_rows()==1){
			return $q->row();
		}
        else{
            return FALSE;
        }
    }

	public function update_contact($admin_id,$data){
		return $this->db
			        ->where('adminID',$admin_id)
				    ->update('admin_info',$data);
	}
	
	public function change_password($data,$admin_id){
		return $this->db
			        ->where('adminID',$admin_id)
				    ->update('admin_info',$data);
	}
	public function all_supplier($limit,$offset)
	{
		$q=$this->db
				->select('*')
				->from('supplier_info')
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function add_supplier($data)
	{
		return $this->db->insert('supplier_info', $data );
	}
	
	public function get_all_group_id_name()
	{
		$q=$this->db
				->select('product_group_info.groupID,product_group_info.groupName')
				->from('product_group_info')
				->where('groupStatus',1)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_supplier_id_name()
	{
		$q=$this->db
				->select('supplier_info.supplierID,supplier_info.supplierCompanyName')
				->from('supplier_info')
				->where('supplierStatus',1)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_product_id_name()
	{
		$q=$this->db
				->select('product_info.productID,product_info.productName')
				->from('product_info')
				->where('productStatus',1)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_product_info_by_id($product_id)
	{
		$q=$this->db
				->select('product_info.productID,product_info.productPurchasePrice,product_info.productSalePrice,product_info.productQuantity,product_group_info.groupName,supplier_info.supplierCompanyName')
				->from('product_info')
				->join('product_group_info','product_info.group_info_productGroupID=product_group_info.groupID')
				->join('supplier_info','product_info.supplier_info_productSupplierID=supplier_info.supplierID')
				->where('productID',$product_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_sale_details_by_id($product_id)
	{
		$q=$this->db
				//->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,SUM(saleProductQuantity) as saleProductQuantityTotal')
				->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode')
				->from('sale_details')
				->join('sale_info','sale_details.sale_info_saleID=sale_info.saleID')
				->join('product_info','product_info.productID=sale_details.product_info_saleProductID')
				//->group_by('sale_details.product_info_saleProductID')
				->where('sale_details.product_info_saleProductID',$product_id)
				->order_by("sale_info.saleDate","Desc")
				//->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_product_barcode_info_by_id($product_id)
	{
		$q=$this->db
				->select('product_info.productName,product_info.productSalePrice,product_info.productBarcode')
				->from('product_info')
				->where('productID',$product_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_view_product_info($limit,$offset)
	{
		$q=$this->db
				->select('product_info.productID,product_info.productBarcode,product_info.productName,product_info.productQuantity,product_info.productSaleCounter,product_info.productAddedDate,product_group_info.groupName,supplier_info.supplierCompanyName')
				->from('product_info')
				->join('product_group_info','product_info.group_info_productGroupID=product_group_info.groupID')
				->join('supplier_info','product_info.supplier_info_productSupplierID=supplier_info.supplierID')
				->order_by("productID","Desc")
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	function filter_product_info($keyword){ 
	//print_r($keyword);//exit;
	//if
        $this->db
			->select('product_info.productID,product_info.productBarcode,product_info.productName,product_info.productQuantity,product_info.productSaleCounter,product_info.productAddedDate,product_group_info.groupName,supplier_info.supplierCompanyName')
			->from('product_info')
			->join('product_group_info','product_info.group_info_productGroupID=product_group_info.groupID')
			->join('supplier_info','product_info.supplier_info_productSupplierID=supplier_info.supplierID'); 
		if($keyword[0]){
			$this->db->like('productBarcode',$keyword[0],'after'); 
			//$this->db->where('user_info.user_type',1); 
		}
        if($keyword[1]){
			$this->db->like('productName',$keyword[1],'after'); 
			//$this->db->where('user_info.user_type',1); 
		}
        if($keyword[2]){
			$this->db->like('groupName',$keyword[2],'after');  
			//$this->db->where('user_info.user_type',1); 
		}
        if($keyword[3]){
			$this->db->like('productSaleCounter',$keyword[3],'after');  
			//$this->db->where('user_info.user_type',1); 
		}
		if($keyword[4]){
			$this->db->like('productQuantity',$keyword[4],'after');  
			//$this->db->where('user_info.user_type',1); 
		}
		if($keyword[5]){
			$this->db->like('supplierCompanyName',$keyword[5],'after');  
			//$this->db->where('user_info.user_type',1); 
		}
		$this->db->order_by("productID","Desc"); 
        $query = $this->db->get();     
        return $query->result();
    } 
	
	public function get_product_details_by_id($product_id)
	{
		$q=$this->db
				->select('product_info.*,product_group_info.groupName,supplier_info.supplierCompanyName')
				->from('product_info')
				->join('product_group_info','product_info.group_info_productGroupID=product_group_info.groupID')
				->join('supplier_info','product_info.supplier_info_productSupplierID=supplier_info.supplierID')
				->where('productID',$product_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_expair_date()
	{
		$q=$this->db
				->select('*')
				->from('expair_date')
				->get();
				
		if($q->num_rows()){
			return $q->row()->expairDate;
		}
		else{
			return FALSE;
		}
	}
	
	
	public function add_new_product($data)
	{
		$expair_date=$this->storekeeper_model->get_expair_date();
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d H:i:s');
		if($expair_date>$date){
		// print_r($data);exit;
			$this->db->insert('product_info', $data );
			$id=$this->db->insert_id();
			if($id){
				$barcode['productBarcode']=1000+$id;
				return $this->db
					 ->where('productID',$id)
					 ->update('product_info',$barcode);
			}
			else{
				return false;
			}
		}
		else{
				return false;
		}
	}
	public function add_product_to_stock($data,$product_id,$quantity)
	{
		$q=$this->db
				->where('productID',$product_id)
				->set('productQuantity', 'productquantity + ' . $quantity, FALSE)
				->update('product_info',$data);
		if($q){
			$update['productUpdatedQuantity']=$quantity;
			$update['product_info_updatedProductID']=$product_id;
			$update['productUpdateDate']=$data['productUpdatedDate'];
			$update['admin_info_productUpdatedBy']=$data['productUpdatedBy'];
			return $this->db->insert('product_update_info', $update );
		}
		else return False;
		
	}
	
	public function update_product($data,$product_id)
	{
		return $this->db
					->where('productID',$product_id)
					->update('product_info',$data);
		
	}
	public function update_supplier($data,$supplier_id)
	{
		return $this->db
					->where('supplierID',$supplier_id)
					->update('supplier_info',$data);
		
	}
	public function get_supplier_details_by_id($supplier_id)
	{
		$q=$this->db
				->select('*')
				->from('supplier_info')
				->where('supplierID',$supplier_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	
	
	public function all_product_group($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('product_group_info')
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function add_product_group($data)
	{
		return $this->db->insert('product_group_info', $data );
	}
	
	public function update_group($data,$group_id)
	{
		return $this->db
					->where('groupID',$group_id)
					->update('product_group_info',$data);
		
	}
	
	public function get_sale_report($limit,$offset)
	{
		$q=$this->db
				//->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,SUM(saleProductQuantity) as saleProductQuantityTotal')
				->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,shop_info.shopTitle')
				->from('sale_details')
				->join('sale_info','sale_details.sale_info_saleID=sale_info.saleID')
				->join('product_info','product_info.productID=sale_details.product_info_saleProductID')
				->join('shop_info','shop_info.shopID=sale_details.	shop_info_shopID')
				->order_by("sale_info.saleDate", "desc")
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_sale_report_by_dates($startDate,$endDate)
	{
		$q=$this->db
				->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,shop_info.shopTitle')
				->from('sale_details')
				->join('sale_info','sale_details.sale_info_saleID=sale_info.saleID')
				->join('product_info','product_info.productID=sale_details.product_info_saleProductID')
				->join('shop_info','shop_info.shopID=sale_details.	shop_info_shopID')
				//->group_by('sale_details.product_info_saleProductID')
				->where('sale_info.saleDate  >=',$startDate)
				->where('sale_info.saleDate <=',$endDate)
				//->limit($limit,$offset)
				->order_by("sale_info.saleDate", "desc")
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_return_report_by_dates($startDate,$endDate)
	{
		$q=$this->db
				->select('exchange_info.*,shop_info.shopTitle')
				->from('exchange_info')
				//->join('product_info','exchange_info.returnProductID=product_info.productID')
				->join('shop_info','exchange_info.shop_info_returnShopID=shop_info.shopID')
				->where('returnDate >=',$startDate)
				->where('returnDate <=',$endDate)
				//->limit($limit,$offset)
				->order_by("returnDate", "desc")
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_return_info_by_id($return_id)
	{
		$q=$this->db
				->select('exchange_info.*,shop_info.shopTitle')
				->from('exchange_info')
				->join('shop_info','exchange_info.shop_info_returnShopID=shop_info.shopID')
				->where('exchangeID',$return_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_return_details_by_id($return_id)
	{
		$q=$this->db
				->select('exchange_details.*,product_info.productName,product_info.productBarcode,')
				->from('exchange_details')
				->join('product_info','exchange_details.exchangeProductID=product_info.productID')
				->where('exchange_info_exchangeID',$return_id)
				->where('exchangeProductType',0)
				->get();
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_return_exchange_details_by_id($return_id)
	{
		$q=$this->db
				->select('exchange_details.*,product_info.productName,product_info.productBarcode,')
				->from('exchange_details')
				->join('product_info','exchange_details.exchangeProductID=product_info.productID')
				->where('exchange_info_exchangeID',$return_id)
				->where('exchangeProductType',1)
				->get();
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_return_report($limit,$offset)
	{
		$q=$this->db
				->select('exchange_info.*,product_info.productName,shop_info.shopTitle')
				->from('exchange_info')
				->join('product_info','exchange_info.returnProductID=product_info.productID')
				->join('shop_info','exchange_info.shop_info_returnShopID=shop_info.shopID')
				->order_by("returnDate", "desc")
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_old_return_details_by_id($return_id)
	{
		$q=$this->db
				->select('exchange_info.*,product_info.productName,product_info.productBarcode,')
				->from('exchange_info')
				->join('product_info','exchange_info.returnProductID=product_info.productID')
				->where('exchangeID',$return_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_old_return_exchange_details_by_id($return_id)
	{
		$q=$this->db
				->select('exchange_info.*,product_info.productName,product_info.productBarcode,')
				->from('exchange_info')
				->join('product_info','exchange_info.newProductID=product_info.productID')
				->where('exchangeID',$return_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	
	
	public function get_stock_report($limit,$offset)
	{
		$q=$this->db
				->select('product_update_info.*,product_info.productName,product_info.productBarcode,admin_info.adminName')
				->from('product_update_info')
				->join('admin_info','admin_info.adminID=product_update_info.admin_info_productUpdatedBy')
				->join('product_info','product_info.productID=product_update_info.product_info_updatedProductID')
				->order_by("productUpdateDate", "desc")
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_stock_report_by_dates($startDate,$endDate)
	{
		$q=$this->db
				->select('product_update_info.*,product_info.productName,product_info.productBarcode,admin_info.adminName')
				->from('product_update_info')
				->join('admin_info','admin_info.adminID=product_update_info.admin_info_productUpdatedBy')
				->join('product_info','product_info.productID=product_update_info.product_info_updatedProductID')
				//->group_by('sale_details.product_info_saleProductID')
				->where('productUpdateDate >=',$startDate)
				->where('productUpdateDate <=',$endDate)
				//limit($limit,$offset)
				->order_by("productUpdateDate", "desc")
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
}