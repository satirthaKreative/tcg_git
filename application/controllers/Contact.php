<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array();
		$this->load->font_page('frontend/layout/contact',$data);
	}

	public function send_msg_mail()
	{

		$err_msg['no_error'] = false;
		$user_name = $this->input->post('username');
		$user_email = $this->input->post('useremail');
		$user_number = $this->input->post('usernumber');
		$user_msg = $this->input->post('usermsg');

        if($user_name == '')
        {
        	$err_msg['main_error'] = "Enter your name";
        }
        else if($user_email == '')
        {
        	$err_msg['main_error'] = "Enter your email address";
        }
        else if(filter_var($user_email, FILTER_VALIDATE_EMAIL) == false)
        {
        	$err_msg['main_error'] = 'Enter your valid email address';
        }
        else if($user_msg == '')
        {
        	$err_msg['main_error'] = 'Enter your queries';
        }
        else
        {
        	$from = $user_email;
        	$to = 'sinfo.support@tcg.com';
        	$subject = 'Enquiry Form';
        	$message = $user_msg;

        	$this->email->from($from);
        	$this->email->to($to);
        	$this->email->subject($subject);
        	$this->email->message($message);

        	if ($this->email->send()) {
        		$err_msg['no_error'] = true;
        	    $err_msg['main_error'] = 'Your Email has successfully been sent.';
        	} else {
        	    $err_msg['main_error'] = 'Server Not Responding ! Try Again';
        	}
        }
		echo json_encode($err_msg);
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */