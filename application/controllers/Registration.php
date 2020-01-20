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

		// session data set
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['upass'] = $user_pass;
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
			if($reg_input = $this->rm->check_registration()){
				$err_msg['no_error'] = true;
			}else{
				$err_msg['estimate_err'] = "This e-mail already registered";
			}
		}
		echo json_encode($err_msg);
	}

	public function unset_session_reg()
	{
		session_destroy();
		return true;
	}

	// payment session check
	public function check_session_gateway(){
		$data_user = $_SESSION['user_name']; 
		$data_mail = $_SESSION['user_email']; 
		$data_pass = $_SESSION['upass'];

		$arr_ses = [
			$data_user,$data_mail,$data_pass
		];

		echo  json_encode($arr_ses);
	}

	public function all_details($data)
	{
		$data = $this->rm->all_details($data);
		echo json_encode($data);
	}

	public function all_paypal_details($data)
	{
		$data = $this->rm->all_paypal_details($data);
		echo json_encode($data);
	}

	public function edit_all_data($data){
		$data_edit = $this->rm->edit_all_data($data);
		if($data_edit){
			return true;
		}else{
			return false;
		}
	}

	// checking email for recovery password
	function check_email_address(){
		$data = $_POST['data_mail'];
		
		$error['no_error'] = false;
		$error['err_msg'] = "This email address is not registered yet";
		if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
			$error['no_error'] = false;
			$error['err_msg'] = "Please enter a valid email address";
		}else if($result = $this->rm->check_email_address($data)){
			$error['no_error'] = true;
			$error['err_msg'] = "";
		}
		echo json_encode($error);
	}

	// forgot pass with validate

	public function forgot_pass_recover(){
		$password = $_POST['data_n_pass'];
		$cpassword = $_POST['data_nc_pass'];
		$rmail = $_POST['recover_email'];

		$error['no_error'] = false;
		if($password == '')
		{
			$error['no_error'] = false;
			$error['err_msg'] = "Please enter a password";
		}
		else if(strlen($password)<6)
		{
			$error['no_error'] = false;
			$error['err_msg'] = "Please enter minimum 6 digit password";
		}
		else if($cpassword == '')
		{
			$error['no_error'] = false;
			$error['err_msg'] = "Re-enter confirm password";
		}
		else if($password != $cpassword)
		{
			$error['no_error'] = false;
			$error['err_msg'] = "Both the password doesn't matched";
		}
		else if($result = $this->rm->forgot_pass_recover($password,$rmail))
		{
			$error['no_error'] = true;
			$error['err_msg'] = "Password successfully changed";
		}
		echo json_encode($error);
	}

}

/* End of file Registration.php */
/* Location: ./application/controllers/Registration.php */