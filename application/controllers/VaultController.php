<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VaultController extends CI_Controller {

	public function index()
	{
		$arr = array();
		$this->load->font_page('frontend/layout/vault',$arr);
	}

}

/* End of file VaultController.php */
/* Location: ./application/controllers/VaultController.php */