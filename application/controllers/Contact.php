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
        	$to = 'satirtha63@gmail.com'; 
            // 	sinfo.support@tcg.com
        	$subject = 'Enquiry Form';
        	$message = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Document</title></head><body style="margin: 0px;padding: 0px !important;text-align: left !important;width: 100% !important;height: 100% !important;><table style="border: none;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;padding:0 30px;background-color: #fbfbfb;margin: auto;" width="600" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ececec" class="main"><thead><tr><td colspan="2" style="background: #b31605;border-bottom: 3px solid #941f1c;padding: 10px 15px;"><a href="#" style="display: block;float: left;max-width: 345px;"><img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/logo.png" alt="brand logo" style="max-width: 42px;"></a><h3 style="float: right;padding: 10px 0; text-decoration: none;font-size: 22px;font-weight: 700;color: #ffffff;    margin: 0;">TCG Query</h3></td></tr></thead><tbody><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;padding: 6px;"></td></tr><tr><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Name:</strong> </td><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$user_name.'</td></tr><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;padding: 6px;"></td></tr><tr><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Email:</strong></td><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$to.'</td></tr><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;padding: 6px;"></td></tr><tr><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Contact:</strong> </td><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$user_number.'</td></tr><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;padding: 6px;"></td></tr><tr><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;width: 20%;"><strong style="width: 90px;display: inline-block;text-align: left;">Query:</strong></td><td style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;    padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$user_msg.'</td></tr><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;text-align: left;padding: 15px; height: 90px;"></td></tr></tbody><tfoot><tr><td colspan="2" align="center" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;padding: 15px;background-color: #1b1919;"><p style="margin: 0; font-size: 14px;color: #989696;">© All rights reserved is a copyright formality indicating</p></td></tr><tr><td colspan="2" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;padding: 15px;background-color: #ffffff;"></td></tr></tfoot></table></body></html>';

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