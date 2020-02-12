<?php 
header('Access-Control-Allow-Origin: *');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_font extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registration_model','rm');
	}

	public function index()
	{
		if(isset($_SESSION['session_data']))
		{
			redirect('Home');
		}
		else
		{
			$array = array();
			$this->load->font_page('frontend/layout/index',$array);
		}
	}

	public function add_login(){
		$err_msg['no_error'] = false;
		// data fetch
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		$err_msg['user_email'] = $user_email;
		$err_msg['user_pass'] = $user_pass;
		
		// checking the validation
		if($user_email == '')
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
		else
		{
			if($err_msg['user_try'] = $this->rm->login_check()){
				$session_data = $err_msg['user_try'][0]['id'];
				$session_user = $err_msg['user_try'][0]['user_name'];
				//$err_msg['session_data'] = $session_data;
				$_SESSION['session_data'] = $session_data;
				$_SESSION['session_user'] = $session_user;
				$err_msg['no_error'] = true;
				$err_msg['estimate_err'] = "Login successfully done ! Redirecting . . .";

			}else{
				$err_msg['estimate_err'] = "Username / Password Invalid !";
			}
		}
		echo json_encode($err_msg);
	}

	


}

/* End of file Login_font.php */
/* Location: ./application/controllers/Login_font.php */