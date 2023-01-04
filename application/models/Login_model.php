<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


	public function login_value($email,$password)
	{
		$q=$this->db->where(['adminUserID'=>$email,'adminPassword'=>$password,'adminStatus'=>1])
				->get('admin_info');
		if($q->num_rows()==1){
			return $q->row_array();
		}else{
			return FALSE;
		}
	}
}
