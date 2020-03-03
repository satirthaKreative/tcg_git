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

	public function new_msg_session_set()
	{
		$my_id = $_SESSION['session_data'];
		$fetchQuery = $this->cnmm->new_msg_session_set($my_id);
		if($fetchQuery)
		{
			$no_error['no_error'] = true;
		}
		else
		{
			$no_error['no_error'] = false;
		}
		echo  json_encode($no_error);
	}

	public function checking_new_msg_come()
	{
		$new_session_msg = $_POST['sess_id'];	
		if($fetchQuery = $this->cnmm->checking_new_msg_come($new_session_msg))
		{
			$no_error['main_content'] = $fetchQuery;
		}
		else
		{
			$no_error['main_content'] = false;	
		}
		echo json_encode($no_error);

	}

}

/* End of file Checking_new_msg_controller.php */
/* Location: ./application/controllers/Checking_new_msg_controller.php */