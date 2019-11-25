<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_dashboard_model','adm');
	}

	public function index()
	{
		$data = array();
		// dashboard logged
		$this->load->admin_pages('backend/dashboard', $data, FALSE);
	}

	public function profile_details()
	{
		$data = array();
		// admin profiles
		$this->load->admin_pages('backend/profile');
	}

	public function view_admin_details()
	{
		$err_msg = $this->adm->checking_data();
		echo json_encode($err_msg);
	}

	public function update_admin_details()
	{
		$err_msg['no_error'] = false;
		// fetch all form data's
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		if($user_name == '')
		{
			$err_msg['main_error'] = "Enter your new username"; 
		}
		else if($user_email == '')
		{
			$err_msg['main_error'] = "Enter your email address";
		}
		else if($user_pass == '')
		{
			$err_msg['main_error'] = "Enter your new password";
		}
		else
		{
			if($up_admin_des = $this->adm->update_admin_details())
			{
				$err_msg['no_error'] = true;
				$err_msg['main_error'] = "Details updated successfully !!!";
			}
			else
			{
				$err_msg['main_error'] = "Something went wrong! Try again later";
			}
		}
		echo json_encode($err_msg);
	}

	public function Users()
	{
		$data = array();
		$this->load->admin_pages('backend/view_user', $data, FALSE);
	}

	public function view_users()
	{
		$err_msg = $this->adm->view_users();
		echo json_encode($err_msg);
	}
	
	public function deactive_user($id)
	{
		$err_msg['no_error'] = false;
		if($test_msg = $this->adm->deactive_user($id)){
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Deactived The User";
		}else {
			$err_msg['main_error'] = "Something went wrong! Try again later";
		}
		echo json_encode($err_msg);
	}

	public function active_user($id)
	{
		$err_msg['no_error'] = false;
		if($test_msg = $this->adm->active_user($id)){
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Actived The User";
		}else {
			$err_msg['main_error'] = "Something went wrong! Try again later";
		}
		echo json_encode($err_msg);
	}

	public function advertise()
	{
		$data = array();
		$this->load->admin_pages('backend/add_adv',$data);
	}

	public function view_advertise()
	{
		$data = array();
		$this->load->admin_pages('backend/view_adv',$data);
	}

	public function upload_image()
	{
		$err_msg['no_error'] = false;
		if (isset($_FILES['image_user_files']) && !empty($_FILES['image_user_files'])) {
		    $no_files = count($_FILES["image_user_files"]['name']);
		    for ($i = 0; $i < $no_files; $i++) {
		        if ($_FILES["image_user_files"]["error"][$i] > 0) {
		            $err_msg['main_error'] = "Error: " . $_FILES["image_user_files"]["error"][$i] . "<br>";
		        } else {
		            if (file_exists('uploads/img_uploads/' . $_FILES["image_user_files"]["name"][$i])) {
		            	$err_msg['main_error'] = $_FILES["image_user_files"]["name"][$i]. " image already uploaded";  
		            } else {
		                move_uploaded_file($_FILES["image_user_files"]["tmp_name"][$i], 'uploads/img_uploads/' . $_FILES["image_user_files"]["name"][$i]);
		            }
		        }
		    }
		    if($data_images = $this->adm->upload_images())
		    {
		    	$err_msg['no_error'] = true;
		    	$err_msg['main_error'] = " Image uploaded successfully"; 
		    }
		    else
		    {
		    	$err_msg['main_error'] = " Something went wrong! Try again later";
		    }
		} else {
		    $err_msg['main_error'] = 'Please choose at least one file';
		}
		echo json_encode($err_msg);
	}

	public function upload_video()
	{
		$err_msg['no_error'] = false;
		if (isset($_FILES['video_user_files']) && !empty($_FILES['video_user_files'])) {
		    $no_files = count($_FILES["video_user_files"]['name']);
		    for ($i = 0; $i < $no_files; $i++) {
		        if ($_FILES["video_user_files"]["error"][$i] > 0) {
		            $err_msg['main_error'] = "Error: " . $_FILES["video_user_files"]["error"][$i] . "<br>";
		        } else {
		            if (file_exists('uploads/video_uploads/' . $_FILES["video_user_files"]["name"][$i])) {
		            	$err_msg['main_error'] = $_FILES["video_user_files"]["name"][$i]. " video already uploaded";  
		            } else {
		                move_uploaded_file($_FILES["video_user_files"]["tmp_name"][$i], 'uploads/video_uploads/' . $_FILES["video_user_files"]["name"][$i]);
		            }
		        }
		    }
		    if($data_videos = $this->adm->upload_videos())
		    {
		    	$err_msg['no_error'] = true;
		    	$err_msg['main_error'] = " Videos uploaded successfully"; 
		    }
		    else
		    {
		    	$err_msg['main_error'] = " Something went wrong! Try again later";
		    }
		} else {
		    $err_msg['main_error'] = 'Please choose at least one file';
		}
		echo json_encode($err_msg);
	}

	public function full_adv_view()
	{
		$full_adv_view = $this->adm->full_adv_view();
		echo json_encode($full_adv_view);
	}

	public function deactive_adv($id)
	{
		$err_msg['no_error'] = false;
		if($test_msg = $this->adm->deactive_adv($id)){
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Disable The Advertize";
		}else {
			$err_msg['main_error'] = "Something went wrong! Try again later";
		}
		echo json_encode($err_msg);
	}

	public function active_adv($id)
	{
		$err_msg['no_error'] = false;
		if($test_msg = $this->adm->active_adv($id)){
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Enable The Advertize";
		}else {
			$err_msg['main_error'] = "Something went wrong! Try again later";
		}
		echo json_encode($err_msg);
	}

	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */