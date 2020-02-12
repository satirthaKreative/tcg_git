<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_count_model extends CI_Model {

	public function index()
	{

	}

	public function dashboard_count_data()
	{
		// show advertise 
		$selectAdv = $this->db->get('advertise_image');
		$countAdv = $selectAdv->num_rows();
		// show archetype name
		$selectArche = $this->db->get('archetype_name');
		$countArche = $selectArche->num_rows();
		// show users
		$where_condition = [
			'admin_status' => 0
		];
		$selectUsers = $this->db->where($where_condition)->get('reg_font');
		$countUsers = $selectUsers->num_rows();
		// show format
		$selectFormat = $this->db->get('format_tbl');
		$countFormat = $selectFormat->num_rows();

		$create_arr = [
			0 => $countAdv,
			1 => $countArche,
			2 => $countUsers,
			3 => $countFormat
		];
		return $create_arr;
	}	

}

/* End of file Dashboard_count_model.php */
/* Location: ./application/models/Dashboard_count_model.php */