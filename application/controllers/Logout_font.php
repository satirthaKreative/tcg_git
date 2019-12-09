<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout_font extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// call models
		$this->load->model('Logout_conditions_model','lcm');
	}

	public function index()
	{

		$this->lcm->logout_model($_SESSION['session_data']);
		session_destroy();
		// $data_array_name = array();
		// $this->load->font_page('frontend/layout/index',$data_array_name);
		redirect("");
	}

}

/* End of file Logout_font.php */
/* Location: ./application/controllers/Logout_font.php */