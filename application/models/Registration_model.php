<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registration_model','rm');
	}

	public function add_reg(){
		// data fetch
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		$user_c_pass = $this->input->post('user_c_pass');
		// encrypted password
		$enc_pass = $this->input->post('user_pass');
		// checking password condittion
		if($user_pass == $user_c_pass){
			$where_condition = [
				'user_email' => $user_email,
			];
			// seatching query
			$search_data = $this->db->where($where_condition)->get('reg_font');
			// checking main condition
			if($search_data->num_rows() == 0){
				$reg_data_store = [
					'user_name' => $user_name,
					'user_email' => $user_email,
					'user_pass' => $user_pass,
					'enc_pass' => md5($enc_pass)
				];
				// db insert query
				$data_insert = $this->db->insert('reg_font',$reg_data_store);
				if($this->db->affected_rows()){
					return true;
				} else{
					return false;
				}
			}else{
				return false;
			}
		}
		
	}

	public function login_check()
	{
		// data fetch
		$user_name = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		// encrypted password
		$enc_pass = md5($user_pass);
		// checking conditions
		$where_check = [
			'user_email' => $user_name,
			'enc_pass' => $enc_pass
		];
		// data search query
		$data_search = $this->db->where($where_check)->get('reg_font');
		// checking data 
		$data_search_count = $data_search->num_rows();
		if($data_search_count>0){
			$tot_result = $data_search->result_array();
			return $tot_result;
		}else{
			return false;
		}
	}

}

/* End of file Registration_model.php */
/* Location: ./application/models/Registration_model.php */