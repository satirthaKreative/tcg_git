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
								->from('deckeditortmpstore a')
								->join('format_tbl b','a.format_name = b.id','INNER')
								->join('reg_font c','a.user_id = c.id','INNER')
								->get();
		$total_rows = $return_rows->num_rows();
		return $total_rows;
	}

	public function articlelist($limit,$offset)
	{
		$return_rows = $this->db->select('*, a.id as mainId, b.format_name as main_format_name')
								->from('deckeditortmpstore a')
								->join('format_tbl b','a.format_name = b.id','INNER')
								->join('reg_font c','a.user_id = c.id','INNER')
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

	public function arche_name_check()
	{
		$result_arr = $this->db->get('archetype_name');
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
		$result_arr = $this->db->where('id',$data)->get('deckeditortmpstore');
		return $result_arr->result();
	}

	public function checking_arche_name($data_val){
		$result_arr = $this->db->get('archetype_name');


		if($result_arr->num_rows() > 0)
		{
			$html_view = "";
			foreach($result_arr->result() as $res_data){
				if($res_data->id == $data_val){
					$select_state = "selected";
				}else{
					$select_state = "";
				}
				$html_view .= "<option value='".$res_data->id."' ".$select_state.">".$res_data->archetype_name."</option>";
			}
			return $html_view;
		}
	}

	public function checking_archetype_wish($data_val){
		$result_arr1 = $this->db->where('id',$data_val)->get('archetype_name');
		$fetch_arr1 = $result_arr1->row();
		$data_a_id = $fetch_arr1->a_id;
		$result_arr = $this->db->group_by('archetype_filter')->get('archetype_category');


		if($result_arr->num_rows() > 0)
		{
			$html_view = "";
			foreach($result_arr->result() as $res_data){
				if($res_data->id == $data_a_id){
					$select_state = "selected";
				}else{
					$select_state = "";
				}
				$html_view .= "<option value='".$res_data->id."' ".$select_state.">".$res_data->archetype_filter."</option>";
			}
			return $html_view;
		}
	}

	

}

/* End of file Admin_archetype_model.php */
/* Location: ./application/models/Admin_archetype_model.php */