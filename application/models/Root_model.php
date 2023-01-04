<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root_model extends CI_Model {

	public function my_info($user_id){
        $q=$this->db
            ->select('*')
            ->from('admin_info')
			->join('admin_role','admin_role.role_id=admin_info.admin_role_role_id')
            ->where('admin_id',$user_id)
            ->where('admin_status', 1)
            ->get();
        if($q->num_rows()==1){
			return $q->row();
		}
        else{
            return FALSE;
        }
    }

	public function get_user_role()
	{

		$q=$this->db
				->select('*')
				->from('admin_role')
				->where('role_id !=', 1)
				->get();

		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function users_info($limit,$offset)
	{
		
		$q=$this->db
				->select('*')
				->from('admin_info')
				->join('admin_role','admin_role.role_id=admin_info.admin_role_role_id')
				->where('admin_role_role_id!=',1)
				->limit($limit,$offset)
				->get();
				
		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function add_user($data)
	{
		return $this->db->insert('admin_info', $data );
	}
	public function get_user($user_id)
	{
		$q=$this->db
				->select('*')
				->from('admin_info')
				->join('admin_role','admin_role.role_id=admin_info.admin_role_role_id')
				->where('admin_id',$user_id)
				->where('admin_role_role_id!=',1)
				->get();
				
		if($q->num_rows()){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function update_user($user_id, $data)
	{
		return $this->db
				->where('admin_id',$user_id)
				->update('admin_info',$data);
		
	}
	public function delete_user($user_id)
	{
		return $this->db->delete('admin_info',['admin_id'=>$user_id]);
		
	}
	
	public function get_category_parent()
	{

		$q=$this->db
				->select('category_id,category_name')
				->from('category')
				->get();

		if($q->num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_parent_depth($parent)
	{

		$q=$this->db
				->select('depth')
				->from('category')
				->where('category_id',$parent)
				->get();

		if($q->num_rows()==1){
			return $q->row()->depth;
		}
		else{
			return FALSE;
		}
	}
	public function add_category($data)
	{
		return $this->db->insert('category', $data );
	}
	
	public function update_contact($admin_id,$data){
		return $this->db
			        ->where('admin_id',$admin_id)
				    ->update('admin_info',$data);
	}
	public function change_password($data,$admin_id){
		return $this->db
			        ->where('admin_id',$admin_id)
				    ->update('admin_info',$data);
	}
}
