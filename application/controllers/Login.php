<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('login_model');
		
	}

	public function index()
	{
		$this->load->view('login/login_view');
	}
	
	/*public function user_login()
	{

		//$this->load->helper('url');
		$this->load->library('form_validation');
		if($this->form_validation->run('login_form')){

			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$this->load->model('login_model');
			$data=$this->login_model->login_value( $email,$password );
			//print_r($data); 
			//print_r($data['userID']);
			//exit;
			if($data){

				$this->session->set_userdata('admin_id',$data['admin_id']);
				//print_r($this->session->userdata('admin_id'));
				//exit;
				$this->session->set_userdata('user_role',$data['admin_role_role_id']);
				//print_r($data['admin_role_role_id']);
				//exit;
				if($data['admin_role_role_id']==1)return redirect('root_admin/index');
				else if($data['admin_role_role_id']==2)return redirect('super_admin/index');
				else if($data['admin_role_role_id']==3)return redirect('manager/index');
				else if($data['admin_role_role_id']==4)return redirect('sales_counter/index');

			}
			else{
				$this->session->set_flashdata('login', 'invalid user name and password');
				$this->load->view('login/login_view');
			}
		}
		else{
			$this->load->view('login/login_view');
		}

	}*/
	public function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('user_role');
		return redirect('login');
	}
	
	public function user_login()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('login_form')){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$data=$this->login_model->login_value( $email,$password );
			//print_r($data);exit;
			if($data){

				$this->session->set_userdata('admin_id',$data['adminID']);
				$this->session->set_userdata('user_role',$data['admin_role_roleID']);
				if($data['admin_role_roleID']==1){
				//print_r($data);exit;
					$link = array(
					'status'=>true, 
					'redirect'=>base_url('SuperAdmin/index')
					);
				}
				else if($data['admin_role_roleID']==2){
					$link = array(
					'status'=>true, 
					'redirect'=>base_url('Admin/index')
					);
				}
				else if($data['admin_role_roleID']==3){
					$link = array(
					'status'=>true, 
					'redirect'=>base_url('storeKeeper/index')
					);
				}
				else if($data['admin_role_roleID']==4){
					$this->session->set_userdata('userShop',$data['shop_info_shopID']);
					$link = array(
					'status'=>true, 
					'redirect'=>base_url('manager/index')
					);
				}
				echo json_encode($link);

			}
			else{
				
				$data = array(
				'errors' => 'invalid user name and password',
				'status'=>false
				);
				echo json_encode($data);
					
			}
			
		}
		else{
				$data = array(
					'password' => form_error('password'),
					'email' => form_error('email'),
					'status'=>false
				);
				echo json_encode($data);
		}

	}
}



