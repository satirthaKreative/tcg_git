<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout_font extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->session->unset_userdata('session_id');
		$data_array_name = array();
		$this->load->font_page('frontend/layout/index',$data_array_name);
	}

}

/* End of file Logout_font.php */
/* Location: ./application/controllers/Logout_font.php */