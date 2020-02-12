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
			'cur_time' => date('Y-m-d'),
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
			'cur_time' => date('Y-m-d'),
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

	public function check_time_available($data_u)
	{
		$is_check_time = $this->db->where('user_id',$_SESSION['session_data'])->get('timezone_tbl');
		if($is_check_time->num_rows() > 0)
		{
			$is_total_time = $is_check_time->row();
			$store_time = $is_total_time->total_time;
			$request_time_id = $_POST['time_frame_select'];
			// select voult time
			$select_time = $this->db->where('id',$request_time_id)->get('voult_time_slot');
			$fetch_time = $select_time->row();
			$request_time = $fetch_time->convert_seconds;


			if($request_time<=$store_time)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function check_user_available_time()
	{
		//sum time
		$sum_time = 100;
		// current user id
		$current_user_id = $_SESSION['session_data'];
		$select_time = $this->db->where('user_id',$current_user_id)->get('timezone_tbl');
		if($select_time->num_rows() > 0)
		{
			$fetch_time = $select_time->row();
			// voult store time for indivisual user
			$single_voult_time = $fetch_time->total_time;
			// actual time range limit
			$actual_range_limit = 5*3600;

			if($single_voult_time >= $actual_range_limit)
			{
				$sum_time = 100;
				return $sum_time;
			}
			else
			{
				$sum_time = ((100*$single_voult_time)/$actual_range_limit);
				return $sum_time;
			}
		}
		else
		{
			$sum_time = 0;
			return $sum_time;
		}
	}


}

/* End of file UserDeskModel.php */
/* Location: ./application/models/UserDeskModel.php */