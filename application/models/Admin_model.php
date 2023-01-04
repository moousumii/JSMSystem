<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
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
	public function stock_product_value(){
       
		$q=$this->db
			->select('sum(`productQuantity`) as qty,sum(`productQuantity`*`productPurchasePrice`) as stockvalue,sum(`productQuantity`*`productSalePrice`) as salevalue')
			->from('product_info')
            ->where('productStatus',1)
            ->get();
        if($q->num_rows()>0){
			//return $q->row()->stockvalue;
			return $q->row();
		}
        else{
            return 0;
        }
    }
	public function sale_product_value(){
       
		$q=$this->db
			->select('sum(`productSaleCounter`) as qty,sum(`productSalePrice`*`productSaleCounter`) as salevalue')
			->from('product_info')
            ->where('productStatus',1)
            ->get();
        if($q->num_rows()>0){
			//return $q->row()->salevalue;
			return $q->row();
		}
        else{
            return 0;
        }
    }
	public function refresh_all_data(){
        
		//$this->db->trans_start();
		$this->db->where('transectionID>',0);
		$this->db->delete('transection_info');
		$this->db->where('saleID>',0);
		$this->db->delete('sale_info');
		$this->db->where('saleDetailsID>',0);
		$this->db->delete('sale_details');
		$this->db->where('expenseID>',0);
		$this->db->delete('expense_info');
		$this->db->where('exchangeID>',0);
		return $this->db->delete('exchange_info');
		//$this->db->trans_complete(); 
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
	public function get_all_shop_cash_amount()
	{
		
		$q=$this->db
				->select('shop_info.shopID,shop_info.shopTitle')
				->from('shop_info')
				->where('shopStatus',1)
				->get();
		if($q->num_rows()){
			//$totalShop = $q->num_rows();
			$shop_cash=$q->result();
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$date= $dt->format('Y-m-d 00:00:00');
			foreach($shop_cash as $cash){
				//echo $date."</br>" ; 
				$shop_id=$cash->shopID;
				$this->db->select_sum('transectionTotalAmount');
				$this->db->from('transection_info');
				$this->db->where('shop_info_transectionShopID',$shop_id);
				$this->db->where('transectionType',1);
				$this->db->where('transectionDate>=',$date);
				$query = $this->db->get();
				$income= $query->row()->transectionTotalAmount;
				//echo $income."</br>" ;
				$this->db->select_sum('transectionTotalAmount');
				$this->db->from('transection_info');
				$this->db->where('shop_info_transectionShopID',$shop_id);
				$this->db->where('transectionType',3);
				$this->db->where('transectionDate>=',$date);
				$query = $this->db->get();
				$return= $query->row()->transectionTotalAmount;
				$income=$income+$return;
				$this->db->select_sum('transectionTotalAmount');
				$this->db->from('transection_info');
				$this->db->where('transectionDate >=',$date);
				$this->db->where('shop_info_transectionShopID',$shop_id);
				$this->db->where('transectionType',2);
				$query = $this->db->get();
				$expense= $query->row()->transectionTotalAmount;
				$cash->cash_amount= $income-$expense;
			}
			return $shop_cash;
			//exit;
		}
		else{
			return FALSE;
		}
	}
	public function all_manager($limit,$offset)
	{
		
		$q=$this->db
				->select('*,shop_info.shopTitle')
				->from('admin_info')
				->join('shop_info','shop_info.shopID=admin_info.shop_info_shopID')
				->where('admin_role_roleID',4)
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_shop_id_name()
	{
		
		$q=$this->db
				->select('*')
				->from('shop_info')
				->where('shopStatus',1)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function check_admin_id($user_id)
	{
		
		$q=$this->db
				->select('adminUserID')
				->from('admin_info')
				->where('adminUserID',$user_id)
				->get();
				
		if($q->num_rows()){
			return False;
		}
		else{
			return true;
		}
	}
	
	public function add_user($data)
	{
		return $this->db->insert('admin_info', $data );
	}
	
	public function all_allStore_keeper($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('admin_info')
				//->join('shop_info','shop_info.shopID=admin_info.shop_info_shopID')
				->where('admin_role_roleID',3)
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_salesman_id_name()
	{
		$q=$this->db
				->select('salesman_info.salesmanID,salesman_info.salesmanName')
				->from('salesman_info')
				->where('salesmanStatus',1)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function all_salesman($limit,$offset)
	{
		
		$q=$this->db
				->select('*,shop_info.shopTitle')
				->from('salesman_info')
				->join('shop_info','shop_info.shopID=salesman_info.shop_info_shopID')
				//->where('admin_role_roleID',3)
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function add_sales_man($data)
	{
		return $this->db->insert('salesman_info', $data );
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
	public function get_sale_details_by_id($product_id)
	{
		$q=$this->db
				//->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,SUM(saleProductQuantity) as saleProductQuantityTotal')
				->select('sale_details.*,sale_info.saleDate,product_info.productName,product_info.productBarcode,shop_info.shopTitle')
				->from('sale_details')
				->join('sale_info','sale_details.sale_info_saleID=sale_info.saleID')
				->join('product_info','product_info.productID=sale_details.product_info_saleProductID')
				->join('shop_info','shop_info.shopID=sale_details.shop_info_shopID')
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
	
	public function update_product($data,$product_id)
	{
		return $this->db
					->where('productID',$product_id)
					->update('product_info',$data);
		
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
	public function get_user_details_by_id($admin_id)
	{
		$q=$this->db
				->select('*,shop_info.shopTitle')
				->from('admin_info')
				->join('shop_info','admin_info.shop_info_shopID=shop_info.shopID')
				->where('adminID',$admin_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_store_keeper_details_by_id($admin_id)
	{
		$q=$this->db
				->select('*')
				->from('admin_info')
				//->join('shop_info','admin_info.shop_info_shopID=shop_info.shopID')
				->where('adminID',$admin_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function update_user($data,$admin_id)
	{
		return $this->db
					->where('adminID',$admin_id)
					->update('admin_info',$data);
		
	}
	
	public function get_selaman_details_by_id($admin_id)
	{
		$q=$this->db
				->select('*,shop_info.shopTitle')
				->from('salesman_info')
				->join('shop_info','salesman_info.shop_info_shopID=shop_info.shopID')
				->where('salesmanID',$admin_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function update_saleman($data,$admin_id)
	{
		return $this->db
					->where('salesmanID',$admin_id)
					->update('salesman_info',$data);
		
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
				->select('exchange_info.*,product_info.productName,product_info.productBarcode')
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
	
	public function get_all_transection($limit,$offset)
	{
		
		$q=$this->db
				->select('transection_info.*,shop_info.shopTitle')
				->from('transection_info')
				->join('shop_info','transection_info.shop_info_transectionShopID=shop_info.shopID')
				->order_by("transectionDate","desc")
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	/*public function get_transection_by_dates($limit,$offset,$startDate,$endDate)*/
	public function get_transection_by_dates($startDate,$endDate)
	{
		$q=$this->db
				->select('transection_info.*,shop_info.shopTitle')
				->from('transection_info')
				->join('shop_info','transection_info.shop_info_transectionShopID=shop_info.shopID')
				->where('transectionDate >=',$startDate)
				->where('transectionDate <=',$endDate)
				->order_by("transectionDate","desc")
				//->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function total_income(){
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionDate>=',$date);
		$this->db->where('transectionType',1);
		$query = $this->db->get();
		$income= $query->row()->transectionTotalAmount;
		return $income;
	}
	
	public function total_expense(){
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionType',2);
		$this->db->where('transectionDate>=',$date);
		$query = $this->db->get();
		$expense= $query->row()->transectionTotalAmount;
		return $expense;
	}
	
	public function total_return(){
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionType',3);
		$this->db->where('transectionDate>=',$date);
		$query = $this->db->get();
		$return= $query->row()->transectionTotalAmount;
		return $return;
	}
	public function total_income_by_dates($startDate,$endDate){
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionDate >=',$startDate);
		$this->db->where('transectionDate <=',$endDate);
		$this->db->where('transectionType=1');
		$query = $this->db->get();
		$income= $query->row()->transectionTotalAmount;
		return $income;
	}
	
	public function total_expense_by_dates($startDate,$endDate){
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionDate >=',$startDate);
		$this->db->where('transectionDate <=',$endDate);
		$this->db->where('transectionType=2');
		$query = $this->db->get();
		$expense= $query->row()->transectionTotalAmount;
		return $expense;
	}
	
	public function total_return_by_dates($startDate,$endDate){
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('transection_info');
		$this->db->where('transectionDate >=',$startDate);
		$this->db->where('transectionDate <=',$endDate);
		$this->db->where('transectionType=3');
		$query = $this->db->get();
		$return= $query->row()->transectionTotalAmount;
		return $return;
	}
	
	public function get_salesman_id_for_invoice_by_sale_id($ref_id)
	{
		$q=$this->db
				->select('sale_info.salesman_info_salesmanID')
				->from('sale_info')
				->where('saleID',$ref_id)
				->get();
				
		if($q->num_rows()==1){
			return $q->row()->salesman_info_salesmanID;
		}
		else{
			return FALSE;
		}
	}
	public function get_expense_details_by_id($expense_id)
	{
		$q=$this->db
				->select('expense_info.*,transection_info.transectionID,admin_info.adminName,expense_field_info.expenseFieldName')
				//->select('expense_info.*,admin_info.adminName,expense_field_info.expenseFieldName')
				->from('expense_info')
				->join('transection_info','expense_info.expenseID=transection_info.transectionReferenceID')
				->join('admin_info','expense_info.expenceEntryBy=admin_info.adminID')
				->join('expense_field_info','expense_info.expenceFieldID=expense_field_info.expenseFieldID')
				->where('expenseID',$expense_id)
				->where('transection_info.transectionType',2)
				->get();
			
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_sale_info_by_id($sale_id,$saleman)
	{
		$this->db
				//->select('sale_info.*,shop_info.shopTitle,salesman_info.salesmanName')
				->select('sale_info.*,shop_info.shopTitle')
				->from('sale_info')
				->join('shop_info','sale_info.shop_info_saleShopID=shop_info.shopID');
				if($saleman>0){
				$this->db->select('salesman_info.salesmanName')
						->join('salesman_info','sale_info.salesman_info_salesmanID=salesman_info.salesmanID');
				}
				//->group_by('sale_details.product_info_saleProductID')
				//->where('sale_details.product_info_saleProductID',$product_id)
				//->where('sale_details.shop_info_shopID',$shop_id)
				$this->db->where('saleID',$sale_id);
			$q=$this->db->get();
				
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_sale_info_details_by_id($sale_id)
	{
		$q=$this->db
				//->select('sale_info.*,shop_info.shopTitle,salesman_info.salesmanName')
				->select('sale_details.*,product_info.productName')
				->from('sale_details')
				->join('product_info','sale_details.product_info_saleProductID=product_info.productID')
				->where('sale_info_saleID',$sale_id)
			    ->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_salesman_report_by_dates($startDate,$endDate)
	{
		$this->db
				->select('sale_info.*,salesman_info.salesmanName,shop_info.shopTitle')
				->from('sale_info')
				->join('salesman_info','sale_info.salesman_info_salesmanID=salesman_info.salesmanID')
				->join('shop_info','sale_info.shop_info_saleShopID=shop_info.shopID')
				->where('saleDate >=',$startDate)
				->where('saleDate <=',$endDate)
				->order_by("sale_info.saleDate", "desc");
				//->limit($limit,$offset)
		$q=$this->db->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_salesman_report_by_dates_by_id($startDate,$endDate,$salesman_id)
	{
		$this->db
				->select('sale_info.*,salesman_info.salesmanName,shop_info.shopTitle')
				->from('sale_info')
				->join('salesman_info','sale_info.salesman_info_salesmanID=salesman_info.salesmanID')
				->join('shop_info','sale_info.shop_info_saleShopID=shop_info.shopID')
				->where('saleDate >=',$startDate)
				->where('saleDate <=',$endDate)
			    ->where('salesman_info_salesmanID',$salesman_id)
				->order_by("sale_info.saleDate", "desc");
				//->limit($limit,$offset)
		$q=$this->db->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_salesman_report($limit,$offset)
	{
		$q=$this->db
				->select('sale_info.*,salesman_info.salesmanName,shop_info.shopTitle')
				->from('sale_info')
				->join('salesman_info','sale_info.salesman_info_salesmanID=salesman_info.salesmanID')
				->join('shop_info','sale_info.shop_info_saleShopID=shop_info.shopID')
				//->where('sale_info.salesman_info_salesmanID>',0)
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
}