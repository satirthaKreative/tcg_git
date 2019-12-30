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

}

/* End of file MyDeskModel.php */
/* Location: ./application/models/MyDeskModel.php */