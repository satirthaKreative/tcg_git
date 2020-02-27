<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checking_new_msg_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Checking_new_msg_model','cnmm');
	}

	public function index()
	{
		
	}

	public function checking_new_msg_come()
	{
		$new_session_msg = $_POST['sess_id'];	
		$fetchQuery = $this->cnmm->checking_new_msg_come($new_session_msg);
	}

}

/* End of file Checking_new_msg_controller.php */
/* Location: ./application/controllers/Checking_new_msg_controller.php */