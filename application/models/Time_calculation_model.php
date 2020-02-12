<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time_calculation_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

public function total_time_left()
{
	$selectQuery = $this->db->get('voult');
	$fetchQuery = $selectQuery->row();
	$data_total_time = $fetchQuery->time_in_second;

	$remain_time_in_seconds = $data_total_time-$_SESSION['buy_time_in_sec'];
	$remain_time_in_hours = $remain_time_in_seconds/3600;
	$remain_time_in_mins = $remain_time_in_seconds/60;
	$up_condition = [
		'time_in_second' => $remain_time_in_seconds,
		'voult_total_time' => $remain_time_in_hours,
		'time_in_minute' => $remain_time_in_mins
	];
	$update_time = $this->db->update('voult',$up_condition);
	if($this->db->affected_rows() > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


public function fetch_parcentage_time()
{
	$selectTotalTime = $this->db->get('voult_duplicate');
	$selectData = $selectTotalTime->row();
	$fetch_time_actual = $selectData->voult_total_time; 

	$selectTotalTime1 = $this->db->get('voult');
	$selectData1 = $selectTotalTime1->row();
	$fetch_time_actual1 = $selectData1->voult_total_time; 

	if($fetch_time_actual == $fetch_time_actual1)
	{
		$data = 100;
		return $data;
	}
	else
	{
		$data = ((100*$fetch_time_actual1)/$fetch_time_actual);
		return $data;
	}

}	

}

/* End of file Time_calculation_model.php */
/* Location: ./application/models/Time_calculation_model.php */