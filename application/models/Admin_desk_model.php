<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_desk_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	//  add platform

	public function add_platform()
	{
		foreach($_POST['platform_name'] as $platform=>$key)
		{
			$data_platform[] = array(
				'platform_name' => $_POST['platform_name'][$platform],
			);
		}

		$insert_platforms = $this->db->insert_batch('platform_tbl',$data_platform);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//  add format

	public function add_format()
	{
		foreach($_POST['format_name'] as $platform=>$key)
		{
			$data_platform[] = array(
				'format_name' => $_POST['format_name'][$platform],
			);
		}

		$insert_platforms = $this->db->insert_batch('format_tbl',$data_platform);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// add communication

	public function add_communication()
	{
		foreach($_POST['communication_name'] as $platform=>$key)
		{
			$data_platform[] = array(
				'communication_name' => $_POST['communication_name'][$platform],
			);
		}

		$insert_platforms = $this->db->insert_batch('communication_tbl',$data_platform);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// view platform tbl

	public function view_platform_tbl()
	{
		$result_set = $this->db->get('platform_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// Show Single platform Table

	public function show_platform_details($data_id)
	{
		$result_set = $this->db->where('id',$data_id)->get('platform_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// update the platform details 

	public function update_platform_details($plat_id)
	{
		$update_set = [
			'platform_name' => $this->input->post('platform_name'),
		];
		$result_set = $this->db->where('id',$plat_id)->update('platform_tbl',$update_set);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// view Format tbl

	public function view_format_tbl()
	{
		$result_set = $this->db->get('format_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// Show Single Format Table

	public function show_format_details($data_id)
	{
		$result_set = $this->db->where('id',$data_id)->get('format_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// update the platform details 

	public function update_format_details($plat_id)
	{
		$update_set = [
			'format_name' => $this->input->post('format_name'),
		];
		$result_set = $this->db->where('id',$plat_id)->update('format_tbl',$update_set);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// view communication tbl

	public function view_communication_tbl()
	{
		$result_set = $this->db->get('communication_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// Show Single communication Table

	public function show_communication_details($data_id)
	{
		$result_set = $this->db->where('id',$data_id)->get('communication_tbl');
		if($result_set->num_rows() > 0 )
		{
			return $result_set->result();
		}
		else
		{
			return false;
		}
	}

	// update the communication details 

	public function update_communication_details($plat_id)
	{
		$update_set = [
			'communication_name' => $this->input->post('communication_name'),
		];
		$result_set = $this->db->where('id',$plat_id)->update('communication_tbl',$update_set);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Delete Platform details

	public function delete_platform($del_id)
	{
		$where_condition = [
			'id' => $del_id
		];

		$this->db->where($where_condition)->delete('platform_tbl');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Delete format details

	public function delete_format($del_id)
	{
		$where_condition = [
			'id' => $del_id
		];

		$this->db->where($where_condition)->delete('format_tbl');
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

/* End of file Admin_desk_model.php */
/* Location: ./application/models/Admin_desk_model.php */