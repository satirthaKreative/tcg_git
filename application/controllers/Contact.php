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
        	$from = 'info@ecollegestreet.in';
        	//  $user_email
        	$to = 'santu.kreative@gmail.com'; 
            $contact_no = $this->input->post('usernumber');
            $message_data = $this->input->post('usermsg');
            // 	sinfo.support@tcg.com
        	$subject = 'Enquiry Form';
        	$message = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Document</title></head><body style="margin: 0; padding: 15px !important; mso-line-height-rule: exactly; background-color: #f1f1f1;"><div style="max-width: 600px; margin: 0 auto;background-color: #ffffff;" class="email-container"><table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"><thead><tr><td colspan="2" style="background: #b31605;border-bottom: 3px solid #941f1c;padding: 10px 15px;text-align:center;"><h3 style="padding: 10px 0; text-decoration: none;font-size:22px;font-weight:700;color:#ffffff; margin: 0;">TCG Query</h3></td></tr></thead><tbody style="padding: 10px;display: block;"><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Name:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$user_name.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Email:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$to.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Phone:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$contact_no.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Query:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$message_data.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 15px; height: 90px;"></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: center;padding: 15px;background-color: #1b1919;font-size: 14px;color: #989696;">© All rights reserved is a copyright formality indicating</td></tr></tbody></table></div></body></html>';

        	$this->email->from($from);
        	$this->email->to($to);
        	$this->email->subject($subject);
        	$this->email->message($message);
        	$this->email->set_mailtype('html');

        	if ($this->email->send()) {
        		$err_msg['no_error'] = true;
        	    $err_msg['main_error'] = 'Your email has successfully been sent.';
        	} else {
        	    $err_msg['main_error'] = 'Server Not Responding ! Try Again';
        	}
        }
		echo json_encode($err_msg);
	}

}


/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */