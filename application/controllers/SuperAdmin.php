<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('super_model');
		if($this->session->userdata('user_role')!=1)return redirect('login/');
	}

	
	public function index(){
		$this->load->view('super_admin/dashBoard');
	}
	public function extendDate(){
		if($this->input->post()){
			$data=$this->input->post();
			$data['expairDate']= date('Y-m-d 23:59:59', strtotime($data['expairDate']));
			//print_r($data);exit;
			if($this->super_model->extend_date($data)){
				$this->session->set_flashdata('feedback_successfull', 'Updated Date successfully');
				//$this->load->view('super_admin/extendDate');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Updating contact failed!');
				//$this->load->view('super_admin/extendDate');
			}
		}
		$this->load->view('super_admin/extendDate');
	}
	public function myAccount(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->super_model->my_info($admin_id);
		$this->load->view('super_admin/myAccount',['info'=>$user]);
	}
	public function updateContact(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->super_model->my_info($admin_id);
		if($user){
			//$this->load->view('super_admin/header',['info'=>$user]);
			$data['adminContact']=$this->input->post('contact');
			if($this->super_model->update_contact($admin_id,$data)){
				$this->session->set_flashdata('feedback_successfull', 'Updated contact successfully');
				return redirect('superAdmin/myAccount');
			}
			else {
				$this->session->set_flashdata('feedback_failed', 'Updating contact failed!');
				return redirect('superAdmin/myAccount');
			}
		}
		else
			return redirect('login/');

	}
	
	public function updatePassword(){

		$admin_id=$this->session->userdata('admin_id');
		$user=$this->super_model->my_info($admin_id);
		if($user){
			$this->load->library('form_validation');
			if($this->form_validation->run('update_password')){
				$data=$this->input->post();
				//print_r($data); print_r($user); exit;
				if($user->adminPassword==$data['old_pass']){
					$password['adminPassword']=$data['new_pass'];
					//print_r($password); exit;
					if($this->super_model->change_password($password,$admin_id)){
							//echo "user Add Successful";
							$this->session->set_flashdata('feedback_successfull', 'Changed Password Successfully');
							return redirect('login/logout');
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Failed to Change Password');
						return redirect('superAdmin/myAccount');
					}

				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Old Password is not Matching ');
					return redirect('superAdmin/myAccount');
				}

			}
			else{
				$this->load->view('super_admin/my_account',['info'=>$user]);
			}
		}
		else
			return redirect('login/');
	}
	public function addBillMemo(){
		$this->load->view('super_admin/addBillMemo');
	}
	public function returnProduct(){
		$this->load->view('super_admin/returnProduct');
	}
	public function showInventory(){
		$this->load->view('super_admin/showInventory');
	}
	public function salesmanPerformaneceReport(){
		$this->load->view('super_admin/salesmanPerformaneceReport');
	}
	public function addExpense(){
		$this->load->view('super_admin/addExpense');
	}
	public function addNewProduct(){
		$this->load->view('super_admin/addNewProduct');
	}
	public function allManager(){
		$this->load->view('super_admin/allManager');
	}
	public function addManager(){
		$this->load->view('super_admin/addManager');
	}
	public function allSalesman(){
		$this->load->view('super_admin/allSalesman');
	}
	public function addSalesman(){
		$this->load->view('super_admin/addSalesman');
	}
	public function allSupplier(){
		$this->load->view('super_admin/allSupplier');
	}
	public function addSupplier(){
		$this->load->view('super_admin/addSupplier');
	}
	public function adjustStock(){
		$this->load->view('super_admin/adjustStock');
	}	
	public function addProductToStock(){
		$this->load->view('super_admin/addProductToStock');
	}
	public function viewProduct(){
		$this->load->view('super_admin/viewProduct');
	}	
	public function productDetails(){
		$this->load->view('super_admin/productDetails');
	}
	public function incomeExpenseReport(){
		$this->load->view('super_admin/incomeExpenseReport');
	}
	public function productSaleReport(){
		$this->load->view('super_admin/productSaleReport');
	}
	public function returnReport(){
		$this->load->view('super_admin/returnReport');
	}
	public function allProductGroup(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('product_group_info')->num_rows();
		$config['base_url']=base_url('superAdmin/allProductGroup');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->super_model->all_product_group($config['per_page'],$this->uri->segment(3));
		$this->load->view('super_admin/allProductGroup',['infos'=>$data]);
	}
	public function addProductGroup(){
		$this->load->view('super_admin/addProductGroup');
	}
	public function storeProductGroup(){
		
		$data=$this->input->post();
		if($this->super_model->add_product_group($data)){
			$this->session->set_flashdata('feedback_successfull', 'Added New Product Group Successfully');
			return redirect('superAdmin/allProductGroup');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Add Product Group Failed!');
			return redirect('superAdmin/addProductGroup');
		}
	}
	public function allExpenseField(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('expense_field_info')->num_rows();
		$config['base_url']=base_url('superAdmin/allExpenseField');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->super_model->all_expense_field($config['per_page'],$this->uri->segment(3));
		$this->load->view('super_admin/allExpenseField',['infos'=>$data]);
	}
	public function addExpenseField(){
		$this->load->view('super_admin/addExpenseField');
	}
	public function storeExpenseField(){
		$data=$this->input->post();
		if($this->super_model->add_expense_field($data)){
			$this->session->set_flashdata('feedback_successfull', 'Added New Expense Field Successfully');
			return redirect('superAdmin/allExpenseField');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Add Expense Field Failed!');
			return redirect('superAdmin/allExpenseField');
		}
	}
	public function allShop(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->get('shop_info')->num_rows();
		$config['base_url']=base_url('superAdmin/allShop');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->super_model->all_shop($config['per_page'],$this->uri->segment(3));
		$this->load->view('super_admin/allShop',['infos'=>$data]);
	}
	public function addShop(){
		$this->load->view('super_admin/addShop');
	}
	public function storeShop(){
		$data=$this->input->post();
		if($this->super_model->add_shop($data)){
			$this->session->set_flashdata('feedback_successfull', 'Added New Shop Successfully');
			return redirect('superAdmin/allShop');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Add Shop Failed!');
			return redirect('superAdmin/allShop');
		}
	}
	public function allUser(){
		$this->load->library('pagination');
		$config['total_rows']=$this->db->where('admin_role_roleID!=',1)->get('admin_info')->num_rows();
		$config['base_url']=base_url('superAdmin/allUser');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->super_model->all_user($config['per_page'],$this->uri->segment(3));
		$this->load->view('super_admin/allUser',['infos'=>$data]);
	}
	public function addUser(){
		$shop_info=$this->super_model->get_all_shop_id_name();
		$this->load->view('super_admin/addUser',['shop_info'=>$shop_info]);
	}
	public function storeUser(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_user')){
			$data=$this->input->post();
			$userID=$this->super_model->check_admin_id($data['adminUserID']);
			//print_r($userID);exit;
			if($userID){
				unset($data['confirm_password']);
				if($this->super_model->add_user($data)){
					$this->session->set_flashdata('feedback_successfull', 'Added New User Successfully');
					return redirect('superAdmin/allUser');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Add User Failed!');
					return redirect('superAdmin/allUser');
				}
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Given User ID is Already in Use');
				return redirect('superAdmin/allUser');
			}
		}
		else{
			$shop_info=$this->super_model->get_all_shop_id_name();
			$this->load->view('super_admin/addUser',['shop_info'=>$shop_info]);
		}
	}
	/*public function my_account(){
		
		$admin_id=$this->session->userdata('admin_id');
		$data=$this->root_model->my_info($admin_id);
		
		if($data)
		$this->load->view('root_admin/my_account',['info'=>$data]);
		else
			return redirect('login/');
	}
	
	
	public function user(){
		
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		$this->load->library('pagination');
		$config['total_rows']=$this->db->where('admin_role_role_id!=',1)->get('admin_info')->num_rows();
		$config['base_url']=base_url('root_admin/user');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);
		$data=$this->root_model->users_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('root_admin/user_info',['infos'=>$data]);
	}
	
	public function add_user(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user){
			$data=$this->root_model->get_user_role();
			$this->load->view('root_admin/add_user',['roles'=>$data]);
		}
		else
			return redirect('login/');
		
	}
	
	public function store_user(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_user')){
			$data=$this->input->post();
			unset($data['add'],$data['confirm_password']);
			if($this->root_model->add_user($data)){
					$this->session->set_flashdata('feedback_successfull', 'Added user successfully');
					return redirect('root_admin/add_user');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Add user failed!');
					return redirect('root_admin/add_user');
				}
		}
		else{
			$data=$this->root_model->get_user_role();
			$this->load->view('root_admin/add_user',['roles'=>$data]);
		}
	}
	public function profile($user_id){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user){
			$data=$this->root_model->get_user($user_id);
			$this->load->view('root_admin/user_profile',['data'=>$data]);
		}
		else
			return redirect('login/');
		
	}
	public function edit_user($user_id){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user){
			$data=$this->root_model->get_user($user_id);
			$this->load->view('root_admin/edit_user_info',['data'=>$data]);
		}
		else
			return redirect('login/');
		
	}
	public function update_user($admin_id){
		
		$my_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($my_id);
		if($user){
			$data = $this->input->post();
			unset($data['edit']);
			if ($this->root_model->update_user($admin_id, $data)) {
				$this->session->set_flashdata('feedback_successfull', 'Updated user info successfully');
				return redirect('root_admin/user');
			} else {
				$this->session->set_flashdata('feedback_failed', 'Updating user info failed!');
				return redirect('root_admin/user');
			}
		}
		else
			return redirect('login/');

		$this->load->library('form_validation');
	}
	
	public function update_contact(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user)
		$this->load->view('root_admin/header',['info'=>$user]);
		else
			return redirect('login/');
		$data['contact']=$this->input->post('contact');
		if($this->root_model->update_contact($admin_id,$data)){
			$this->session->set_flashdata('feedback_successfull', 'Updated contact successfully');
			return redirect('root_admin/my_account');
		}
		else {
			$this->session->set_flashdata('feedback_failed', 'Updating contact failed!');
			return redirect('root_admin/my_account');
		}

	}
	public function change_password(){
		
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user){
			$this->load->library('form_validation');
			if($this->form_validation->run('update_password')){
				$data=$this->input->post();
				if($user->password==$data['old_pass']){
					$password['password']=$data['new_pass'];
					if($this->root_model->change_password($password,$admin_id)){
							$this->session->set_flashdata('feedback_successfull', 'Changed Password Successfully');
							return redirect('root_admin/my_account');
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Failed to Change Password');
						return redirect('root_admin/my_account');
					}
					
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Old Password is not Matching ');
					return redirect('root_admin/my_account');
				}
				
			}
			else{
				$this->load->view('root/my_account',['info'=>$user]);
			}
		}
		else
			return redirect('login/');

	}
	
	public function add_category(){
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		if($user){
			$data=$this->root_model->get_category_parent();
			$this->load->view('root_admin/add_category',['parents'=>$data]);
		}
		else
			return redirect('login/');
		
	}
	
	
	public function store_category(){
		$this->load->library('form_validation');
			$images = array();
			$data = $this->input->post();
			$parent=$this->input->post('parent_id');
			if($parent){
				$depth_id=$this->root_model->get_parent_depth($parent);
			}
			if($depth_id){
				$data['depth']=$depth_id+1;
			}
			else $data['depth']=1;
			unset($data['add'], $data['category_pic']);
			if (isset($_FILES['category_pic'])&& $_FILES['category_pic']['size'] > 0) {
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('category_pic')) {
					$this->session->set_flashdata('feedback_failed', 'Image upload failed');
					return redirect('root_admin/add_category');
				} 
				else {
						$data1 = $this->upload->data(); //array('upload_data' => $this->upload->data());
						$image = base_url("images/" . $data1['raw_name'] . $data1['file_ext']);
						$data['category_image']=$image;
				}
			}
			if($this->root_model->add_category($data)){
				$this->session->set_flashdata('feedback_successfull', 'Added Category successfully');
				return redirect('root_admin/add_category');
			}
			else{
					$this->session->set_flashdata('feedback_failed', 'Add Category failed!');
						return redirect('root_admin/add_category');
			}
		
	}
	
	public function category(){
		
		$admin_id=$this->session->userdata('admin_id');
		$user=$this->root_model->my_info($admin_id);
		$this->load->library('pagination');
		$config['total_rows']=$this->db->where('admin_status',1)->where('admin_role_role_id!=',1)->get('admin_info')->num_rows();
		$config['base_url']=base_url('root_admin/user');
		$config['per_page']=10;
		$config['num_links']=5;
		$this->pagination->initialize($config);

		$data=$this->root_model->users_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('root_admin/user_info',['infos'=>$data]);
	}*/
	public function memoPrint(){
		$this->load->view('super_admin/memoPrint');
	}	
}
