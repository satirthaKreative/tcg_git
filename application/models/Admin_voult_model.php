<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_voult_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function add_total_voult_time($in_hour,$in_min,$in_sec)
	{

		$data_insert = [
			'voult_total_time' => $in_hour,
			'time_in_second'   => $in_sec,
			'time_in_minute'   => $in_min,
		];
		$insert_voult_time1 = $this->db->insert('voult_duplicate',$data_insert);
		$insert_voult_time = $this->db->insert('voult',$data_insert);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_total_voult_time($in_hour,$in_min,$in_sec)
	{

		$data_insert = [
			'voult_total_time' => $in_hour,
			'time_in_second'   => $in_sec,
			'time_in_minute'   => $in_min,
		];
		$insert_voult_time1 = $this->db->update('voult_duplicate',$data_insert);
		$insert_voult_time = $this->db->update('voult',$data_insert);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function check_total_time_in_voult()
	{
		$insert_voult_time = $this->db->get('voult');
		if($insert_voult_time->num_rows() > 0)
		{
			return $insert_voult_time->num_rows();
		}
		else
		{
			return $insert_voult_time->num_rows();
		}
	}
	
	public function add_slot_time_price()
	{ 
		$i = 0;
		
		foreach($_POST['time_slot'] as $key=>$fname) 
		{
			if($_POST['time_type'][$key] == 'hours')
			{
				$data = 3600*$_POST['time_slot'][$key];
			}
			else if($_POST['time_type'][$key] == 'min')
			{
				$data = 60*$_POST['time_slot'][$key];
			}
		    $form_data[] = array(
		        'time_slot' => $_POST['time_slot'][$key],
		        'time_type' => $_POST['time_type'][$key],
		        'convert_seconds' => $data,
		        'time_slot_price' => $_POST['time_slot_price'][$key],
		    );
		}

		$insert_slot_time = $this->db->insert_batch('voult_time_slot',$form_data);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// full slot view

	public function full_slot_view()
	{
		$result_view = $this->db->get('voult_time_slot');
		if($result_view->num_rows())
		{
			return $result_view->result();
		}
		else
		{
			return false;
		}
	}

	// single data voult edit show

	public function edit_voult_details($data_store)
	{
		$show_result = $this->db->where('id',$data_store)->get('voult_time_slot');
		if($show_result->num_rows() > 0)
		{
			return $show_result->result();
		}
		else
		{
			return false;
		}
	}

	// update the voult details

	public function update_save_details($data)
	{
		// data inputs
		$time_slot = $this->input->post('time_slot_modal');
		$time_type = $this->input->post('time_type_model');
		$time_slot_price = $this->input->post('time_slot_price_modal');
		// update data's
			if($time_type == 'hours')
			{
				$data1 = 3600*$time_slot;
			}
			else if($time_type == 'min')
			{
				$data1 = 60*$time_slot;
			}
		$update_data = [
			'time_slot' => $time_slot,
			'time_type' => $time_type,
			'convert_seconds' => $data1,
			'time_slot_price' => $time_slot_price,
		];

		$dataQuery = $this->db->where('id',$data)->update('voult_time_slot',$update_data);
		if($this->db->affected_rows())
		{
			return true;
		}
		else{
			return false;
		}

	}

}

/* End of file Admin_volt_model.php */
/* Location: ./application/models/Admin_volt_model.php */