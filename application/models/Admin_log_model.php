<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_log_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function check_login()
	{
		// data input
		$username = $this->input->post('username');
		$userpass = $this->input->post('pass');
		// where conditions 
		$where_condition = [
			'user_name' => $username,
			'enc_pass' => md5($userpass),
			'admin_status' => 1,
		];
		// fetch query
		$select_all_data = $this->db->where($where_condition)->get('reg_font');
		// fetch whole data
		$fetch_all_data = $select_all_data->result_array();
		// checking condition
		if($select_all_data->num_rows() > 0)
		{
			return $fetch_all_data;
		}
		else
		{
			return false;
		}
	}

}

/* End of file Admin_log_model.php */
/* Location: ./application/models/Admin_log_model.php */