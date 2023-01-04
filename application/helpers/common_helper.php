<?php
class common {

	public static function get_previous_due_of_sale($id){
		$CI = & get_instance();

		$q=$CI->db->select('previousDue')
					->from('sale_info')
					->where('saleID',$id)
					->get();
		return $q->row()->previousDue;
	}

}

?>