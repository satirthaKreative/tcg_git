<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registration_model','rm');
	}
	// checking registration config

	public function check_registration()
	{
		// data fetch
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		$user_c_pass = $this->input->post('user_c_pass');
		// where condiition
		$where_condition = [
			'user_email' => $user_email,
		];

		$search_data = $this->db->where($where_condition)->get('reg_font');

		if($search_data->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}

	// add reg
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
			// update condition
			$updateCondition = [
				'active_state' => 1
			];
			$update_active_state =$this->db->where($where_check)->update('reg_font',$updateCondition);
			// total result
			$tot_result = $data_search->result_array();
			return $tot_result;
		}else{
			return false;
		}
	}

	public function all_details($data){
		$result = $this->db->where('id',$data)->where('paymentGateway','Card')->get('reg_font');
		return $result->result();
	}

	public function all_paypal_details($data){
		$result = $this->db->where('id',$data)->where('paymentGateway','Paypal')->get('reg_font');
		return $result->result();
	}


	public function edit_all_data($data){
		$arr_err = [
			'user_name'=>$this->input->post('full_name'),
			'user_email'=>$this->input->post('card_email'),
			'cNumber'=>$this->input->post('credit_card_number'),
			'cexpireDateM'=>$this->input->post('card_exp_month'),
			'cexpireDateY'=>$this->input->post('card_exp_year'),
			'cusAddress'=>$this->input->post('billing_address_view'),
			'cardType'=>$this->input->post('creditt_card_view')
		];
		$data_return = $this->db->where('id',$data)->update('reg_font',$arr_err);
		if($this->db->affected_rows()){
			return ture;
		}else{
			return false;
		}
	}

	// checking data ragistration model
	 public function check_email_address($data){
	 	$select_reg_tbl = $this->db->where('user_email',$data)->get('reg_font');
	 	if($select_reg_tbl->num_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}
	 }
	 
	 // forgot password

	  public function forgot_pass_recover($pass,$mail)
	 {
	 	$update_arr = [
	 		'user_pass' =>$pass,
	 		'enc_pass' =>md5($pass), 
	 	];
	 	$update_pass = $this->db->where('user_email',$mail)->update('reg_font',$update_arr);
	 	if($this->db->affected_rows())
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }

}

/* End of file Registration_model.php */
/* Location: ./application/models/Registration_model.php */