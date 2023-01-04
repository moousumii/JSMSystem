<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StoreKeeper extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('storekeeper_model');
		if($this->session->userdata('user_role')!=3)return redirect('login/');
	}
	
	public function index(){
		$this->load->view('store_keeper/dashBoard');
	}
	public function myAccount(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->storekeeper_model->my_info($admin_id);
		$this->load->view('store_keeper/myAccount',['info'=>$user]);
	}
	public function updateContact(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->storekeeper_model->my_info($admin_id);
		if($user){
			//$this->load->view('store_keeper/header',['info'=>$user]);
			$data['adminContact']=$this->input->post('contact');
			if($this->storekeeper_model->update_contact($admin_id,$data)){
				$this->session->set_flashdata('feedback_successfull', 'Updated contact successfully');
				return redirect('storeKeeper/myAccount');
			}
			else {
				$this->session->set_flashdata('feedback_failed', 'Updating contact failed!');
				return redirect('storeKeeper/myAccount');
			}
		}
		else
			return redirect('login/');

	}
	
	public function updatePassword(){

		$admin_id=$this->session->userdata('admin_id');
		$user=$this->storekeeper_model->my_info($admin_id);
		if($user){
			$this->load->library('form_validation');
			if($this->form_validation->run('update_password')){
				$data=$this->input->post();
				//print_r($data); print_r($user); exit;
				if($user->adminPassword==$data['old_pass']){
					$password['adminPassword']=$data['new_pass'];
					//print_r($password); exit;
					if($this->storekeeper_model->change_password($password,$admin_id)){
							//echo "user Add Successful";
							$this->session->set_flashdata('feedback_successfull', 'Changed Password Successfully');
							return redirect('login/logout');
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Failed to Change Password');
						return redirect('storeKeeper/myAccount');
					}

				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Old Password is not Matching ');
					return redirect('storeKeeper/myAccount');
				}

			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Please Try Again');
				$this->load->view('store_keeper/myAccount',['info'=>$user]);
			}
		}
		else
			return redirect('login/');
	}
	public function addNewProduct(){
		$data['groupInfo']=$this->storekeeper_model->get_all_group_id_name();
		$data['supplierInfo']=$this->storekeeper_model->get_all_supplier_id_name();
		//print_r($data);exit;
		$this->load->view('store_keeper/addNewProduct',['infos'=>$data]);
	}
	public function storeNewProduct(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_new_product')){
			$data=$this->input->post();
			if($this->storekeeper_model->add_new_product($data)){
				$this->session->set_flashdata('feedback_successfull', 'Added New Product Successfully');
				return redirect('storeKeeper/viewProduct');
			}
			else{
				$this->session->set_flashdata('feedback_failed','Add New Product Failed!');
				return redirect('storeKeeper/viewProduct');
			}
			
		}
		else{
			$data['groupInfo']=$this->storekeeper_model->get_all_group_id_name();
			$data['supplierInfo']=$this->storekeeper_model->get_all_supplier_id_name();
			//print_r($data);exit;
			$this->load->view('store_keeper/addNewProduct',['infos'=>$data]);
		}
	}
	public function addProductToStock(){
		$products=$this->storekeeper_model->get_all_product_id_name();
		$this->load->view('store_keeper/addProductToStock',['products'=>$products]);
	}
	public function ajax_productBarcodeInfoByID(){
		$product_id=$this->input->post('product_id');
		$product_details=$this->storekeeper_model->get_product_barcode_info_by_id($product_id);
		//print_r($product_details->productID);exit;
		if($product_details){
			$data = array(
				'productName'=>$product_details->productName,
				'productSalePrice'=>$product_details->productSalePrice,
				'productBarcode'=>$product_details->productBarcode,
				'status'=>true
				);
			echo json_encode($data);
		}
		else{
			$data = array(
				'status'=>false
				);
			echo json_encode($data);
		}
		
		//print_r($products);exit;
	}
	public function ajax_productInfoByID(){
		$product_id=$this->input->post('product_id');
		$product_details=$this->storekeeper_model->get_product_info_by_id($product_id);
		//print_r($product_details->productID);exit;
		if($product_details){
			$data = array(
				'product_id'=>$product_details->productID,
				'productSalePrice'=>$product_details->productSalePrice,
				'productPurchasePrice'=>$product_details->productPurchasePrice,
				'productQuantity'=>$product_details->productQuantity,
				'productGroupName'=>$product_details->groupName,
				'productSupplierName'=>$product_details->supplierCompanyName,
				'status'=>true
				);
			echo json_encode($data);
		}
		
		//print_r($products);exit;
	}
	public function storeProductToStock(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_product_to_stock')){
			$data=$this->input->post();
			$product_id=$this->input->post('productID');
			$product_quantity=$this->input->post('productQuantity');
			unset($data['productID'],$data['productQuantity']);
			if($this->storekeeper_model->add_product_to_stock($data,$product_id,$product_quantity)){
				$this->session->set_flashdata('feedback_successfull', 'Added Product To Stock Successfully');
				return redirect('storeKeeper/viewProduct');
			}
			else{
				$this->session->set_flashdata('feedback_failed','Add Product To Stock Failed!');
				return redirect('storeKeeper/viewProduct');
			}
			
		}
		else{
			$products=$this->storekeeper_model->get_all_product_id_name();
			$this->load->view('store_keeper/addProductToStock',['products'=>$products]);
		}
		
	}
	
	public function addSupplier(){
		$this->load->view('store_keeper/addSupplier');
	}
	public function storeSupplier(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_supplier')){
			$data=$this->input->post();
			if($this->storekeeper_model->add_supplier($data)){
				$this->session->set_flashdata('feedback_successfull', 'Added New Supplier Successfully');
				return redirect('storeKeeper/allSupplier');
			}
			else{
				$this->session->set_flashdata('feedback_failed','Add Supplier Failed!');
				return redirect('storeKeeper/allSupplier');
			}
			
		}
		else{
			$this->load->view('store_keeper/addSupplier');
		}
	}
	public function allSupplier(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('supplier_info')->num_rows();
		$config['base_url']=base_url('storeKeeper/allSupplier');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->storekeeper_model->all_supplier($config['per_page'],$this->uri->segment(3));
		$this->load->view('store_keeper/allSupplier',['infos'=>$data]);
	}
	public function detailsSupplier($supplier_id){
		$supplier=$this->storekeeper_model->get_supplier_details_by_id($supplier_id);
		$this->load->view('store_keeper/detailsSupplier',['infos'=>$supplier]);
	}
	public function editSupplier($supplier_id){
		$supplier=$this->storekeeper_model->get_supplier_details_by_id($supplier_id);
		$this->load->view('store_keeper/editSupplier',['infos'=>$supplier]);
	}
	public function updateSupplier($supplier_id){
		//print_r("YES");exit;
		$this->load->library('form_validation');
		if($this->form_validation->run('add_supplier')){
			$data=$this->input->post();
			if($this->storekeeper_model->update_supplier($data,$supplier_id)){
				$this->session->set_flashdata('feedback_successfull', 'Updated Supplier Successfully');
				return redirect('storeKeeper/detailsSupplier/'.$supplier_id);
			}
			else{
				$this->session->set_flashdata('feedback_failed','Update Supplier Failed!');
				return redirect('storeKeeper/detailsSupplier/'.$supplier_id);
			}
			
		}
		else{
			$supplier=$this->storekeeper_model->get_supplier_details_by_id($supplier_id);
			$this->load->view('store_keeper/editSupplier',['infos'=>$supplier]);
		}
	}
	
	public function showInventory(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_info')->num_rows();
		$config['base_url']=base_url('storeKeeper/showInventory');
		$config['per_page']=15;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->storekeeper_model->get_view_product_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('store_keeper/showInventory',['infos'=>$data]);
	}
	public function ajaxShowInventoryFilter(){
		
		$query=$this->storekeeper_model->filter_product_info($this->input->post('arr'));
		$data = array(
				'status'=>true, 
				'infos'=>$query
				);
		if('IS_AJAX')  
        {  
            //echo json_encode($data); //echo json string if ajax request  
            echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }  
	}
	public function viewProduct(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_info')->num_rows();
		$config['base_url']=base_url('storeKeeper/viewProduct');
		$config['per_page']=15;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->storekeeper_model->get_view_product_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('store_keeper/viewProduct',['infos'=>$data]);
	}	
	public function productDetails($productID){
		$product=$this->storekeeper_model->get_product_details_by_id($productID);
		/*$this->load->library('pagination');
		$config['total_rows']=$this->db->where('product_info_saleProductID',$productID)->get('sale_details')->num_rows();
		$config['base_url']=base_url('storeKeeper/productDetails');
		$config['per_page']=12;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$sale_info=$this->storekeeper_model->get_sale_details_by_id($config['per_page'],$this->uri->segment(3),$productID);*/
		$sale_info=$this->storekeeper_model->get_sale_details_by_id($productID);
		$data['groupInfo']=$this->storekeeper_model->get_all_group_id_name();
		$data['supplierInfo']=$this->storekeeper_model->get_all_supplier_id_name();
		//print_r($sale_info);exit;
		$this->load->view('store_keeper/productDetails',['infos'=>$product,'data'=>$data,'sale_infos'=>$sale_info]);
	}
	public function updateProduct(){
		$this->load->library('form_validation');
		//print_r($this->input->post());exit;
		if($this->form_validation->run('update_product')){
			$data=$this->input->post();
			$product_id=$this->input->post('productID');
			unset($data['productID']);
			if($this->storekeeper_model->update_product($data,$product_id)){
				$this->session->set_flashdata('feedback_successfull', 'Updated Product Successfully');
				return redirect('storeKeeper/productDetails/'.$product_id);
			}
			else{
				$this->session->set_flashdata('feedback_failed','Update Product To Stock Failed!');
				return redirect('storeKeeper/productDetails/'.$product_id);
			}
			
		}
		else{
			$productID=$this->input->post('productID');
			$product=$this->storekeeper_model->get_product_details_by_id($productID);
			$data['groupInfo']=$this->storekeeper_model->get_all_group_id_name();
			$data['supplierInfo']=$this->storekeeper_model->get_all_supplier_id_name();
			$this->load->view('store_keeper/productDetails',['infos'=>$product,'data'=>$data]);
		}
		
	}
	public function printBarcode(){
		$products=$this->storekeeper_model->get_all_product_id_name();
		$this->load->view('store_keeper/printBarcode',['products'=>$products]);
	}
	
	public function allProductGroup(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_group_info')->num_rows();
		$config['base_url']=base_url('storeKeeper/allProductGroup');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->storekeeper_model->all_product_group($config['per_page'],$this->uri->segment(3));
		$this->load->view('store_keeper/allProductGroup',['infos'=>$data]);
	}
	
	public function addProductGroup(){
		$this->load->view('store_keeper/addProductGroup');
	}
	public function storeProductGroup(){
		
		$data=$this->input->post();
		if($this->storekeeper_model->add_product_group($data)){
			$this->session->set_flashdata('feedback_successfull', 'Added New Product Group Successfully');
			return redirect('storeKeeper/allProductGroup');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Add Product Group Failed!');
			return redirect('storeKeeper/addProductGroup');
		}
	}
	public function ajax_editGroup($group_id){
		$data=$this->input->post();
			//print_r($product_id);
			//print_r($data);exit;
			if($this->storekeeper_model->update_group($data,$group_id)){
				$data = array(
				'groupName'=>$data['groupName'],
				'groupStatus'=>$data['groupStatus'],
				'status'=>true
				);
				echo json_encode($data);
			}
			else{
				$data = array(
					'status'=>false
					);
				echo json_encode($data);
			}
	}
	public function productSaleReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['saleStartDate']= date('Y-m-d 00:00:00', strtotime($data['saleStartDate']));
			$data['saleEndDate']= date('Y-m-d 23:59:59', strtotime($data['saleEndDate']));
			$sale_info=$this->storekeeper_model->get_sale_report_by_dates($data['saleStartDate'],$data['saleEndDate']);
			$flag['flag']=0;
			$this->load->view('store_keeper/productSaleReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('sale_details')->num_rows();
			$config['base_url']=base_url('storeKeeper/productSaleReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$sale_info=$this->storekeeper_model->get_sale_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$sale_info=0;
			$flag['flag']=0;
			$this->load->view('store_keeper/productSaleReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		
	}
	
	public function returnReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['returnStartDate']= date('Y-m-d 00:00:00', strtotime($data['returnStartDate']));
			$data['returnEndDate']= date('Y-m-d 23:59:59', strtotime($data['returnEndDate']));
			//print_r($data); exit;
			$data=$this->storekeeper_model->get_return_report_by_dates($data['returnStartDate'],$data['returnEndDate']);
			$flag['flag']=0;
			$this->load->view('store_keeper/returnReport',['infos'=>$data,'flag'=>$flag]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('exchange_info')->num_rows();
			$config['base_url']=base_url('storeKeeper/returnReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$data=$this->storekeeper_model->get_return_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$data=0;
			$flag['flag']=0;
			$this->load->view('store_keeper/returnReport',['infos'=>$data,'flag'=>$flag]);
		}
	}
	
	public function oldReturnReportDetails($return_id){
		$data['return']=$this->storekeeper_model->get_old_return_details_by_id($return_id);
		$data['exchange']=$this->storekeeper_model->get_old_return_exchange_details_by_id($return_id);
		//print_r($data);exit;
		$this->load->view('store_keeper/oldReturnReportDetails',['infos'=>$data]);
	}

	public function ReturnReportDetails($return_id){
		$data['billInfo']=$this->storekeeper_model->get_return_info_by_id($return_id);
		$data['return']=$this->storekeeper_model->get_return_details_by_id($return_id);
		$data['exchange']=$this->storekeeper_model->get_return_exchange_details_by_id($return_id);
		//print_r($data);exit;
		$this->load->view('store_keeper/ReturnReportDetails',['infos'=>$data]);
	}

	public function productUpdateStokeReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['saleStartDate']= date('Y-m-d 00:00:00', strtotime($data['saleStartDate']));
			$data['saleEndDate']= date('Y-m-d 23:59:59', strtotime($data['saleEndDate']));
			$sale_info=$this->storekeeper_model->get_stock_report_by_dates($data['saleStartDate'],$data['saleEndDate']);
			$flag['flag']=0;
			$this->load->view('store_keeper/productUpdateStockReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('product_update_info')->num_rows();
			$config['base_url']=base_url('storeKeeper/productUpdateStokeReport');
			$config['per_page']=12;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$sale_info=$this->storekeeper_model->get_stock_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$sale_info=0;
			$flag['flag']=0;
			$this->load->view('store_keeper/productUpdateStockReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		
	}
	
}