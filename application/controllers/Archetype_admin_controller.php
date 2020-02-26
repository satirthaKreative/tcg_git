<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archetype_admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Admin_archetype_model','aam');
	}

	public function index()
	{
		$this->load->library('pagination');
		

		$config = [
			'base_url' => base_url('Archetype_admin_controller/'),
			'total_rows' => $this->aam->count_total_rows(),
			'per_page' => 10,
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li class='page-item'>",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li class='page-item'>",
			'prev_tag_close' => "</li>",
			'num_tag_open' => "<li class='page-item'>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
			'cur_tag_close' => "</a></li>",
			'first_link' => 'First',
			'last_link' => 'Last',
			'first_tag_open' => "<li class='page-item'>",
			'first_tag_close' => '</li>',
			'last_tag_open' => "<li class='page-item'>",
			'last_tag_close' => '</li>',
		];
		
		$this->pagination->initialize($config);
		
		$articles = $this->aam->articlelist($config['per_page'],$this->uri->segment(2));
		$this->load->admin_pages('backend/archetype-editor',['article' => $articles]);
	}

	public function arche_how_check(){
		$result_array = $this->aam->arche_how_check();
		echo json_encode($result_array);
	}

	public function arche_name_check(){
		$result_array = $this->aam->arche_name_check();
		echo json_encode($result_array);
	}

	public function popup($data)
	{
		$result_array = $this->aam->popup($data);
		echo json_encode($result_array);
	}

	public function checking_arche_name()
	{
		$data_val = $_POST['dataTA'];
		$result_array = array(
			'pagination_data' => $this->aam->checking_arche_name($data_val)
		);
		echo  json_encode($result_array);
	}

	public function checking_archetype_wish()
	{
		$data_val = $_POST['dataTA'];
		$result_array = array(
			'pagination_data1' => $this->aam->checking_archetype_wish($data_val)
		);
		echo  json_encode($result_array);
	}

	public function checking_for_users()
	{
		$data_val = $_POST['data'];
		$result_array = $this->aam->checking_for_users($data_val);
		echo  json_encode($result_array);
	}

	public function denial_send_data()
	{
		$data_val = $_POST['res_data'];
		$res_val = $_POST['d_res'];
		$res_event['err_msg'] = false;
		$res_event['data_values'] = "Error data";
		if($result_array = $this->aam->denial_send_data($data_val,$res_val)){
			$res_event['err_msg'] = true;
			$res_event['data_values'] = "Successfully added the response";
		}
		echo  json_encode($res_event);
	}

	public function checking_denial_msg()
	{
		$data_show = $_POST['response_data'];
		$result_array = $this->aam->checking_denial_msg($data_show);
		echo  json_encode($result_array);
	}

	public function send_mail_data(){
		# update archetype data
		$need_update_fetch = $this->aam->query_updateFetch($_POST['rez_data'],$_POST['main_arche_id']);

		# end of update archetype data

		$resp_data = $_POST['rez_data'];
		$result_array = $this->aam->send_mail_data($resp_data);
		$main_user_email = $result_array;

		$main_id = $_POST['main_arche_id'];
		$main_archetype = $this->aam->show_arche_type($main_id);
		$main_arche_name = $main_archetype;

		$main_descrip = $_POST['main_descrip'];
		$data_send_to_server = $this->aam->update_data_type($resp_data,$main_descrip);

		if($main_id == '')
		{
			$err_msg['main_error'] = "Select archetype";
		}
		else if($main_user_email == '')
		{
			$err_msg['main_error'] = "Enter email address";
		}
		else if(filter_var($main_user_email, FILTER_VALIDATE_EMAIL) == false)
		{
			$err_msg['main_error'] = 'Enter valid email address';
		}
		else
		{
			$from = 'info@ecollegestreet.in';
			//  $user_email
			$to = $main_user_email; 
		    $contact_no = $this->input->post('usernumber');
		    $message_data = $this->input->post('usermsg');
		    // 	sinfo.support@tcg.com
			$subject = 'Enquiry Form';
			$message = '<html lang="en"><head><meta charset="UTF-8"><title>Document</title></head><body style="margin: 0; padding: 15px !important; mso-line-height-rule: exactly; background-color: #f1f1f1;"><div style="max-width: 600px; margin: 0 auto;background-color: #ffffff;" class="email-container"><table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"><thead><tr><td colspan="2" style="background: #b31605;border-bottom: 3px solid #941f1c;padding: 10px 15px;text-align:center;"><h3 style="padding: 10px 0; text-decoration: none;font-size:22px;font-weight:700;color:#ffffff; margin: 0;">Response Mail</h3></td></tr></thead><tbody style="padding: 10px;display: block;"><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td colspan="2" style="text-align: center;font-size: 22px;color: #84bb2b;padding: 10px 60px 20px;
"><p>Your suggestion was successfully approved by Admin For "'.$main_arche_name.'" Archetype</p></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 130px;display: inline-block;text-align: left;">Archetype Name:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$main_arche_name.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 6px;"></td></tr><tr><td style="border-collapse: collapse;text-align: left;padding: 15px;width: 20%;"><strong style="width: 130px;display: inline-block;text-align: left;">Denial Response:</strong></td><td style="border-collapse: collapse;text-align: left;padding: 15px;background-color: #fff;border: 2px solid #f3f3f3;">'.$main_descrip.'</td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: left;padding: 15px; height: 90px;"></td></tr><tr><td colspan="2" style="border-collapse: collapse;text-align: center;padding: 15px;background-color: #1b1919;font-size: 14px;color: #989696;">© All rights reserved is a copyright formality indicating</td></tr></tbody></table></div></body></html>';

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

/* End of file Archetype_admin_controller.php */
/* Location: ./application/controllers/Archetype_admin_controller.php */