<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_count_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Dashboard_count_model','dcm');
	}
	public function index()
	{
		$dataset = $this->dcm->dashboard_count_data();
		echo json_encode($dataset);
	}

}

/* End of file Dashboard_count_controller.php */
/* Location: ./application/controllers/Dashboard_count_controller.php */