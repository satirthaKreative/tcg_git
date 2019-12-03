<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvidersViewController extends CI_Controller {

	public function index()
	{
		$arr = array();
		$this->load->font_page('frontend/layout/provider-tbl',$arr);		
	}

}

/* End of file ProvidersViewController.php */
/* Location: ./application/controllers/ProvidersViewController.php */