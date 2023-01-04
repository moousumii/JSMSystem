<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {
	/* Total Cash */
	public function get_total_cash_amount()
	{
		$cash=0;
		$expense=0;
		$income =$this->db->select_sum('transectionTotalAmount')
				 ->from('transection_info')
				 ->where("(transectionType = '1' OR transectionType = '3' OR transectionType = '4' OR transectionType = '8' OR transectionType = '9' OR transectionType = '11') ")
		         ->get();
		$cash= $income->row()->transectionTotalAmount;
		
		$q =$this->db->select_sum('transectionTotalAmount')
				 ->from('transection_info')
				 ->where("(transectionType = '5' OR transectionType = '10' OR transectionType = '12') ")
		         ->get();
		$expense=$q->row()->transectionTotalAmount;
		$totalAmount=$cash-$expense;
		return $totalAmount;
		
	}

	/*DateTime Function*/
	public function get_current_date_time()
	{
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date=$dt->format('Y-m-d H:i:s');
		return $date;
	}

	/*My Account Start*/
	public function get_user_details_by_id($id)
	{
		
		$data=$this->db
				->select('*,admin_role.roleID,admin_role.roleName')
				->from('admin_info')
				->join('admin_role','admin_role.roleID=admin_info.admin_role_roleID')
				->where('adminID',$id)
				->where('admin_role_roleID>',1)
				->get();
				
		if($data){
			return $data->row();
		}
	}

	public function get_user_pass_by_id($id){
		$data=$this->db
					->select('adminPassword')
					->from('admin_info')
					->where('adminID',$id)
					->get();

		if($data){
			return $data->row()->adminPassword;
		}
	}

	public function update_user_pass($password,$id){
		$data=$this->db
						->where('adminID',$id)
						->update('admin_info', $password );	
		return $data;
	}
	/*My Account End*/
	
	/*Expense Field Start*/
	public function insert_expense_field($data){
		$data['expenseFieldAddedDate']=$this->manager_model->get_current_date_time();
		return $this->db->insert('expense_field_info',$data);
	}
	public function get_all_expense_field(){
		$data=$this->db 
						->select('*')
						->from('expense_field_info')
						->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_expense_field_details_by_id($id){
		$data=$this->db
						->select('*')
						->from('expense_field_info')
						->where('expenseFieldID',$id)
						->get();
			if($data){
				return $data->row();
			}
	}
	public function update_expense_field($data,$id){
		unset($data['expenseFieldID']);
		$data=$this->db
		  				->where('expenseFieldID',$id)
		   				->update('expense_field_info',$data);
		 return  $data;
	}
	/*Expense Field End*/

	/*Expense Start*/
	public function get_expenseFieldID_expenseFieldName(){
		$data=$this->db
						->select('expense_field_info.expenseFieldID, expense_field_info.expenseFieldName')
						->from('expense_field_info')
						->where('expenseFieldStatus','1')
						->get();
		if($data){
			return $data->result();
		}
	}
	public function insert_expense($data){

		$this->db->trans_start();

		$data['expenseDate']=$this->manager_model->get_current_date_time();
		$data['expenseEntryBy']=$this->session->userdata('admin_id');
		$expense=$this->db->insert('expense_info',$data);
		$expenseid=$this->db->insert_id();

		$transaction['transectionDate']=$this->manager_model->get_current_date_time();
		$transaction['transectionBy']=$this->session->userdata('admin_id');
		$transaction['transectionType']='2';
		$transaction['transectionReferenceID']=$expenseid;
		$transaction['transectionTotalAmount']=$data['expenseAmount'];
		$transaction['transectionDetails']=$data['expenseDetails'];
		$this->db->insert('transection_info',$transaction);

		$transaction['cashType']=2;
		$this->db->insert('cash_book', $transaction);

		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	public function get_all_expense($fDate,$lDate){
		$data=$this->db
						->select('*,expense_field_info.expenseFieldName')
						->from('expense_info')
						->join('expense_field_info','expense_field_info.expenseFieldID=expense_info.expense_field_info_expenseFieldID')
						->where('expenseDate>=', $fDate)
						->where('expenseDate<=', $lDate)
						->order_by('expenseDate','desc')
						->get();

		if($data)
			{
				return $data->result();
			}
	}
	public function get_expense_details_by_id($id){
		$data=$this->db
						->select('*,expense_field_info.expenseFieldName')
						->from('expense_info')
						->join('expense_field_info','expense_field_info.expenseFieldID=expense_info.expense_field_info_expenseFieldID')
						->where('expenseID',$id)
						->get();
			if($data){
				return $data->row();
			}
	}
	/*Expense End*/

	/*Receive Payment Start*/
	public function insert_receive_payment($data){

		$this->db->trans_start();

		$data['transectionDate']=$this->manager_model->get_current_date_time();
		$data['transectionBy']=$this->session->userdata('admin_id');
		$data['transectionType']='11';
		if($this->db->insert('transection_info',$data)){
			$id=$this->db->insert_id();
			$this->db
					->where('clientID',$data['client_info_transectionClientId'])
					->set('clientBalance', 'clientBalance -' .$data['transectionTotalAmount'], FALSE)
					->update('client_info');

			$data['cashType']=1;
			$data['transectionReferenceID']=$id;
			$this->db->insert('cash_book', $data );

			$this->db
				 ->where('transectionID',$id)
				 ->set('transectionReferenceID', $id, FALSE)
				 ->update('transection_info');

		}

		$this->db->trans_complete();
		return $this->db->trans_status() ;
		
	}
	/*Receive Payment End*/

	/*Bill Start*/
	public function get_clientID_clientName(){
		$data=$this->db
						->select('client_info.clientID, client_info.clientContactName')
						->from('client_info')
						->where('clientStatus','1')
						->get();
		if($data){
			return $data->result();
		}
	}
	public function insert_bill($data){
		$this->db->trans_start();
		$data['billAddedDate']=$this->manager_model->get_current_date_time();
		$data['billAddedBy']=$this->session->userdata('admin_id');

		$this->db
				->where('clientID',$data['client_info_supplierId'])
				->set('clientBalance', 'clientBalance+' .$data['billAmount'], FALSE)
				->update('client_info');

		$bill=$this->db->insert('bill_info',$data);
		$billid=$this->db->insert_id();

		$transaction['transectionDate']=$this->manager_model->get_current_date_time();
		$transaction['transectionBy']=$this->session->userdata('admin_id');
		$transaction['transectionType']='12';
		$transaction['transectionReferenceID']=$billid;
		$transaction['client_info_transectionClientId']=$data['client_info_supplierId'];
		$transaction['transectionTotalAmount']=$data['billAmount'];
		$transaction['transectionDetails']=$data['billDetails'];
	    $this->db->insert('transection_info',$transaction);
	    $this->db->trans_complete();
		return $this->db->trans_status();
	}
	/*Bill End*/

	/*Client Start*/
	public function insert_new_client($data){
		$data['clientAddedDate']=$this->manager_model->get_current_date_time();
		$data['clientAddedBy']=$this->session->userdata('admin_id');
        $data['businessStartedSince']=date('Y-m-d', strtotime($data['businessStartedSince']));
		return $this->db->insert('client_info',$data);
	}
	public function get_all_client(){
		$data=$this->db 
						->select('*')
						->from('client_info')
						->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_client_details_by_id($id){
		$data=$this->db
						->select('*')
						->from('client_info')
						->where('clientID',$id)
						->get();
			if($data){
				return $data->row();
			}
	}
	public function get_client_transection_by_id($id){
		$data=$this->db
					->select('transectionID,transectionTotalAmount,transectionDate,transectionTypeName,transectionTypeLink')
					->from('transection_info')
					->join('transection_type_info','transection_type_info.transactionTypeId=transection_info.transectionType')
					->where('client_info_transectionClientId',$id)
					->get();
			if($data){
				return $data->result();
			}
	}
	public function update_new_client($data,$id){
		unset($data['clientID']);
		$data=$this->db
		  				->where('clientID',$id)
		   				->update('client_info',$data);
		 return  $data;
	}
	/*Client End*/

	/*View Stock Start*/
	public function get_all_product($infos){
		$data=$this->db
						->select('*,product_type_info.productTypeName,product_status_info.statusTitle')
						->from('product_info')
						->join('product_type_info','product_type_info.productTypeID=product_info.product_type_info_productTypeID')
						->join('quality_price_info','quality_price_info.qualityId=product_info.quality_price_info_qualityId')
						->join('product_status_info','product_status_info.productStatusId=product_info.product_status_info_productStatusId')
						->order_by('productAddedDate','desc');
					if($infos){
						$this->db->where('product_info.product_type_info_productTypeID',$infos['product_type_info_productTypeID']);
					}
			$data=$this->db->get();

		if($data)
			{
				return $data->result();
			}
	}
	public function get_all_product_in_stock($infos){
		$this->db
			->select('*,product_type_info.productTypeName,product_status_info.statusTitle')
			->from('product_info')
			->join('product_type_info','product_type_info.productTypeID=product_info.product_type_info_productTypeID')
			->join('quality_price_info','quality_price_info.qualityId=product_info.quality_price_info_qualityId')
			->join('product_status_info','product_status_info.productStatusId=product_info.product_status_info_productStatusId')
			->where('product_status_info_productStatusId',1);
		if($infos){
			$this->db->where('product_info.product_type_info_productTypeID',$infos['product_type_info_productTypeID']);
		}
		$this->db->order_by('productAddedDate','desc');
		$data=$this->db->get();

		if($data)
			{
				return $data->result();
			}
	}
	public function get_product_details_by_id($id){
		$data=$this->db
						->select('*,product_type_info.productTypeName,product_status_info.statusTitle')
						->from('product_info')
						->join('product_type_info','product_type_info.productTypeID=product_info.product_type_info_productTypeID')
						->join('product_status_info','product_status_info.productStatusId=product_info.product_status_info_productStatusId')
						->where('productId',$id)
						->get();
			if($data){
				return $data->row();
			}
	}
	public function update_product($data,$id){
		unset($data['productId']);
		$data=$this->db
		  				->where('productId',$id)
		   				->update('product_info',$data);
		 return  $data;
	}
	/*View Stock End*/

	/*Product Start*/
	public function get_quality_price_info_qualityId($id){
		$data=$this->db 
						->select('quality_price_info_qualityId')
						->from('product_type_info')
						->where('productTypeID',$id)
						->get();
		if($data){
			return $data->row()->quality_price_info_qualityId;
		}
	}
	public function get_productTypeID_productTypeName(){
		$data=$this->db
						->select('product_type_info.productTypeID, product_type_info.productTypeName')
						->from('product_type_info')
						->where('productTypeStatus','1')
						->get();
		if($data){
			return $data->result();
		}
	}
	public function get_productStatusId_statusTitle(){
		$data=$this->db
						->select('product_status_info.productStatusId, product_status_info.statusTitle')
						->from('product_status_info')
						->get();
		if($data){
			return $data->result();
		}
	}
	public function insert_product($data){
		$this->db->trans_start();
		$data['productAddedDate']=$this->manager_model->get_current_date_time();
		$data['quality_price_info_qualityId']=$this->manager_model->get_quality_price_info_qualityId($data['product_type_info_productTypeID']);
		$product=$this->db->insert('product_info',$data);
		$productId=$this->db->insert_id();

		$sum=1000+$productId;
		$typeId = sprintf("%02d", $data['product_type_info_productTypeID']);
		$productCode['productBarcode']=($typeId.''.$sum);
		/*print_r($productCode['productBarcode']);
		exit();*/
		$this->db->where('productId',$productId)
				 ->update('product_info',$productCode);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	/*Product End*/

	/*Add Product Type Start*/
	public function get_qualityId_qualityName(){
		$data=$this->db
						->select('quality_price_info.qualityId, quality_price_info.quality')
						->from('quality_price_info')
						->where('qualityStatus','1')
						->get();
		if($data){
			return $data->result();
		}
	}
	public function insert_product_type($data){
		$data['productTypeAddedDate']=$this->manager_model->get_current_date_time();
		return $this->db->insert('product_type_info',$data);
	}
	public function get_all_product_type(){
		$data=$this->db 
						->select('*')
						->from('product_type_info')
						->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_product_type_details_by_id($id){
		$data=$this->db
						->select('*,quality_price_info.quality')
						->from('product_type_info')
						->join('quality_price_info','quality_price_info.qualityId=product_type_info.quality_price_info_qualityId')
						->where('productTypeID',$id)
						->get();
			if($data){
				return $data->row();
			}
	}
	public function update_product_type($data,$id){
		unset($data['productTypeID']);
		$data=$this->db
		  				->where('productTypeID',$id)
		   				->update('product_type_info',$data);
		 return  $data;
	}
	/*Add Product Type End*/

	/* Sale Start*/

	public function save_sale_info($data,$cart)
	{
		$this->db->trans_start();

		$this->db->insert('sale_info', $data );
		$error = $this->db->error();
		if($error['code']!=0){
			return false;
			
		}
		$sale_id= $this->db->insert_id();
		foreach ($cart as $product) {

            $products=array(
                'product_info_saleProductID'=>$product['id'],
                'saleProductQuantity'=>1,
                'salePrice'=>($product['price']*$product['weight'])+$product['additional_cost'],
                'saleProductWeight'=>$product['weight'],
                'sale_info_saleID'=>$sale_id,
                'saleDetailsDate'=>$data['saleDate']

            );
            //print_r( $products); exit;
			$this->db
			    ->where('productID',$products['product_info_saleProductID'])
				->set('productQuantity', 'productQuantity - ' . (int) $products['saleProductQuantity'], FALSE)
				->set('productSaleCounter', 'productSaleCounter + ' .(int) $products['saleProductQuantity'], FALSE)
				->set('product_status_info_productStatusId','2', FALSE)
				->update('product_info');
            $this->db->insert('sale_details', $products );
        }
			$transection['transectionType']=1;
			$transection['transectionReferenceID']=$sale_id;
			$transection['transectionDetails']="Sale";
			$transection['transectionBy']=$this->session->userdata('admin_id');
			$transection['transectionDate']=$data['saleDate'];
			$transection['transectionTotalAmount']=$data['saleTotalAmount'];
			$transection['client_info_transectionClientId']=$data['client_info_saleClientID'];
			$this->db->insert('transection_info', $transection );
			$transection['cashType']=1;
			$transection['transectionTotalAmount']=$data['receivedTotal'];
			$this->db->insert('cash_book', $transection );

		// due check

		if($data['saleTotalAmount']<0 || $data['saleTotalAmount']>$data['receivedTotal']){
			$due=$data['saleTotalAmount']-$data['receivedTotal'];
			$this->db
			    ->where('clientID',$data['client_info_saleClientID'])
				->set('clientBalance',$due, FALSE)
				->update('client_info');
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			$sale_id = false;
		}		
		if($sale_id)
		{
			return $sale_id;
		}
		else return false;
	}
	


	public function get_sale_info_by_id($sale_id)
	{
		$this->db->select('sale_info.*,client_info.clientContactName,client_info.clientContactNumber,client_info.clientAddress')
				 ->from('sale_info')
				 ->join('client_info','client_info.clientID=sale_info.client_info_saleClientID')
				 ->where('saleID',$sale_id);
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
				->select('sale_details.*,product_info.productName,product_info.productBarcode')
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
	


	/* Sale End*/

	/* return product start */

	public function save_return_info($data)
	{

		$this->db->trans_start();
		$barcode=$data['returnProductID'];
		$q=$this->db->select('productId')->from('product_info')->where('productBarcode',$barcode)->get();
		if($q->num_rows()==1){
			$data['returnProductID']=$q->row()->productId;
		}
		else{
			return false;
		}

		$data['returnReceivedBy']=$this->session->userdata('admin_id');
		//$data['returnProductID']=;
		$this->db->insert('exchange_info', $data );
		$return_id= $this->db->insert_id();
		
		if($data['returnType']==1){

			$transection['transectionType']=4;
			$transection['transectionReferenceID']=$return_id;
			$transection['transectionDetails']=$data['returnNote'];
			$transection['transectionBy']=$data['returnReceivedBy'];
			$transection['transectionDate']=$data['returnDate'];
			$transection['transectionTotalAmount']=$data['returnTotalPrice'];
			$this->db->insert('transection_info', $transection );
			$transection['cashType']=2;
			$this->db->insert('cash_book', $transection );
		}
		else{
			$transection['transectionType']=3;
			$transection['transectionReferenceID']=$return_id;
			$transection['transectionDetails']=$data['returnNote'];
			$transection['transectionBy']=$data['returnReceivedBy'];
			$transection['transectionDate']=$data['returnDate'];
			$transection['transectionTotalAmount']=$data['returnTotalPrice'];
			$this->db->insert('transection_info', $transection );
			$this->db
			    ->where('clientID',$data['client_info_saleClientID'])
				->set('clientBalance','clientBalance - '.$data['returnTotalPrice'], FALSE)
				->update('client_info');

		}
		
        $this->db
			 ->where('productID',$data['returnProductID'])
			 ->set('productQuantity', 'productQuantity +1', FALSE)
			 ->set('productSaleCounter', 'productSaleCounter - 1 ', FALSE)
			 ->set('product_status_info_productStatusId','1', FALSE)
			 ->update('product_info');

		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	public function get_return_info_by_id($id){
		$data=$this->db
			       ->select('exchange_info.*,client_info.clientContactName,client_info.clientContactNumber,client_info.clientAddress,product_info.productBarcode,transection_info.transectionID')
				   ->from('exchange_info')
				   ->join('client_info','client_info.clientID=exchange_info.client_info_saleClientID')
				   ->join('product_info','product_info.productId=exchange_info.returnProductID')
				   ->join('transection_info','transection_info.transectionReferenceID=exchange_info.returnID')
				   ->where('returnID',$id)
				   ->where('transectionType>',2)
				   ->where('transectionType<',5)
			       ->get();
		if($data->num_rows()==1)
		{
			return $data->row();
		}	
	}
	

	/* return product end */

	/*Stock Report Start*/
	public function get_total_product(){
		$data=$this->db
				        ->select('*')
						->from('product_info')
						->where('product_status_info_productStatusId',1)
				        ->get();
		if($data)
		{
			return $data->num_rows();
		}
	}

	public function get_total_weight(){
		$data=$this->db
				        ->select_sum('productWeight')
						->from('product_info')
						->where('product_status_info_productStatusId',1)
				        ->get();
		if($data)
		{
			return $data->row()->productWeight;
		}
	}
	
	public function get_total_price(){
		$data=$this->db
				        ->select_sum('productAdditionalCost')
						->from('product_info')
						->where('product_status_info_productStatusId',1)
				        ->get();
		if($data)
		{
			return $data->row()->productAdditionalCost;
		}
	}
	/*Stock Report End*/

	/*Sale Report Start*/
	public function get_all_saleReport($infos)
	{
		$data=$this->db 
					->select('saleID,saleDate,saleTotalAmount,previousDue,client_info.clientContactName')
					->from('sale_info')
					->join('client_info','client_info.clientID=sale_info.client_info_saleClientID')
					->where('saleDate>=', $infos['firstDate'])
					->where('saleDate<=', $infos['lastDate'])
				 	->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_all_soldProduct($infos)
	{
		$this->db 
			 ->select('sale_details.product_info_saleProductID,sale_details.saleProductWeight,sale_details.salePrice,product_info.productBarcode,product_info.product_type_info_productTypeID,product_type_info.productTypeName')
			 ->from('sale_details')
			 ->join('product_info','product_info.productId=sale_details.product_info_saleProductID')
			 ->join('product_type_info','product_type_info.productTypeID=product_info.product_type_info_productTypeID')
			 ->where('saleDetailsDate>=', $infos['firstDate'])
			 ->where('saleDetailsDate<=', $infos['lastDate']);
			if($infos['productType']>0)
		$this->db->where('product_info.product_type_info_productTypeID', $infos['productType']);
		$this->db->where('product_status_info_productStatusId',2);
		$data=$this->db->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_all_newProduct($infos)
	{
		$this->db 
			 ->select('product_info.productId,product_info.productBarcode,product_info.productWeight,product_info.productAdditionalCost,product_type_info.productTypeName,quality_price_info.qualityPrice')
			 ->from('product_info')
			 ->join('product_type_info','product_type_info.productTypeID=product_info.product_type_info_productTypeID')
			 ->join('quality_price_info','quality_price_info.qualityId=product_info.quality_price_info_qualityId')
			 ->where('productAddedDate>=', $infos['firstDate'])
			 ->where('productAddedDate<=', $infos['lastDate']);
			if($infos['productType']>0)
		$this->db->where('product_info.product_type_info_productTypeID', $infos['productType']);
		$data=$this->db->get();
		if($data)
		{
			return $data->result();
		}

	}
	/*Sale Report End*/

	/*Transaction Report Start*/
	public function get_all_transaction($infos)
	{
		$data=$this->db 
					->select('*,transection_type_info.transectionTypeName,transection_type_info.transectionTypeLink')
					->from('transection_info')
					->join('transection_type_info','transection_type_info.transactionTypeId=transection_info.transectionType')
					->where('transectionDate>=', $infos['firstDate'])
					->where('transectionDate<=', $infos['lastDate'])
					->order_by('transectionDate','DESC')
				 	->get();
		if($data)
		{
			return $data->result();
		}

	}
	public function get_receive_payment_info_by_id($id)
	{
		$data=$this->db 
					->select('transection_info.*,client_info.clientContactName')
					->from('transection_info')
					->join('client_info','client_info.clientID=transection_info.client_info_transectionClientId')
					->where('transectionID', $id)
				 	->get();
		if($data->num_rows()>0)
		{
			return $data->row();
		}

	}
	public function get_add_bill_info_by_id($id)
	{
		$data=$this->db 
					->select('bill_info.*,client_info.clientContactName,transection_info.transectionID')
					->from('bill_info')
					->join('client_info','client_info.clientID=bill_info.client_info_supplierId')
					->join('transection_info','transection_info.transectionReferenceID=bill_info.billInfoId')
					->where('billInfoId', $id)
					->where('transectionType',12)
				 	->get();
		if($data->num_rows()==1)
		{
			return $data->row();
		}

	}
	/*Transaction Report End*/

	/*Admin Start*/
	public function get_unitPrice_details(){
		$data=$this->db
						->select('*')
						->from('quality_price_info')
						->get();
			if($data){
				return $data->result();
			}
	}

	public function update_unit_price($id,$data){
		unset($data['qualityId']);
		$data=$this->db
						->where('qualityId',$id)
						->update('quality_price_info',$data);
		return $data;
	}
	/*Admin End*/


	public function get_cash_amount(){
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');
		
		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('cash_book');
		$this->db->where('cashType',1);
		//$this->db->where('transectionDate>=',$date);
		$query = $this->db->get();
		$income= $query->row()->transectionTotalAmount;

		$this->db->select_sum('transectionTotalAmount');
		$this->db->from('cash_book');
		//$this->db->where('transectionDate >=',$date);
		$this->db->where('cashType',2);
		$query = $this->db->get();
		$expense= $query->row()->transectionTotalAmount;

		
		return $income-$expense;
	}
	
	public function get_cadit_transection($data){
		/*$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');*/
		
		$this->db->select('*')
				->from('cash_book')
				->join('transection_type_info','transection_type_info.transactionTypeId=cash_book.transectionType')
				->where('cashType',1)
				->where('transectionDate>=',$data['firstDate'])
				->where('transectionDate<=',$data['lastDate'])
				->order_by('transectionDate',"desc");
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	
	public function get_debit_transection($data){
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$date= $dt->format('Y-m-d 00:00:00');
		
		$this->db->select('*')
				->from(' cash_book')
				->join('transection_type_info','transection_type_info.transactionTypeId=cash_book.transectionType')
				->where('cashType',2)
				->where('transectionDate>=',$data['firstDate'])
				->where('transectionDate<=',$data['lastDate'])
				->order_by('transectionDate',"desc");
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	/*Cash in out*/

	public function save_cash_in_out_info($data){

		$this->db->trans_start();

		$data['transectionDate']=$this->manager_model->get_current_date_time();
		$data['transectionBy']=$this->session->userdata('admin_id');
		if($this->db->insert('transection_info',$data)){
			$id=$this->db->insert_id();

			if($data['transectionType']==6)
			$data['cashType']=1;
			else if($data['transectionType']==7) $data['cashType']=2;

			$data['transectionReferenceID']=$id;
			$this->db->insert('cash_book', $data );

			$this->db
				 ->where('transectionID',$id)
				 ->set('transectionReferenceID', $id, FALSE)
				 ->update('transection_info');

		}

		$this->db->trans_complete();
		return $this->db->trans_status() ;
		
	}
	public function get_cash_in_out_info_by_id($id){
		$data=$this->db 
					->select('transection_info.*,transection_type_info.transectionTypeName')
					->from('transection_info')
					->join('transection_type_info','transection_type_info.transactionTypeId=transection_info.transectionType')
					->where('transectionID', $id)
				 	->get();
		if($data->num_rows()==1)
		{
			return $data->row();
		}

	}

}