<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Account extends CI_Controller {

	public function index()
	{
		$arr = array();
		$this->load->font_page('frontend/layout/my-profile',$arr);
	}

}

/* End of file My_Account.php */
/* Location: ./application/controllers/My_Account.php */