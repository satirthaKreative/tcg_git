<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayUMoney_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		$this->load->view('frontend/payment/payumoney/index');
	}

	public function response()
	{
		$this->load->view('frontend/payment/payumoney/response');
	}

}

/* End of file PayUMoney_Controller.php */
/* Location: ./application/controllers/PayUMoney_Controller.php */