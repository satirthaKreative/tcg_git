<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archetype_filter_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function add_archetype_filter()
	{
		foreach($_POST['filter_name'] as $archetype_filter => $key)
		{
			$data_insert[] = array(
				'f_id' => $_POST['format_name1'][$archetype_filter],
				'archetype_filter' => $_POST['filter_name'][$archetype_filter],
			);
		}
		$this->db->insert_batch('archetype_category',$data_insert);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function view_archetype_filter()
	{
		$data_result = $this->db->get('archetype_category');
		if($data_result->num_rows() > 0)
		{
			return $data_result->result();
		}
		else
		{
			return false;
		}
	}
	public function view_archetype_filter55()
	{
		$data_result = $this->db->select('*')->from('archetype_name')->join('archetype_category','archetype_name.a_id = archetype_category.id')->get();
		if($data_result->num_rows() > 0)
		{
			return $data_result->result();
		}
		else
		{
			return false;
		}
	}

	public function add_archetype_filter1()
	{

		foreach($_POST['filter_name1'] as $archetype_filter => $key)
		{
			$data_insert[] = array(
				'a_id' => $_POST['filter_name1'][$archetype_filter],
				'archetype_name' => $_POST['archetype_name1'][$archetype_filter],
			);
		}
		$this->db->insert_batch('archetype_name',$data_insert);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function view_archetype_format()
	{
		$selectQuery = $this->db->get('format_tbl');
		if($selectQuery->num_rows() > 0)
		{
			return $selectQuery->result();
		}
		else
		{
			return false;
		}
	}

}

/* End of file Archetype_filter_model.php */
/* Location: ./application/models/Archetype_filter_model.php */