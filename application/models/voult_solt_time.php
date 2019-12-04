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
		$insertArr = [
			`orderID` => $_SESSION['orderID'],
			`amount` => $_SESSION['amount'],
			`productInfo` => $_SESSION['productInfo'],
			`firstname` => $_SESSION['firstname'],
			`emailID` => $_SESSION['email'],
			`mobileNumber` => $_SESSION['mihpayid'],
			`hashCode` => $_SESSION['resphash'],
			`transactionStatus` => $_SESSION['status'],
			`messageData` => $_SESSION['msg'],
			`userID` => $_SESSION['session_data']
		];
		$insertQuery = $this->db->insert('user_payment details',$insertArr);
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

/* End of file voult_solt_time.php */
/* Location: ./application/models/voult_solt_time.php */