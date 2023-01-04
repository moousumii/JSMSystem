<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_model');
		if($this->session->userdata('user_role')!=2)return redirect('login/');
	}
	
	public function index(){
		$cash_amount=$this->admin_model->get_all_shop_cash_amount();
		$data['stockvalue']=$this->admin_model->stock_product_value();
		$data['salevalue']=$this->admin_model->sale_product_value();
		//print_r($data);exit;
		$this->load->view('admin/dashBoard',['infos'=>$cash_amount,'data'=>$data]);
	}
	public function refreshData(){
		$refresh=$this->admin_model->refresh_all_data();
		//print_r($refresh);exit;
		return redirect('admin/');
	}
	
	/***Profile ***/
	public function myAccount(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->admin_model->my_info($admin_id);
		$this->load->view('admin/myAccount',['info'=>$user]);
	}
	public function updateContact(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->admin_model->my_info($admin_id);
		if($user){
			//$this->load->view('super_admin/header',['info'=>$user]);
			$data['adminContact']=$this->input->post('contact');
			if($this->admin_model->update_contact($admin_id,$data)){
				$this->session->set_flashdata('feedback_successfull', 'Updated contact successfully');
				return redirect('admin/myAccount');
			}
			else {
				$this->session->set_flashdata('feedback_failed', 'Updating contact failed!');
				return redirect('admin/myAccount');
			}
		}
		else
			return redirect('login/');

	}
	
	public function updatePassword(){

		$admin_id=$this->session->userdata('admin_id');
		$user=$this->admin_model->my_info($admin_id);
		if($user){
			$this->load->library('form_validation');
			if($this->form_validation->run('update_password')){
				$data=$this->input->post();
				//print_r($data); print_r($user); exit;
				if($user->adminPassword==$data['old_pass']){
					$password['adminPassword']=$data['new_pass'];
					//print_r($password); exit;
					if($this->admin_model->change_password($password,$admin_id)){
							//echo "user Add Successful";
							$this->session->set_flashdata('feedback_successfull', 'Changed Password Successfully');
							return redirect('login/logout');
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Failed to Change Password');
						return redirect('admin/myAccount');
					}

				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Old Password is not Matching ');
					return redirect('admin/myAccount');
				}

			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Please Try Again');
				$this->load->view('admin/myAccount',['info'=>$user]);
			}
		}
		else
			return redirect('login/');
	}
	/*** Manager Part ***/
	
	public function allManager(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->where('admin_role_roleID',4)->get('admin_info')->num_rows();
		$config['base_url']=base_url('admin/allManager');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->all_manager($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/allManager',['infos'=>$data]);
	}
	public function addManager(){
		$shop_info=$this->admin_model->get_all_shop_id_name();
		$this->load->view('admin/addManager',['shop_info'=>$shop_info]);
	}
	public function storeManager(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_user')){
			$data=$this->input->post();
			$userID=$this->admin_model->check_admin_id($data['adminUserID']);
			//print_r($userID);exit;
			if($userID){
				unset($data['confirm_password']);
				if($this->admin_model->add_user($data)){
					$this->session->set_flashdata('feedback_successfull', 'Added New admin Successfully');
					return redirect('admin/allManager');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Add admin Failed!');
					return redirect('admin/allManager');
				}
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Given User ID is Already in Use');
				return redirect('admin/allManager');
			}
		}
		else{
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/addManager',['shop_info'=>$shop_info]);
		}
	}
	public function detailsManager($admin_id){
		//$this->load->view('admin/detailsadmin');
		$user=$this->admin_model->get_user_details_by_id($admin_id);
		$this->load->view('admin/detailsManager',['infos'=>$user]);
	}
	public function editManager($admin_id){
		$user=$this->admin_model->get_user_details_by_id($admin_id);
		$shop_info=$this->admin_model->get_all_shop_id_name();
		$this->load->view('admin/editManager',['infos'=>$user,'shop_info'=>$shop_info]);
		//$this->load->view('admin/editadmin');
	}	
	public function updateManager($admin_id){
		$this->load->library('form_validation');
		if($this->form_validation->run('update_manager')){
			$data=$this->input->post();
			//$userID=$this->admin_model->check_admin_id($data['adminUserID']);
			//print_r($data);exit;
			//if($userID){
				if($this->admin_model->update_user($data,$admin_id)){
					$this->session->set_flashdata('feedback_successfull', 'Updated Manager Successfully');
					return redirect('admin/detailsManager/'.$admin_id);
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Update Manager Failed!');
					return redirect('admin/detailsManager/'.$admin_id);
				}
			/*}
			else{
				$this->session->set_flashdata('feedback_failed', 'Given User ID is Already in Use');
				return redirect('admin/detailsManager/'.$admin_id);
			}*/
		}
		else{
			$user=$this->admin_model->get_user_details_by_id($admin_id);
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/editManager',['infos'=>$user,'shop_info'=>$shop_info]);
		}
	}
	
	/***Store Keeper Part***/
	public function allStoreKeeper(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->where('admin_role_roleID',3)->get('admin_info')->num_rows();
		$config['base_url']=base_url('admin/allStoreKeeper');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->all_allStore_keeper($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/allStoreKeeper',['infos'=>$data]);
	}
	public function addStoreKeeper(){
		//$shop_info=$this->admin_model->get_all_shop_id_name();
		//$this->load->view('admin/addStoreKeeper',['shop_info'=>$shop_info]);
		$this->load->view('admin/addStoreKeeper');
	}
	public function storeStoreKeeper(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_storeKeeper')){
			$data=$this->input->post();
			$userID=$this->admin_model->check_admin_id($data['adminUserID']);
			//print_r($userID);exit;
			if($userID){
				unset($data['confirm_password']);
				if($this->admin_model->add_user($data)){
					$this->session->set_flashdata('feedback_successfull', 'Added New Store Keeper Successfully');
					return redirect('admin/allStoreKeeper');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Add Store Keeper Failed!');
					return redirect('admin/allStoreKeeper');
				}
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Given User ID is Already in Use');
				return redirect('admin/allStoreKeeper');
			}
		}
		else{
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/addStoreKeeper',['shop_info'=>$shop_info]);
		}
	}
	public function updateStoreKeeper($admin_id){
		$this->load->library('form_validation');
		//print_r($this->input->post());
		if($this->form_validation->run('update_storeKeeper')){
		//print_r($this->input->post());exit;
			$data=$this->input->post();
			
				//unset($data['confirm_password']);
				if($this->admin_model->update_user($data,$admin_id)){
					$this->session->set_flashdata('feedback_successfull', 'Updated Store Keeper Successfully');
					return redirect('admin/detailsStoreKeeper/'.$admin_id);
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Update Store Keeper Failed!');
					return redirect('admin/detailsStoreKeeper/'.$admin_id);
				}
			
		}
		else{
			$storekeeper=$this->admin_model->get_user_details_by_id($admin_id);
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/editStoreKeeper',['infos'=>$storekeeper,'shop_info'=>$shop_info]);
		}
	}
	public function detailsStoreKeeper($storekeeper_id){
		$storekeeper=$this->admin_model->get_store_keeper_details_by_id($storekeeper_id);
		$this->load->view('admin/detailsStoreKeeper',['infos'=>$storekeeper]);
	}
	public function editStoreKeeper($storekeeper_id){
		$storekeeper=$this->admin_model->get_store_keeper_details_by_id($storekeeper_id);
		$shop_info=$this->admin_model->get_all_shop_id_name();
		$this->load->view('admin/editStoreKeeper',['infos'=>$storekeeper,'shop_info'=>$shop_info]);
	}	
	public function allSalesman(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('salesman_info')->num_rows();
		$config['base_url']=base_url('admin/allSalesman');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->all_salesman($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/allSalesman',['infos'=>$data]);
		//$this->load->view('admin/allSalesman');
	}
	public function addSalesman(){
		$shop_info=$this->admin_model->get_all_shop_id_name();
		$this->load->view('admin/addSalesman',['shop_info'=>$shop_info]);
	}
	public function storeSalesman(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_sales_man')){
			$data=$this->input->post();
			//$userID=$this->admin_model->check_admin_id($data['adminUserID']);
			//print_r($userID);exit;
			//if($userID){
				if($this->admin_model->add_sales_man($data)){
					$this->session->set_flashdata('feedback_successfull', 'Added New Salesman Successfully');
					return redirect('admin/allSalesman');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Add Salesman Failed!');
					return redirect('admin/allSalesman');
				}
			/*}
			else{
				$this->session->set_flashdata('feedback_failed', 'Given User ID is Already in Use');
				return redirect('admin/allSalesman');
			}*/
		}
		else{
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/addSalesman',['shop_info'=>$shop_info]);
		}
	}
	public function detailsSaleman($salesman_id){
		$user=$this->admin_model->get_selaman_details_by_id($salesman_id);
		$this->load->view('admin/detailsSaleman',['infos'=>$user]);
	}
	public function editSaleman($salesman_id){
		$user=$this->admin_model->get_selaman_details_by_id($salesman_id);
		$shop_info=$this->admin_model->get_all_shop_id_name();
		$this->load->view('admin/editSaleman',['infos'=>$user,'shop_info'=>$shop_info]);
	}
	public function updateSaleman($admin_id){
		$this->load->library('form_validation');
		//print_r($this->input->post());exit;
		//if($this->form_validation->run('update_sales_man')){
			$data=$this->input->post();
			//print_r($this->input->post());exit;
			if($this->admin_model->update_saleman($data,$admin_id)){
				$this->session->set_flashdata('feedback_successfull', 'Updated Salesman Successfully');
				return redirect('admin/detailsSaleman/'.$admin_id);
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Update Salesman Failed!');
				return redirect('admin/detailsSaleman/'.$admin_id);
			}
		/*}
		else{
			$user=$this->admin_model->get_selaman_details_by_id($admin_id);
			$shop_info=$this->admin_model->get_all_shop_id_name();
			$this->load->view('admin/editSaleman',['infos'=>$user,'shop_info'=>$shop_info]);
		}*/
	}
	public function adjustStock(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_info')->num_rows();
		$config['base_url']=base_url('admin/showInventory');
		$config['per_page']=15;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->get_view_product_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/adjustStock',['infos'=>$data]);
		//$this->load->view('admin/adjustStock');
	}
	public function ajax_adjustStock($product_id){
		
			$data=$this->input->post();
			//print_r($product_id);
			//print_r($data);exit;
			if($this->admin_model->update_product($data,$product_id)){
				$data = array(
				'quantity'=>$data['productQuantity'],
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
	public function showInventory(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_info')->num_rows();
		$config['base_url']=base_url('admin/showInventory');
		$config['per_page']=15;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->get_view_product_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/showInventory',['infos'=>$data]);
	}
	public function ajaxShowInventoryFilter(){
		
		$query=$this->admin_model->filter_product_info($this->input->post('arr'));
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
		$config['base_url']=base_url('admin/viewProduct');
		$config['per_page']=15;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->admin_model->get_view_product_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/viewProduct',['infos'=>$data]);
	}	
	public function productDetails($productID){
		$product=$this->admin_model->get_product_details_by_id($productID);
		$data['groupInfo']=$this->admin_model->get_all_group_id_name();
		$data['supplierInfo']=$this->admin_model->get_all_supplier_id_name();
		$sale_info=$this->admin_model->get_sale_details_by_id($productID);
		$this->load->view('admin/productDetails',['infos'=>$product,'data'=>$data,'sale_infos'=>$sale_info]);
	}
	public function updateProduct(){
		$this->load->library('form_validation');
		//print_r($this->input->post());exit;
		if($this->form_validation->run('update_product')){
			$data=$this->input->post();
			$product_id=$this->input->post('productID');
			unset($data['productID']);
			if($this->admin_model->update_product($data,$product_id)){
				$this->session->set_flashdata('feedback_successfull', 'Updated Product Successfully');
				return redirect('admin/productDetails/'.$product_id);
			}
			else{
				$this->session->set_flashdata('feedback_failed','Update Product To Stock Failed!');
				return redirect('admin/productDetails/'.$product_id);
			}
			
		}
		else{
			$productID=$this->input->post('productID');
			$product=$this->admin_model->get_product_details_by_id($productID);
			$data['groupInfo']=$this->admin_model->get_all_group_id_name();
			$data['supplierInfo']=$this->admin_model->get_all_supplier_id_name();
			$this->load->view('admin/productDetails',['infos'=>$product,'data'=>$data]);
		}
		
	}
	
	public function editProduct(){
		$this->load->view('admin/editProduct');
	}
	
	public function productSaleReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['saleStartDate']= date('Y-m-d 00:00:00', strtotime($data['saleStartDate']));
			$data['saleEndDate']= date('Y-m-d 23:59:59', strtotime($data['saleEndDate']));
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('sale_details')->num_rows();
			$config['base_url']=base_url('admin/productSaleReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$sale_info=$this->admin_model->get_sale_report_by_dates($config['per_page'],$this->uri->segment(3),$data['saleStartDate'],$data['saleEndDate']);*/
			$sale_info=$this->admin_model->get_sale_report_by_dates($data['saleStartDate'],$data['saleEndDate']);
			$flag['flag']=0;
			$this->load->view('admin/productSaleReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('sale_details')->num_rows();
			$config['base_url']=base_url('admin/productSaleReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$sale_info=$this->admin_model->get_sale_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$sale_info=0;
			$flag['flag']=0;
			$this->load->view('admin/productSaleReport',['infos'=>$sale_info,'flag'=>$flag]);
		}
		
	}
	
	public function returnReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['returnStartDate']= date('Y-m-d 00:00:00', strtotime($data['returnStartDate']));
			$data['returnEndDate']= date('Y-m-d 23:59:59', strtotime($data['returnEndDate']));
			$data=$this->admin_model->get_return_report_by_dates($data['returnStartDate'],$data['returnEndDate']);
			$flag['flag']=0;
			$this->load->view('admin/returnReport',['infos'=>$data,'flag'=>$flag]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('exchange_info')->num_rows();
			$config['base_url']=base_url('admin/returnReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$data=$this->admin_model->get_return_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$data=0;
			$flag['flag']=0;
			$this->load->view('admin/returnReport',['infos'=>$data,'flag'=>$flag]);
		}
	}
	public function oldReturnReportDetails($return_id){
		$data['return']=$this->admin_model->get_old_return_details_by_id($return_id);
		$data['exchange']=$this->admin_model->get_old_return_exchange_details_by_id($return_id);
		//print_r($data);exit;
		$this->load->view('admin/oldReturnReportDetails',['infos'=>$data]);
	}

	
	public function returnReportDetails($return_id){
		//$data['return']=$this->admin_model->get_return_details_by_id($return_id);
		//$data['exchange']=$this->admin_model->get_return_exchange_details_by_id($return_id);
		//print_r($data);exit;
		$data['billInfo']=$this->admin_model->get_return_info_by_id($return_id);
		$data['return']=$this->admin_model->get_return_details_by_id($return_id);
		$data['exchange']=$this->admin_model->get_return_exchange_details_by_id($return_id);
		$this->load->view('admin/returnReportDetails',['infos'=>$data]);
	}	
	
	public function incomeExpenseReport(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['startDate']= date('Y-m-d', strtotime($data['startDate']));
			$data['startTime']= date('H:i:s', strtotime($data['startTime']));
			$startDate=$data['startDate']." ".$data['startTime'] ;
			$data['endDate']= date('Y-m-d', strtotime($data['endDate']));
			$data['endTime']= date('H:i:s', strtotime($data['endTime']));
			$endDate=$data['endDate']." ".$data['endTime'] ;
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->where('transectionDate >=',$startDate)->where('transectionDate <=',$endDate)->get('transection_info')->num_rows();
			$config['base_url']=base_url('admin/incomeExpenseReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$transection_details=$this->admin_model->get_transection_by_dates($config['per_page'],$this->uri->segment(3),$startDate,$endDate);*/
			$transection_details=$this->admin_model->get_transection_by_dates($startDate,$endDate);
			$amount['income']=$this->admin_model->total_income_by_dates($startDate,$endDate);
			$amount['expense']=$this->admin_model->total_expense_by_dates($startDate,$endDate);
			$amount['return']=$this->admin_model->total_return_by_dates($startDate,$endDate);
			$amount['flag']=0;
			$this->load->view('admin/incomeExpenseReport',['infos'=>$transection_details,'amount'=>$amount]);
		}
		else{
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->get('transection_info')->num_rows();
			$config['base_url']=base_url('admin/incomeExpenseReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$data=$this->admin_model->get_all_transection($config['per_page'],$this->uri->segment(3));
			$amount['income']=$this->admin_model->total_income();
			$amount['expense']=$this->admin_model->total_expense();
			$amount['return']=$this->admin_model->total_return();
			$amount['flag']=1;*/
			$data=0; $amount=0;
			$this->load->view('admin/incomeExpenseReport',['infos'=>$data,'amount'=>$amount]);
		}
	}
	
	public function transectionDetails($ref_id,$type){
		//print_r($type);exit;
		if($type==1){
			$salesman_id=$this->admin_model->get_salesman_id_for_invoice_by_sale_id($ref_id);
			//print_r($salesman_id);exit;
			return redirect('admin/saleDetails/'.$ref_id.'/'.$salesman_id);
		}
		else if($type==2){
			 return redirect('admin/expenseDetails/'.$ref_id);
		}
		else if($type==3){
			return redirect('admin/returnReportDetails/'.$ref_id);
		}
		//$transectionDetails=$this->admin_model->get_transection_details_by_ref_id($ref_id,$type);
		//$this->load->view('admin/transectionDetails');
	}
	
	public function saleDetails($sale_id,$salesman_id){
		$sale_info=$this->admin_model->get_sale_info_by_id($sale_id,$salesman_id);
		$sale_details=$this->admin_model->get_sale_info_details_by_id($sale_id);
				//print_r($sale_info);
				//print_r($sale_details);exit;
		$this->load->view('admin/saleDetails',['info'=>$sale_info,'details'=>$sale_details]);
	}	
	public function expenseDetails($expense_id){
		$expense=$this->admin_model->get_expense_details_by_id($expense_id);
		//print_r($expense);exit;
		$this->load->view('admin/expenseDetails',['infos'=>$expense]);
		
	}
	public function salesmanPerformaneceReport(){
		$salesmanInfo=$this->admin_model->get_all_salesman_id_name();
		if($this->input->post()){
			$data=$this->input->post();
			$data['salemanStartDate']= date('Y-m-d 00:00:00', strtotime($data['salemanStartDate']));
			$data['salemanEndDate']= date('Y-m-d 23:59:59', strtotime($data['salemanEndDate']));
			//print_r($data);exit;
			
			if($data['salesman_info_salesmanID']>=0){
				$info=$this->admin_model->get_saleman_report_by_dates_by_id($data['salemanStartDate'],$data['salemanEndDate'],$data['salesman_info_salesmanID']);
			}
			else{
				//print_r($data);exit;
				$info=$this->admin_model->get_salesman_report_by_dates($data['salemanStartDate'],$data['salemanEndDate']);
			}
			//print_r($info);exit;
			$flag['flag']=0;
			$this->load->view('admin/salesmanPerformaneceReport',['infos'=>$info,'flag'=>$flag,'salesmanInfo'=>$salesmanInfo]);
		}
		else{
			//$shop_id=$this->session->userdata('userShop');
			/*$this->load->library('pagination');
			$config['total_rows']=$this->db->where('salesman_info_salesmanID>',0)->get('sale_info')->num_rows();
			$config['base_url']=base_url('admin/salesmanPerformaneceReport');
			$config['per_page']=15;
			$config['num_links']=5;
			$this->pagination->initialize($config);
			$info=$this->admin_model->get_salesman_report($config['per_page'],$this->uri->segment(3));
			$flag['flag']=1;*/
			$info=0;
			$flag['flag']=0;
			$this->load->view('admin/salesmanPerformaneceReport',['infos'=>$info,'flag'=>$flag,'salesmanInfo'=>$salesmanInfo]);
		}
		//$this->load->view('admin/salesmanPerformaneceReport');
	}
}