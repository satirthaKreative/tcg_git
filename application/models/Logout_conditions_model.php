<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_conditions_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}	

public function logout_model($session_id)
{
	$updateCondition = [
		'active_state' => 0
	];

	$this->db->where('id',$session_id)->update('reg_font',$updateCondition);

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

/* End of file Logout_conditions_model.php */
/* Location: ./application/models/Logout_conditions_model.php */