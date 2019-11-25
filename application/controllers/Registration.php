<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registration_model','rm');
	}

	public function index()
	{
		$data = array();
		$this->load->font_page('frontend/layout/registration', $data, FALSE);
	}

	public function add_reg(){
		$err_msg['no_error'] = false;
		// data fetch
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		$user_c_pass = $this->input->post('user_c_pass');
		// email preg pattern
		//$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		// checking the validation
		if($user_name == '')
		{
			$err_msg['estimate_err'] = 'Enter a user name';
		}
		else if($user_email == '')
		{
			$err_msg['estimate_err'] = 'Enter your email address';
		}
		else if(filter_var($user_email, FILTER_VALIDATE_EMAIL) == false)
		{
			$err_msg['estimate_err'] = 'Enter your valid email address';
		}
		else if($user_pass == '')
		{
			$err_msg['estimate_err'] = 'Enter your password';
		}
		else if(strlen($user_pass)<6)
		{
			$err_msg['estimate_err'] = 'Password atleast 6 characters long';
		}
		else if($user_c_pass == '')
		{
			$err_msg['estimate_err'] = 'Re-enter your password';
		}
		else if($user_pass != $user_c_pass)
		{
			$err_msg['estimate_err'] = "Both password doesn't matched";
		}
		else{
			if($reg_input = $this->rm->add_reg()){
				$err_msg['no_error'] = true;
				$err_msg['estimate_err'] = "Registration successfully done !";
			}else{
				$err_msg['estimate_err'] = "This e-mail already registered";
			}
		}
		echo json_encode($err_msg);
	}

}

/* End of file Registration.php */
/* Location: ./application/controllers/Registration.php */