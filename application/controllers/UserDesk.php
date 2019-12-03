<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserDesk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserDeskModel','udm');
	}

	public function index()
	{
		$data_arr = array();
		$this->load->font_page('frontend/layout/user-desk',$data_arr);
	}

	public function activity_of_user($user_active_session)
	{
		$data_result = $this->udm->activity_of_user($user_active_session);
		echo  json_encode($data_result);
	}

	public function update_activity($session_id)
	{
		$session_data_id = $session_id;
		$data_status = $this->input->post('t');
		$data_result = $this->udm->update_activity($session_data_id,$data_status);
		echo json_encode($data_result);
	}

	public function submit_data($data)
	{
		$errmsg['no_error'] = false;
		if($data_insert = $this->udm->submit_data($data))
		{
			$errmsg['no_error'] = true;
			$errmsg['main_error'] = "Successfully Added";
		}
		echo json_encode($errmsg);
	}

	public function submit_data_provider($data)
	{
		$errmsg['no_error'] = false;
		if($data_insert = $this->udm->submit_data_provider($data))
		{
			$errmsg['no_error'] = true;
			$errmsg['main_error'] = "Successfully Added";
		}
		echo json_encode($errmsg);
	}


}

/* End of file UserDesk.php */
/* Location: ./application/controllers/UserDesk.php */