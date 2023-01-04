<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('home_model');
	}
	
	public function index()
	{
		$data=$this->home_model->get_main_categories();
		$child=$this->home_model->get_2nd_categories();
		$mostSale = $this->home_model->get_most_sale_item(-1,10,0); //-1 for any category
		//print_r($mostSale);	
		//print_r($data);exit;
		$this->load->view('home/header',['categories'=>$data,'childs'=>$child]);
		$this->load->view('home/homepage-content',['mostSale'=>$mostSale]);		
		$this->load->view('home/footer');
	}

	public function category()
	{
		$data=$this->home_model->get_main_categories();
		$child=$this->home_model->get_2nd_categories();
		$mostSale = $this->home_model->get_most_sale_item(-1,10,0); //-1 for any category
		//print_r($mostSale);	
		//print_r($data);exit;
		$this->load->view('home/header',['categories'=>$data,'childs'=>$child]);
		$this->load->view('home/product',['mostSale'=>$mostSale]);		
		$this->load->view('home/footer');

	}
	
	public function subCategory()
	{
		$this->load->view('home/subCategory');
	}		

	public function details($product_id)
	{
		$data=$this->home_model->get_main_categories();
		$child=$this->home_model->get_2nd_categories();
		$productDetails = $this->home_model->get_product_details($product_id); 
		$relatedProduct = $this->home_model->get_related_product($product_id,12,0); 

		// print_r($relatedProduct);
		//print_r($productDetails);
		// exit();
		
		$this->load->view('home/header',['categories'=>$data,'childs'=>$child,'relatedProduct'=>$relatedProduct]);
		$this->load->view('home/details',['productDetails'=>$productDetails,'relatedProduct'=>$relatedProduct]);
		$this->load->view('home/footer');
	}
	
	public function test()
	{
		
		$this->load->view('home/test');
	}
	
	
	public function my_account()
	{
		$customer=$this->session->userdata('customer');
		//print_r($customer);exit;
		if($this->session->userdata('customer')){
			$data=$this->home_model->get_customer_by_id($this->session->userdata('customer'));
			//print_r($data);exit;
			if($data)
				$this->load->view('home/my_account',['info'=>$data]);
			else
				return redirect('home/');
		}
		else
			return redirect('home/');
	}
	public function address_management()
	{
		if($this->session->userdata('customer')){
			$default=$this->home_model->get_default_address_by_id($this->session->userdata('customer'));
			$data=$this->home_model->get_address_by_id($this->session->userdata('customer'));
			//print_r($default);exit;
			if($default){ //print_r($default);exit;  
				$this->load->view('home/address_management',['infos'=>$data,'default'=>$default]);
			}
			else
				return redirect('home/');
		}
		else
			return redirect('home/');
	}
	
	public function pass_change()
	{
		if($this->session->userdata('customer')){
			$data=$this->home_model->get_customer_by_id($this->session->userdata('customer'));
			//print_r($data);exit;
			if($data)
				$this->load->view('home/pass_change',['info'=>$data]);
			else
				return redirect('home/');
		}
	}
	public function update_password(){
		
		$this->load->library('form_validation');
		if($this->form_validation->run('update_password')){
			//$data=$this->input->post();
			$email=$this->input->post('user_email');
			$pass=$this->input->post('old_pass');
			$data=$this->home_model->customer_login($email,$pass);
			if($data){
				$info['user_password']=$this->input->post('new_pass');
				if($this->home_model->update_password($info,$this->session->userdata('customer'))){
					$this->session->set_flashdata('feedback_successfull', 'Updated password successfully');
					return redirect('home/pass_change');
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Sorry, Update Failed');
					return redirect('home/pass_change');
				}
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Please Type Password correctly');
				return redirect('home/pass_change');
			}
		}
		else{
			$data=$this->home_model->get_customer_by_id($this->session->userdata('customer'));
			$this->load->view('home/pass_change',['info'=>$data]);
		}
	}
	
	/*public function add_address(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_category')){
	
			$data=$this->input->post();
			
			if($data['default_status']==1){
				$default=$this->home_model->get_default_address_by_id($this->session->userdata('customer'));
				$default_status['default_status']=0;
				//print_r($default);exit;
				if($this->home_model->update_default_address($default->adr_id,$default_status)){
					if($this->home_model->add_address($data)){
						$this->session->set_flashdata('feedback_successfull', 'New Address Added successfully');
						//return redirect('home/address_management');
						$this->load->library('user_agent');
						redirect($this->agent->referrer());
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Please Try again');
						//return redirect('home/address_management');
						$this->load->library('user_agent');
						redirect($this->agent->referrer());
					}
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Please Try again');
					//return redirect('home/address_management');
					$this->load->library('user_agent');
					redirect($this->agent->referrer());
				}
			}
		
			else{
				if($this->home_model->add_address($data)){
					$this->session->set_flashdata('feedback_successfull', 'New Address Added successfully');
					//return redirect('home/address_management');
					redirect($this->agent->referrer());
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Please Try again');
					//return redirect('home/address_management');
					redirect($this->agent->referrer());
				}
			}
		}
		else{
			
		}
	}*/
	public function add_address(){
		
		$this->load->library('form_validation');
		if($this->form_validation->run('add_customer_address')){
	
			$data=$this->input->post();
			
			if($data['default_status']==1){
				$default=$this->home_model->get_default_address_by_id($this->session->userdata('customer'));
				$default_status['default_status']=0;
				//print_r($default);exit;
				if($this->home_model->update_default_address($default->adr_id,$default_status)){
					if($this->home_model->add_address($data)){
						$this->session->set_flashdata('feedback_successfull', 'New Address Added successfully');
						//return redirect('home/address_management');
						$this->load->library('user_agent');
						redirect($this->agent->referrer());
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Please Try again');
						//return redirect('home/address_management');
						$this->load->library('user_agent');
						redirect($this->agent->referrer());
					}
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Please Try again');
					//return redirect('home/address_management');
					$this->load->library('user_agent');
					redirect($this->agent->referrer());
				}
			}
		
			else{
				if($this->home_model->add_address($data)){
					$this->session->set_flashdata('feedback_successfull', 'New Address Added successfully');
					//return redirect('home/address_management');
					$data = array(
					'status'=>true, 
					'redirect'=>$this->agent->referrer()
					);
					echo json_encode($data);
					//redirect($this->agent->referrer());
				}
				else{
					//$this->session->set_flashdata('feedback_failed', 'Please Try again');
					//return redirect('home/address_management');
					//redirect($this->agent->referrer());
					$data = array(
					'errors' => 'Please Try again',
					'status'=>false
					);
					echo json_encode($data);
				}
			}
		}
		else{
				//echo "No";
				//$errors = validation_errors();
				$data = array(
					'user_name' =>form_error('user_name'),
					'contact' => form_error('contact'),
					'address_title' => form_error('address_title'),
					'address' => form_error('address'),
					'default_status' => form_error('default_status'),
					//'errors' => 'invalid user name and password',
					'status'=>false
				);
				echo json_encode($data);
				//$this->load->view('login/login_view');
		}
	}
	
	public function editaddress($address_id)
	{
		$address=$this->home_model->get_address_by_address_id($address_id);
		//print_r($address);exit;
		$this->load->view('home/edit_address',['address'=>$address]);
	}
	public function update_address()
	{
		$data=$this->input->post();
		//print_r($data);exit;
		$update_default=0;
		if($data['default_status']==1){
			$default=$this->home_model->get_default_address_by_id($this->session->userdata('customer'));
			$default_status['default_status']=0;
			$update_default=$this->home_model->update_default_address($default->adr_id,$default_status);
		}
		$adr_id=$data['adr_id'];
		unset($data['adr_id']);
		if($this->home_model->update_address($data,$adr_id)){
			$this->session->set_flashdata('feedback_successfull', 'Your Address has Updated successfully');
			redirect('home/address_management');
				
		}
		else{
				$this->session->set_flashdata('feedback_failed', 'Please Try again');
				redirect('home/address_management');
		}
	}
	public function delete_address($adr_id){
		//print_r($adr_id);exit;
		$data['address_status']=0;
		if($this->home_model->update_address($data,$adr_id)){
			$this->session->set_flashdata('feedback_successfull', 'Your Address has Deleted successfully');
			redirect('home/address_management');
				
		}
		else{
				$this->session->set_flashdata('feedback_failed', 'Please Try again');
				redirect('home/address_management');
		}
		
	}
	
	public function wishlist()
	{
		
		$this->load->view('home/wishlist');
	}
	public function myAccountNew()
	{
		$this->load->view('home/myAccountNew');
	}
	
	public function checkout()
	{
		$address=$this->home_model->get_all_address_by_id($this->session->userdata('customer'));
		//print_r($address);exit;
		//$this->load->view('home/my_cart',['addresses'=>$address]);
		$this->load->view('home/checkout',['addresses'=>$address]);
	}
	
		
	
	
	public function test_cart(){
		$data['products']=$this->home_model->get_products();
		//print_r($data);exit;
		$this->load->view('home/test_cart',$data);
		
	}
	public function add_cart(){
		
		$product=$this->input->post();
		//$product=$this->home_model->get_product_details($this->input->post('product_id'));
		//print_r($product);exit;
		$insert=array(
			'id'=>$this->input->post('product_id'),
			'qty'=>$this->input->post('quantity'),
			'price'=>$this->input->post('product_price'),
			'name'=>$this->input->post('product_name'),
			'total_quantity'=>$this->input->post('total_quantity'),
			'discount'=>$this->input->post('discount'),
			'image'=>$this->input->post('product_image'),
			'vat'=>$this->input->post('vat'),
		);
		/*if($product->option_name){
			$insert['options']=array(
				$product->option_name=>$product->option_values[$this->input->post($product->option_name)]
			);
		}*/
		//$this->cart->product_name_rules = '\d\D';
		$this->cart->insert($insert);	
		//redirect($this->input->post('sourceUrl'));
		//$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function add_cart_reorder(){
		
		$product_id=$this->input->post('product_id');
		$product=$this->home_model->get_product_details($product_id);
		//print_r($product);exit;
		$insert=array(
			'id'=>$product_id,
			'qty'=>$this->input->post('quantity'),
			'price'=>$product->product_price,
			'name'=>$product->product_name,
			'discount'=>$product->discount,
			'image'=>$this->product->product_image,
			'vat'=>$this->product->vat,
		);
		
		$this->cart->insert($insert);
		redirect($this->agent->referrer());
	}
	public function remove($rowid){
			$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>0
			)
		);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function plus_product($rowid,$qty){
			
			$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>$qty+1
			)
		);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function minus_product($rowid,$qty){
			$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>$qty-1
			)
		);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function destroy(){
		$this->cart->destroy();
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function test_search()
	{
		$this->load->view('home/test_search');
	}	
	public function search_product(){
	  $search=  $this->input->post('search');
	  $search="কেক";
	  //print_r($search); exit;
	  $query = $this->home_model->get_search_products($search);
	 // print_r($query);
	  echo json_encode ($query);
	  
	}
	public function register_customer(){
		$this->load->library('form_validation');
		//echo "hello";
		if($this->form_validation->run('user_registration')){
			$data=$this->input->post();
			$email=$this->home_model->get_customer_info_by_email($data['user_email']);
			//print_r($email);exit;
			if($email){
				$address['address_title']=$this->input->post('address_title');
				$address['address']=$this->input->post('address');
				$address['user_name']=$this->input->post('user_name');
				$address['contact']=$this->input->post('contact');
				$address['default_status']=1;
				$data['main_contact']=$data['contact'];
				unset($data['address_title'],$data['address'],$data['contact'],$data['add'],$data['confirm_pass']);
				$customer_id=$this->home_model->store_registration_info($data,$address);
				if($customer_id){
					$this->session->set_userdata('customer',$customer_id);
					//return redirect('home/my_account');
					$link = array(
					'status'=>true, 
					'redirect'=>base_url('home/my_account')
					//'redirect'=>$this->agent->referrer()
					);
					//print_r($data);exit;
					//return redirect('home/my_account');
					echo json_encode($link);
				}
				else{
					//$this->session->set_flashdata('feedback_failed', 'Sorry, Please try Again');
					//return redirect('home/');
					$data = array(
					'errors' => 'DataBase Error, Try Again',
					'status'=>false
					);
					echo json_encode($data);
				}
			}
			else{
				//$this->session->set_flashdata('feedback_failed', 'This Email Address is Already in Use');
				//return redirect('home/');
				$data = array(
					'errors' => 'This Email Address is Already in Use',
					'status'=>false
				);
				echo json_encode($data);
			}
				
		}
		else{
			//$data=$this->home_model->get_main_categories();
			//$child=$this->home_model->get_2nd_categories();
			//print_r($data);exit;
			//$this->load->view('home/home',['categories'=>$data,'childs'=>$child]);
			$data = array(
				'errors' => validation_errors(),
				'status'=>false
			);
			echo json_encode($data);
		}
	}
	
	
	public function customer_login(){
		//echo "hello";// exit;
		//$email=$this->input->post('email');
		//print_r($email);exit;
		$this->load->library('form_validation');
		if($this->form_validation->run('login_form')){
			$email=$this->input->post('email');
			$pass=$this->input->post('password');
			//print_r($email);
			//print_r($pass);exit;
			$data=$this->home_model->customer_login($email,$pass);
			//print_r($data);exit;
			if($data){
				$this->session->set_userdata('customer',$data['user_id']);
				$link = array(
					'status'=>true, 
					//'redirect'=>base_url('home/my_account')
					'redirect'=>$this->agent->referrer()
				);
				//print_r($data);exit;
				//return redirect('home/my_account');
				echo json_encode($link);
			}
			else{
				//$this->session->set_flashdata('login', 'invalid user name and password');
				//$this->load->view('login/login_view');
				$data = array(
				'errors' => 'invalid user name and password',
				'status'=>false
				);
				echo json_encode($data);
			}
		}
		else{
			$data = array(
					'errors' => validation_errors(),
					'status'=>false
				);
				echo json_encode($data);
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('customer');
		return redirect('home/');
	}

	public function products($category_id)
	{
		$data=$this->home_model->get_main_categories();
		$child=$this->home_model->get_2nd_categories();
		$products = $this->home_model->get_category_product($category_id,500,0);			
		//$mostSale = $this->home_model->get_most_sale_item(-1,10,0); //-1 for any category
		// print_r($mostSale);	
		// print_r();exit;
		$this->load->view('home/header',['categories'=>$data,'childs'=>$child]);
		//$this->load->view('home/homepage-content',['mostSale'=>$mostSale]);		
		$this->load->view('home/product',['products'=>$products]);		
		$this->load->view('home/footer');

	}
	public function my_cart()
	{
		$address=$this->home_model->get_all_address_by_id($this->session->userdata('customer'));
		//print_r($address);exit;
		$this->load->view('home/my_cart',['addresses'=>$address]);
	}
	public function store_order(){
	
		$data=$this->input->post();
		$cart=$this->cart->contents();
		//print_r($data);exit;
		if($this->home_model->store_order($data,$cart)){
			$this->cart->destroy();
			$this->session->set_flashdata('feedback_successfull', 'Your Order has received successfully');
			redirect('home/');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Please Try Again');
			redirect('home/');
		}
		
	}
	
	public function order()
	{
		$data=$this->home_model->get_user_all_orders($this->session->userdata('customer'));
		//print_r($data);exit;
		$this->load->view('home/order',['orders'=>$data]);
	}
	public function order_details($order_id)
	{
		$data=$this->home_model->get_order_details($order_id);
		$order['info']=$this->home_model->get_order_by_id($order_id);
		$order['shipping']=$this->home_model->get_shipping_address_by_id($order_id);
		$order['billing']=$this->home_model->get_billing_address_by_id($order_id);
		//print_r($order);exit;
		$this->load->view('home/order_details',['orders'=>$data,'info'=>$order]);
	}
	
	public function reorder($order_id)
	{
		$details=$this->home_model->get_order_details($order_id);
		$order=$this->home_model->get_order_by_id($order_id);
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		$order->order_date= $dt->format('Y-m-d h:i:s');
		print_r($order);exit;
		$this->load->view('home/order_details',['orders'=>$data,'info'=>$order]);
	}
	
	public function testLoad(){
		$data['id']="id";
		print $this->load->view('home/testLoad',$data,true);
	}
}

