<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	
	public function notice_check()
		{

			$where_condition = [
				'active_date' => date('Y-m-d'),
				'provider_id' => $_SESSION['session_data'],
				'status' => 1
			];
			$getQuery = $this->db->where($where_condition)->get('req_to_pro');
			return $getQuery->num_rows();
		}

}

/* End of file Notification_Model.php */
/* Location: ./application/models/Notification_Model.php */