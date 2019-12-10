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
		$dataValue = $_POST['radioValue'];
		if($data = $this->ptm->notify_request($dataValue))
		{
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}

}

/* End of file ProvidersViewController.php */
/* Location: ./application/controllers/ProvidersViewController.php */