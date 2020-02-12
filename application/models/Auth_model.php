<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function add_insert($arrEmp){
		$time_in_sec = 0;
		// product info
		if($_SESSION['buy_time_view'] != '')
		{
			$data_Value = explode(" ",$_SESSION['buy_time_view']);
			if($data_Value[1]=="min")
			{
				$time_in_sec = $data_Value[0]*60;
			}
			else if($data_Value[1]=="hours")
			{
				$time_in_sec = $data_Value[0]*3600;
			}

			$is_id = $this->db->where('user_id',$_SESSION['session_data'])->get('timezone_tbl');

			if($is_id->num_rows() > 0){
				$fetch_id_data = $is_id->row();
				$time_data = $fetch_id_data->total_time;
				$time_in_sec = $time_data+$time_in_sec;

				$insertArr2 = [
					'user_id' => $_SESSION['session_data'],
					'total_time' => $time_in_sec,
				];

				$insertQuery2 = $this->db->where('user_id',$_SESSION['session_data'])->update('timezone_tbl',$insertArr2);
			}
			else
			{
				$insertArr2 = [
					'user_id' => $_SESSION['session_data'],
					'total_time' => $time_in_sec,
				];
				
				$insertQuery2 = $this->db->insert('timezone_tbl',$insertArr2);
			}
		}
		// User Payment Insert Query
		$db_insert = $this->db->insert('user_payment_details',$arrEmp);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Auth_Model.php */
/* Location: ./application/models/Auth_Model.php */