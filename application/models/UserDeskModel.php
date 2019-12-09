<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserDeskModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function activity_of_user($user_active_session)
	{
		$activity_of_user = $this->db->where('id',$user_active_session)->get('reg_font');
		if($activity_of_user->num_rows() > 0)
		{
			return $activity_of_user->result();
		}
		else
		{
			return false;
		}
	}

	public function update_activity($session_data_id,$data_status)
	{
		$update_array = [
			'active_state' => $data_status,
		];
		$activity_of_user = $this->db->where('id',$session_data_id)->update('reg_font',$update_array);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function submit_data($data)
	{
		$insert_array = [
			'platform' => $this->input->post('platform_select'),
			'format' => $this->input->post('format_select'),
			'archetype' => $this->input->post('archetype_select'),
			'timeframe' => $this->input->post('time_frame_select'),
			'communication' => $this->input->post('communication_select'),
			'user_id' => $data,
		];
		$insertQuery = $this->db->insert('requester_tbl',$insert_array);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function submit_data_provider($data)
	{
		$insert_array = [
			'platform' => $this->input->post('platform_select'),
			'format' => $this->input->post('format_select'),
			'archetype' => $this->input->post('archetype_select'),
			'timeframe' => $this->input->post('time_frame_select'),
			'communication' => $this->input->post('communication_select'),
			'user_id' => $data,
		];
		$insertQuery = $this->db->insert('provider_data_tbl',$insert_array);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}

/* End of file UserDeskModel.php */
/* Location: ./application/models/UserDeskModel.php */