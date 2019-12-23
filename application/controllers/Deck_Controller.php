<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deck_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array();
		$this->load->font_page('frontend/layout/deck-editor', $data);
	}
	
}	
/* End of file Deck_Controller.php */
/* Location: ./application/controllers/Deck_Controller.php */