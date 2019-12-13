<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvidersViewController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('ProvidersTblModel','ptm');
	}

	public function index()
	{
		$arr = array();
		$this->load->font_page('frontend/layout/provider-tbl',$arr);		
	}

	// fetch providers using

	public function sender_details()
	{
		$data = $this->ptm->sender_details();
		echo json_encode($data);
	}

	// fetch notification 

	public function provider_notification()
	{
		$data = $this->ptm->provider_notification();
		echo json_encode($data);
	}

	// request creation

	public function notify_request()
	{
		$errmsg['no_error'] = false;
		$errmsg['main_msg'] = "Something went wrong! Try again later";
		$dataValue = $_POST['radioValue'];
		if($data = $this->ptm->notify_request($dataValue))
		{
			$errmsg['no_error'] = true;
			$errmsg['main_msg'] = "Successfully request send to the provider";
		}
		echo json_encode($errmsg);
	}

	// provider and requester accept option

	public function accept_requester()
	{
		$request_id = $_POST['data'];
		if($accept_data = $this->ptm->accept_requester($request_id))
		{
			$errmsg['request_time'] = $accept_data;
		}
		echo  json_encode($errmsg);
	}

	// time convert 

	public function return_time_format()
	{
		$val1 = $_POST['val2']; $change_date = gmdate('H:i:s',$val1); echo json_encode($change_date); 
	}

	// stop watch calculation 

	public function request_stopwatch()
	{
		$data_time['no_error'] = false;
		if($data_time['query_time'] = $this->ptm->request_stopwatch())
		{
			$data_time['no_error'] = true;
		}
		echo json_encode($data_time);
	}

	// checking stop watch
	public function check_request_stopwatch()
	{
		$data_time['no_error'] = false;
		if($data_time1 = $this->ptm->check_request_stopwatch())
		{
			$data_time['no_error'] = true;
		}
		echo json_encode($data_time);
	}

}

/* End of file ProvidersViewController.php */
/* Location: ./application/controllers/ProvidersViewController.php */