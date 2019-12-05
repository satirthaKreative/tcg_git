<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_Creation_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Session_Model','sm');
	}

	public function index()
	{
		$errmsg['no_error'] = "data";
		echo  json_encode($errmsg);
	}

}

/* End of file Session_Creation_Controller.php */
/* Location: ./application/controllers/Session_Creation_Controller.php */