<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_archetype_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function count_total_rows()
	{
		$return_rows = $this->db->select('*')
								->from('archetype_name a')
								->join('archetype_category b','b.id = a.a_id')
								->join('format_tbl c','c.id = b.f_id')
								->get();
		$total_rows = $return_rows->num_rows();
		return $total_rows;
	}

	public function articlelist($limit,$offset)
	{
		$return_rows = $this->db->select('*, a.id as mainId')
								->from('archetype_name a')
								->join('archetype_category b','b.id = a.a_id')
								->join('format_tbl c','c.id = b.f_id')
								->limit($limit,$offset)
								->get();
		$total_rows = $return_rows->num_rows();
		if($total_rows>0)
		{
			// echo "<pre>";
			return $return_rows->result();
			// print_r($return_rows->result());
			// exit();
		}
		else
		{
			return false;
		}
	}

	public function arche_how_check()
	{
		$result_arr = $this->db->group_by('archetype_filter')->get('archetype_category');
		if($result_arr->num_rows() > 0)
		{
			return $result_arr->result();
		}
		else
		{
			return false;
		}
	}

	public function popup($data){
		$result_arr = $this->db->where('id',$data)->get('archetype_name');
		return $result_arr->result();
	}

}

/* End of file Admin_archetype_model.php */
/* Location: ./application/models/Admin_archetype_model.php */