<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_model extends CI_Model {

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

	public function add_product_group($data)
	{
		return $this->db->insert('product_group_info', $data );
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
	public function all_expense_field($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('expense_field_info')
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function add_expense_field($data)
	{
		return $this->db->insert('expense_field_info', $data );
	}
	
	public function all_shop($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('shop_info')
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function add_shop($data)
	{
		return $this->db->insert('shop_info', $data );
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
	
	public function all_user($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('admin_info')
				->where('admin_role_roleID>',1)
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function extend_date($data)
	{
		return $this->db
			        //->where('adminID',$admin_id)
				    ->update('expair_date',$data);
	}
	
}
