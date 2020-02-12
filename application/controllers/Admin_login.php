<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_log_model','alm');
	}

	public function index()
	{
		$data = array();
		$this->load->view('backend/login', $data);
	}

	public function check_login()
	{
		$err_msg['no_error'] = false;
		// data input
		$username = $this->input->post('username');
		$userpass = $this->input->post('pass');
		// data checking 
		if($username == '')
		{
			$err_msg['main_error'] = "Enter your user name";
		}
		else if($userpass == '')
		{
			$err_msg['main_error'] = "Enter your password";
		}
		else
		{
			if($err_msg['check_log_val'] = $this->alm->check_login())
			{
				$err_msg['no_error'] = true;
				$err_msg['view_id'] = $err_msg['check_log_val'][0]['id'];
				$data_session_id = $err_msg['view_id'];
				$err_msg['main_error'] = "Successfully Logged-In ! redirecting to admin dashboard . . . .";
				// $err_msg['view_session_data'] = $data_session_id;
				$_SESSION['login_admin'] = $data_session_id;
			}
			else
			{
				$err_msg['main_error'] = "Username / Password Invalid";
			}
		}
		echo json_encode($err_msg);
	}

	public function logout(){
		session_destroy();
		$data = array();
		$this->load->view('backend/login', $data);
	}

}

/* End of file Admin_login.php */
/* Location: ./application/controllers/Admin_login.php */