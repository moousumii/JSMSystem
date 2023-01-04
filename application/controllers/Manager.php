<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('manager_model');
		if($this->session->userdata('user_role')!=4)return redirect('login/');
	}
	/*My Account Start*/
	public function myAccount(){
		$id=$this->session->userdata('admin_id');
		$data=$this->manager_model->get_user_details_by_id($id);
		$this->load->view('manager/myAccount',['data'=>$data]);
	}

	public function updatePassWord(){
		$id=$this->session->userdata('admin_id');
		$data=$this->manager_model->get_user_details_by_id($id);
		$oldPass=$this->manager_model->get_user_pass_by_id($id);

		$this->load->library('form_validation');
		if($this->form_validation->run('update_password')){
			$passInfo=$this->input->post();
			if($passInfo){
				if($passInfo['adminPasswordOld']==$oldPass){
					$password['adminPassword']=$passInfo['adminPasswordNew'];
					if($this->manager_model->update_user_pass($password,$id)){
						$this->session->set_flashdata('feedback_successfull', 'Changed Password Successfully');
						return redirect('login/logout');
					}
					else{
						$this->session->set_flashdata('feedback_failed', 'Failed to Change Password');
						return redirect('manager/myAccount');
					}
				}
				else{
					$this->session->set_flashdata('feedback_failed', 'Old Password is not Matching ');
					return redirect('manager/myAccount');
				}
			}
			else{
				$this->load->view('manager/myAccount',['data'=>$data]);
			}
		}
		else{
			$this->load->view('manager/myAccount',['data'=>$data]);
		}
	}
	/*My Account End*/
	public function index(){
		$this->load->view('manager/dashBoard');
	}
	// Invoicing
	public function addSale(){
		$this->cart->destroy();
		$types=$this->manager_model->get_productTypeID_productTypeName();
		$info=$this->manager_model->get_clientID_clientName();
		$this->load->view('manager/addSale',['values'=>$info,'types'=>$types]);
	}
	public function saveSale(){
		$data=$this->input->post();
		$cart=$this->cart->contents();
		if($cart && $data){
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$date= $dt->format('Y-m-d H:i:s');
			$data['saleDate']=$date;
			$sale_id=$this->manager_model->save_sale_info($data,$cart);

			if($sale_id){
				$this->cart->destroy();
				$this->session->set_flashdata('feedback_successfull', 'Transaction successfull');
			redirect('manager/viewInvoice/'.$sale_id);
				
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Please Try Again');
				redirect($this->agent->referrer());
			}
		}else{
			$this->session->set_flashdata('feedback_failed', 'Please Add Product To sale Correctly');
				redirect($this->agent->referrer());
		}
	}
	public function viewInvoice($sale_id){
		$sale_info=$this->manager_model->get_sale_info_by_id($sale_id);
		$sale_details=$this->manager_model->get_sale_info_details_by_id($sale_id);
		$this->load->view('manager/viewInvoice',['info'=>$sale_info,'details'=>$sale_details]);
	}

	public function addReturn(){
		$info=$this->manager_model->get_clientID_clientName();
		$this->load->view('manager/addReturn',['values'=>$info]);
	}

	public function viewReturn($id){
		$data=$this->manager_model->get_return_info_by_id($id);
		//print_r($data);exit;
		$this->load->view('manager/viewReturn',['info'=>$data]);
	}

	public function saveReturn(){
		$info=$this->input->post();
		$info['returnDate']=$this->manager_model->get_current_date_time();
		if($this->manager_model->save_return_info($info)){
			$this->session->set_flashdata('feedback_successfull', 'Transaction has Done Successfully');
			redirect('manager/addReturn');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Please Try Again');
			$info=$this->manager_model->get_clientID_clientName();
			redirect('manager/addReturn');
		}
		
	}
	// Accounts
	/*Expense Field Start*/
	public function allExpenseField(){
		$data=$this->manager_model->get_all_expense_field();
		$this->load->view('manager/allExpenseField',['infos'=>$data]);
	}
	public function addExpenseField(){
		$this->load->view('manager/addExpenseField');
	}
	public function insertExpenseField(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addExpenseField')){
			$data=$this->input->post();
			if($this->manager_model->insert_expense_field($data)){
				$this->session->set_flashdata('feedback_successfull', 'Expense Field Inserted Successfully');
				return redirect('manager/allExpenseField');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Expense Field Insert Failed');
				return redirect('manager/addExpenseField');
			}
		}
		else{
			$this->load->view('manager/addExpenseField');
		}
	}
	public function viewExpenseField($id){
		$data=$this->manager_model->get_expense_field_details_by_id($id);
		$this->load->view('manager/viewExpenseField',['data'=>$data]);
	}
	public function updateExpenseField(){
		$data=$this->input->post();
		$id=$data['expenseFieldID'];
		if($this->manager_model->update_expense_field($data,$id)){
			$this->session->set_flashdata('feedback_successfull', 'Expense Field Updated Successfully');
			return redirect('manager/allExpenseField');
		}	
		else{
			$this->session->set_flashdata('feedback_failed', 'Expense Field Update Failed');
			return redirect('manager/viewExpenseField');
		}
	}
	/*Expense Field End*/
	
	/*Expense Start*/
	public function allExpense(){
		/*$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}
		}
		else{
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			
		}*/
		$fDate = date("Y-m-d 00:00:00", strtotime("first day of this month"));
		$lDate = date("Y-m-d 23:59:59", strtotime("last day of this month"));
		if($this->input->post()){
			$fDate =$this->input->post('firstDate');
			$fDate =date("Y-m-d 00:00:00", strtotime($fDate));

			$lDate =$this->input->post('lastDate');
			$lDate =date("Y-m-d 23:59:59", strtotime($lDate));
		}

		$expense=$this->manager_model->get_all_expense($fDate,$lDate);
		$this->load->view('manager/allExpense',['expenses'=>$expense]);
	}
	public function addExpense(){
		$info=$this->manager_model->get_expenseFieldID_expenseFieldName();
		$this->load->view('manager/addExpense',['values'=>$info]);
	}
	public function insertExpense(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addExpense')){
			$data=$this->input->post();
			if($this->manager_model->insert_expense($data)){
				$this->session->set_flashdata('feedback_successfull', 'Expense Inserted Successfully');
				return redirect('manager/allExpense');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Expense Insert Failed');
				return redirect('manager/addExpense');
			}
		}
		else{
			$this->load->view('manager/addExpense');
		}
	}
	public function viewExpense($id){
		$data=$this->manager_model->get_expense_details_by_id($id);
		$this->load->view('manager/viewExpense',['data'=>$data]);
	}
	/*Expense End*/

	public function cashInOut(){
		$this->load->view('manager/cashInOut');
	}

	public function saveCashInOut(){
		$data=$this->input->post();
		if($this->manager_model->save_cash_in_out_info($data)){
			$this->session->set_flashdata('feedback_successfull', 'Transaction has Inserted Successfully');
			return redirect('manager/cashInOut');
		}
		$this->session->set_flashdata('feedback_failed', 'Please Try Again');
		return redirect('manager/cashInOut');
	}

	/*Receive Payment Start*/
	public function receivePayment(){
		$info=$this->manager_model->get_clientID_clientName();
		$this->load->view('manager/receivePayment',['values'=>$info]);
	}
	public function insertReceivePayment(){
		$data=$this->input->post();
		if($this->manager_model->insert_receive_payment($data)){
			$this->session->set_flashdata('feedback_successfull', 'Receive Payment Inserted Successfully');
			return redirect('manager/receivePayment');
		}
		else{
			$this->session->set_flashdata('feedback_failed', 'Receive Payment Insert Failed');
			return redirect('manager/receivePayment');
		}
	}

	//View Received Payment
	public function viewReceivedPayment($id){
		$data=$this->manager_model->get_receive_payment_info_by_id($id);
		//print_r($data); exit;
		$this->load->view('manager/viewReceivedPayment',['info'=>$data]);
	}

	/*Receive Payment End*/

	/*Bill Start*/
	public function addBill(){
		$info=$this->manager_model->get_clientID_clientName();
		$this->load->view('manager/addBill',['values'=>$info]);
	}
	public function viewBill($id){
		$data=$this->manager_model->get_add_bill_info_by_id($id);
		$this->load->view('manager/viewBill',['info'=>$data]);
	}
	public function insertBill(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addBill')){
			$data=$this->input->post();
			if($this->manager_model->insert_bill($data)){
				$this->session->set_flashdata('feedback_successfull', 'Bill Inserted Successfully');
				return redirect('manager/addBill');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Bill Insert Failed');
				return redirect('manager/addBill');
			}
		}
		else{
			$info=$this->manager_model->get_clientID_clientName();
			$this->load->view('manager/addBill',['values'=>$info]);
		}
	}
	/*Bill End*/

	/*Client Start*/
	public function allClient(){
		$data=$this->manager_model->get_all_client();
		$this->load->view('manager/allClient',['infos'=>$data]);
	}
	public function addNewClient(){
		$this->load->view('manager/addNewClient');
	}
	public function insertNewClient(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addNewClient')){
			$data=$this->input->post();
			if($this->manager_model->insert_new_client($data)){
				$this->session->set_flashdata('feedback_successfull', 'New Client Inserted Successfully');
				return redirect('manager/allClient');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'New Client Insert Failed');
				return redirect('manager/addNewClient');
			}
		}
		else{
			$this->load->view('manager/addNewClient');
		}
	}
	public function viewClient($id){
		$data['data']=$this->manager_model->get_client_details_by_id($id);
		$data['transactions']=$this->manager_model->get_client_transection_by_id($id);
		$this->load->view('manager/viewClient',$data);
	}
	public function updateNewClient(){
		$data=$this->input->post();
		$id=$data['clientID'];
		if($this->manager_model->update_new_client($data,$id)){
			$this->session->set_flashdata('feedback_successfull', 'New Client Updated Successfully');
			return redirect('manager/allClient');
		}	
		else{
			$this->session->set_flashdata('feedback_failed', 'New Client Update Failed');
			return redirect('manager/viewClient');
		}
	}
	/*Client End*/

	/*View Stock Start*/
	public function viewStock(){
		$infos=$this->input->post();
		/*print_r($infos);
		exit();*/
		$value=$this->manager_model->get_productTypeID_productTypeName();
		//$status = $this->manager_model->get_productStatusId_statusTitle();
		$data=$this->manager_model->get_all_product($infos);
		$this->load->view('manager/viewStock',['values'=>$value,'infos'=>$data,'inputs'=>$infos]);
	}
	public function viewProduct($id){
		$info=$this->manager_model->get_productTypeID_productTypeName();
		$status=$this->manager_model->get_productStatusId_statusTitle();
		$data=$this->manager_model->get_product_details_by_id($id);
		$this->load->view('manager/viewProduct',['data'=>$data,'values'=>$info,'status'=>$status]);
	}
	public function updateProduct(){
		$data=$this->input->post();
		//print_r($data); exit();
		$id=$data['productId'];
		if($this->manager_model->update_product($data,$id)){
			$this->session->set_flashdata('feedback_successfull', 'Product Updated Successfully');
			return redirect('manager/viewStock');
		}	
		else{
			$this->session->set_flashdata('feedback_failed', 'Product Update Failed');
			return redirect('manager/viewProduct');
		}
	}
	/*View Stock End*/

	/*Product Start*/
	public function addProduct(){
		$info=$this->manager_model->get_productTypeID_productTypeName();
		$status=$this->manager_model->get_productStatusId_statusTitle();
		$this->load->view('manager/addProduct',['values'=>$info,'status'=>$status]);
	}
	public function insertProduct(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addProduct')){
			$data=$this->input->post();
			if($this->manager_model->insert_product($data)){
				$this->session->set_flashdata('feedback_successfull', 'Product Inserted Successfully');
				return redirect('manager/addProduct');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Product Insert Failed');
				return redirect('manager/addProduct');
			}
		}
		else{
			$this->load->view('manager/addProduct');
		}
	}
	/*Product Start*/

	/*Product Type Start*/
	public function productType(){
		$data=$this->manager_model->get_all_product_type();
		$this->load->view('manager/productType',['infos'=>$data]);
	}
	public function addProductType(){
		$info=$this->manager_model->get_qualityId_qualityName();
		$this->load->view('manager/addProductType',['values'=>$info]);
	}
	public function insertProductType(){
		$this->load->library('form_validation');
		if($this->form_validation->run('addProductType')){
			$data=$this->input->post();
			if($this->manager_model->insert_product_type($data)){
				$this->session->set_flashdata('feedback_successfull', 'Product Type Inserted Successfully');
				return redirect('manager/productType');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Product Type Insert Failed');
				return redirect('manager/addProductType');
			}
		}
		else{
			$this->load->view('manager/addProductType');
		}
	}
	public function viewProductType($id){
		$info=$this->manager_model->get_qualityId_qualityName();
		$data=$this->manager_model->get_product_type_details_by_id($id);
		$this->load->view('manager/viewProductType',['data'=>$data,'values'=>$info]);
	}
	public function updateProductType(){
		$data=$this->input->post();
		//print_r($data); exit();
		$id=$data['productTypeID'];
		if($this->manager_model->update_product_type($data,$id)){
			$this->session->set_flashdata('feedback_successfull', 'Product Type Updated Successfully');
			return redirect('manager/productType');
		}	
		else{
			$this->session->set_flashdata('feedback_failed', 'Product Type Update Failed');
			return redirect('manager/viewProductType');
		}
	}
	/*Product Type End*/

	/*Stock Report Start*/
	public function stockReport(){
		$infos=$this->input->post();
		//print_r($infos);
		//echo $infos['product_type_info_productTypeID'];  exit;
		$value=$this->manager_model->get_productTypeID_productTypeName();
		$data=$this->manager_model->get_all_product_in_stock($infos);
		$product=$this->manager_model->get_total_product();
		$weight=$this->manager_model->get_total_weight();
		$price=$this->manager_model->get_total_price();
		$this->load->view('manager/stockReport',['values'=>$value,'infos'=>$data,'inputs'=>$infos,'product'=>$product,'weight'=>$weight,'price'=>$price]);
	}
	/*Stock Report End*/
	public function stockUpdateReport(){
		
		$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}

		}
		else{
			$infos['entryId']=0;
			$infos['productType']=0;
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');	
		}

		$data['productType']=$this->manager_model->get_productTypeID_productTypeName();
		if($infos['entryId']==2 ){
			$data['soldProduct']=$this->manager_model->get_all_soldProduct($infos);
			$data['newProduct']="";
		}

		else if($infos['entryId']==1 ){
			$data['newProduct']=$this->manager_model->get_all_newProduct($infos);
			$data['soldProduct']="";
		}

		else if($infos['entryId']==0){
			$data['soldProduct']=$this->manager_model->get_all_soldProduct($infos);
			$data['newProduct']=$this->manager_model->get_all_newProduct($infos);
		}
		$this->load->view('manager/stockUpdateReport',['infos'=>$data,'inputs'=>$infos]);
	}
	/*Sale report Start*/
	public function saleReport(){
		$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}
		}
		else{
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');	
		}
		$data=$this->manager_model->get_all_saleReport($infos);
		$this->load->view('manager/saleReport',['infos'=>$data,'inputs'=>$infos]);
	}
	/*Sale Report End*/
	public function cashBook(){

		$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}
		}
		else{
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');	
		}
		$data['firstDate']=$infos['firstDate'];
		$data['lastDate']=$infos['lastDate'];
		
		$data['cashAmount']=$this->manager_model->get_cash_amount();
		$data['cadits']=$this->manager_model->get_cadit_transection($infos);
		//print_r($cadit);exit;
		$data['debits']=$this->manager_model->get_debit_transection($infos);
		//print_r($data['debits']); exit;
		$this->load->view('manager/cashBook',$data);
	}
	/*Transaction Report Start*/
	public function transactionReport(){
		$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}
		}
		else{
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');	
		}
		//print_r($infos); exit;

		$data=$this->manager_model->get_all_transaction($infos);
		$this->load->view('manager/transactionReport',['infos'=>$data,'inputs'=>$infos]);
	}
	public function incomeExpenseReport(){
		$infos=$this->input->post();
		
		if($infos){
			if($infos['firstDate']){
				$infos['firstDate']= date('Y-m-d 00:00:00',strtotime($infos['firstDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			}
			if($infos['lastDate']){
				$infos['lastDate']= date('Y-m-d 23:59:59',strtotime($infos['lastDate']));
			}
			else{
				$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
				$infos['lastDate']= $dt->format('Y-m-d 23:59:59');
			}
		}
		else{
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$infos['firstDate']= $dt->format('Y-m-d 00:00:00');
			$infos['lastDate']= $dt->format('Y-m-d 23:59:59');	
		}
		//print_r($infos); exit;

		$data=$this->manager_model->get_all_transaction($infos);
		$this->load->view('manager/incomeExpenseReport',['infos'=>$data,'inputs'=>$infos]);
		//$this->load->view('manager/incomeExpenseReport');
	}
	/*Transaction Report End*/
	//View Cash In / Out
	public function viewCashInOut($id){
		$data['info']=$this->manager_model->get_cash_in_out_info_by_id($id);
		$this->load->view('manager/viewCashInOut',$data);
	}
	
	/*Admin Start*/
	public function unitPrice(){
		$value=$this->manager_model->get_unitPrice_details();

		$data=$this->input->post();

		
		if($data){
			$id=$data['qualityId'];
			if($this->manager_model->update_unit_price($id,$data)){
				$this->session->set_flashdata('feedback_successfull', 'Unit Price Updated Successfully');

				/*print_r($data);
				exit();*/
				return redirect('manager/unitPrice');
			}
			else{
				$this->session->set_flashdata('feedback_failed', 'Unit Price Update Failed');
				return redirect('manager/unitPrice');
			}
		}
		else
			$this->load->view('manager/unitPrice',['values'=>$value]);
		
	}
	
	/*Admin End*/





	// public function filename(){
	// 	$this->load->view('manager/filename');
	// }
}
