<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voult_time_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Voult_solt_time','vsm');
		
	}

	public function index()
	{
		$result_solt = $this->vsm->fetch_count_data();
		echo json_encode($result_solt);
	}

	public function session_create()
	{
		$errmsg['no_error'] = false;
		if($errmsg['data'] = $this->vsm->session_create())
		{
			$msg_data = $errmsg['data'][0]['time_slot'];
			$msg_data1 = $errmsg['data'][0]['convert_seconds'];
			$msg_data2 = $errmsg['data'][0]['time_slot_price']+$_SESSION['total_price_of_voult_test_new'];
			$msg_data3 = $errmsg['data'][0]['time_slot']." ". $errmsg['data'][0]['time_type'];
			$_SESSION['buy_time_in_sec'] = $msg_data1;
			$_SESSION['buy_time_view'] = $msg_data3;
			$_SESSION['buy_time_slot_price'] = $msg_data2;
			$errmsg['main_error'] = $msg_data." ".$msg_data1;
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}

	public function session_create_paypal()
	{
		$errmsg['no_error'] = false;
		if($errmsg['data'] = $this->vsm->session_create_paypal())
		{
			$msg_data = $errmsg['data'][0]['time_slot'];
			$msg_data1 = $errmsg['data'][0]['convert_seconds'];
			$msg_data2 = $errmsg['data'][0]['time_slot_price']+$_SESSION['total_price_of_voult_test_new'];
			$msg_data3 = $errmsg['data'][0]['time_slot']." ". $errmsg['data'][0]['time_type'];
			$_SESSION['buy_time_in_sec'] = $msg_data1;
			$_SESSION['buy_time_view'] = $msg_data3;
			$_SESSION['buy_time_slot_price'] = $msg_data2;
			$errmsg['main_error'] = $msg_data." ".$msg_data1;
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}
	
	// prevent buy button in voult
	public function prevent_buy_time()
	{	
		$errmsg['no_error'] = false;
		$time_id = $_POST['purchase_time'];
		if($data = $this->vsm->prevent_buy_time($time_id))
		{
			$errmsg['no_error'] = true;
		}
		echo  json_encode($errmsg);
	}

}

/* End of file voult_time_controller.phpp */
/* Location: ./application/controllers/voult_time_controller.phpp */