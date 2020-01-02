<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deck_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Deck_editor_model','dem');
	}

	public function index()
	{
		$data = array();
		$this->load->font_page('frontend/layout/deck-editor', $data);
	}

	public function deck_editor()
	{
		$result_set = $this->dem->deck_editor();
		echo json_encode($result_set);
	}

	public function search_data($search_data)
	{
		$result_set1 = $this->dem->search_data($search_data);
		echo json_encode($result_set1);
	}

	public function search_data_q($data_value){
		$result_set = $this->dem->search_data_q($data_value);
		echo json_encode($result_set);
	}
	
}	
/* End of file Deck_Controller.php */
/* Location: ./application/controllers/Deck_Controller.php */