<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model_f extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add_insert($arrEmp){

		// User Payment Insert Query
		$db_insert = $this->db->insert('reg_font',$arrEmp);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Auth_model_f.php */
/* Location: ./application/models/Auth_model_f.php */