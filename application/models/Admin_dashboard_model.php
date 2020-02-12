<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function checking_data()
	{
		$where_details = [
			'admin_status' => 1,
		];
		$get_admin_data = $this->db->where($where_details)->get('reg_font');
		$count_data_admin = $get_admin_data->num_rows();
		if($count_data_admin > 0)
		{
			return $get_admin_data->result_array();
		}
		else
		{
			return false;
		}
	}

	public function update_admin_details()
	{
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_pass = $this->input->post('user_pass');
		$enc_pass = md5($user_pass);
		$about_des = $this->input->post('about_des');

		$update_data = [
			'user_name' => $user_name,
			'user_email' => $user_email,
			'user_pass' => $user_pass,
			'enc_pass' => $enc_pass,
			'about_des' => $about_des
		];
		$update_query = $this->db->where('admin_status',1)->update('reg_font',$update_data);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function view_users()
	{
		$where_details = [
			'admin_status' => 0,
		]; 
		$tot_users = $this->db->where($where_details)->get('reg_font');
		if($tot_users->num_rows()>0)
		{
			return $tot_users->result();
		}
		else
		{
			return false;
		}
	}

	public function deactive_user($id)
	{
		$updated_action = [
			'approve_status' => 0,
		];
		$action_deactived = $this->db->where('id',$id)->update('reg_font',$updated_action);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function active_user($id)
	{
		$updated_action = [
			'approve_status' => 1,
		];
		$action_deactived = $this->db->where('id',$id)->update('reg_font',$updated_action);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_images()
	{
		foreach($_FILES['image_user_files']['name'] as $row) { // here data is from parameter
		    $data1[] = array(          //Insert Inserted id
		      	'type_iv' 	 => 'i',
		       	'adv_images' => "uploads/img_uploads/".$row // this line is changed
		    );
		}
		$this->db->insert_batch('advertise_image', $data1);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_videos()
	{
		foreach($_FILES['video_user_files']['name'] as $row) { // here data is from parameter
		    $data1[] = array(          //Insert Inserted id
		    	'type_iv'	 => 'v',
		      	'adv_images' => "uploads/video_uploads/".$row // this line is changed
		    );
		}
		$this->db->insert_batch('Advertise_Image', $data1);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function full_adv_view()
	{
		$total_data = $this->db->get('advertise_image');
		if($total_data->num_rows()>0)
		{
			return $total_data->result();
		}
		else
		{
			return false;
		}
	}

	public function deactive_adv($id)
	{
		$updated_action = [
			'image_status' => 0,
		];
		$action_deactived = $this->db->where('id',$id)->update('advertise_image',$updated_action);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function active_adv($id)
	{
		$updated_action = [
			'image_status' => 1,
		];
		$action_deactived = $this->db->where('id',$id)->update('advertise_image',$updated_action);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}

/* End of file Admin_dashboard_model.php */
/* Location: ./application/models/Admin_dashboard_model.php */