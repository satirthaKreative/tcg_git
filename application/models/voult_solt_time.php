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

	public function pay_success()
	{
		$time_in_sec = 0;

		$insertArr = [
			'orderID' => $_SESSION['orderID'],
			'amount' => $_SESSION['amount'],
			'productInfo' => $_SESSION['productInfo'],
			'firstname' => $_SESSION['firstname'],
			'emailID' => $_SESSION['email'],
			'mobileNumber' => $_SESSION['mihpayid'],
			'hashCode' => $_SESSION['resphash'],
			'transactionStatus' => $_SESSION['status'],
			'messageData' => $_SESSION['msg'],
			'userID' => $_SESSION['session_data']
		];

		if($_SESSION['productInfo'] != '')
		{
			$data_Value = explode(" ",$_SESSION['productInfo']);
			// print_r($data_Value);
			// exit();
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

		

		

		$insertQuery = $this->db->insert('user_payment_details',$insertArr);

		$data = $insertQuery;
		if($this->db->affected_rows() > 0)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}

	public function session_create()
	{
		$data_id = $_POST['parchase_time'];
		$conditional_arr = [
			'id' => $data_id,
		];
		$selectQuery = $this->db->where($conditional_arr)->get('voult_time_slot');
		if($selectQuery->num_rows() > 0)
		{
			return $selectQuery->result_array();
		}
		else
		{
			return false;
		}
	}	

}

/* End of file voult_solt_time.php */
/* Location: ./application/models/voult_solt_time.php */