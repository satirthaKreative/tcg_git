<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voult_solt_time extends CI_Model {

	public function fetch_count_data()
	{
		$selectQuery = $this->db->order_by('convert_seconds','ASC')->get('voult_time_slot');
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

/* End of file voult_solt_time.php */
/* Location: ./application/models/voult_solt_time.php */