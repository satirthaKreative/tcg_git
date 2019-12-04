<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayUMoney_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Voult_solt_time','vst');
	}
	public function index()
	{
		$this->load->view('frontend/payment/payumoney/index');
	}

	public function response()
	{
		$this->load->view('frontend/payment/payumoney/response');
	}

	public function success()
	{
		$errmsg['no_error'] = false;
		// if($dataInsert = $this->vst->pay_success())
		// {
		// 	$errmsg['no_error'] = true;
		// }
		echo json_encode($errmsg);
	}

}

/* End of file PayUMoney_Controller.php */
/* Location: ./application/controllers/PayUMoney_Controller.php */