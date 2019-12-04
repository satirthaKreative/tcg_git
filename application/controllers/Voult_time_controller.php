<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voult_time_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('voult_solt_time','vsm');
	}

	public function index()
	{
		$result_solt = $this->vsm->fetch_count_data();
		echo json_encode($result_solt);
	}

}

/* End of file voult_time_controller.phpp */
/* Location: ./application/controllers/voult_time_controller.phpp */