<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyDeskModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function show_platform()
	{
		$result_set = $this->db->get('platform_tbl');
		if($result_set->num_rows() > 0)
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	public function show_format()
	{
		$result_set = $this->db->get('format_tbl');
		if($result_set->num_rows() > 0)
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	public function communication_tbl()
	{
		$result_set = $this->db->get('communication_tbl');
		if($result_set->num_rows() > 0)
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}
	// time slot backend call
	public function data_time_frame()
	{
		$result_set = $this->db->from('voult_time_slot')
								->order_by("convert_seconds", "asc")
								->get();
		if($result_set->num_rows() > 0)
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// Desk Model

	public function my_format_change($data_id)
	{
		if($data_id != ''){
			$result_set = $this->db->select('*')
     				->from('archetype_category as t1')
     				->join('archetype_name as t2', 't1.id = t2.a_id', 'INNER')
     				->where('t1.f_id',$data_id)
     				->get();
		}
		else
		{
			$result_set = $this->db->select('*')
     				->from('archetype_category as t1')
     				->join('archetype_name as t2', 't1.id = t2.a_id', 'INNER')
     				->get();

		}

		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// modal show data

	function modelDetailsShow($data_id)
	{
		$resultSet = $this->db->where('id',$data_id)->get('archetype_name');
		if($resultSet->num_rows() > 0)
		{
			return $resultSet->result();
		}
		else
		{
			return false;
		}
	}
	
	// insert data

	public function insertProviderDetails($data,$data2,$data3)
	{
		
		
		foreach($data as $platform_data){
			foreach($data2 as $archetype_data){
				$where_arr = [
					'platform' => $platform_data,
					'format' => $data3, 
					'archetype' => $archetype_data,
					'cur_time' => date('Y-m-d'),
					'user_id' => $_SESSION['session_data'],
				];

				$check_exit_or_not = [
					'platform' => $platform_data,
					'format' => $data3, 
					'archetype' => $archetype_data,
					'user_id' => $_SESSION['session_data'],
				];
				$check_query = $this->db->where($check_exit_or_not)->get('provider_data_tbl');
				if($check_query->num_rows() > 0)
				{

				}
				else
				{
					$resultSet = $this->db->insert('provider_data_tbl',$where_arr);
				}
			}
		}

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

/* End of file MyDeskModel.php */
/* Location: ./application/models/MyDeskModel.php */