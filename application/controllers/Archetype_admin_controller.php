<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archetype_admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Admin_archetype_model','aam');
	}

	public function index()
	{
		$this->load->library('pagination');
		

		$config = [
			'base_url' => base_url('Archetype_admin_controller/'),
			'total_rows' => $this->aam->count_total_rows(),
			'per_page' => 10,
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li class='page-item'>",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li class='page-item'>",
			'prev_tag_close' => "</li>",
			'num_tag_open' => "<li class='page-item'>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
			'cur_tag_close' => "</a></li>",
			'first_link' => 'First',
			'last_link' => 'Last',
			'first_tag_open' => "<li class='page-item'>",
			'first_tag_close' => '</li>',
			'last_tag_open' => "<li class='page-item'>",
			'last_tag_close' => '</li>',
		];
		
		$this->pagination->initialize($config);
		
		$articles = $this->aam->articlelist($config['per_page'],$this->uri->segment(2));
		$this->load->admin_pages('backend/archetype-editor',['article' => $articles]);
	}

	public function arche_how_check(){
		$result_array = $this->aam->arche_how_check();
		echo json_encode($result_array);
	}

	public function arche_name_check(){
		$result_array = $this->aam->arche_name_check();
		echo json_encode($result_array);
	}

	public function popup($data)
	{
		$result_array = $this->aam->popup($data);
		echo json_encode($result_array);
	}

	public function checking_arche_name()
	{
		$data_val = $_POST['dataTA'];
		$result_array = array(
			'pagination_data' => $this->aam->checking_arche_name($data_val)
		);
		echo  json_encode($result_array);
	}

}

/* End of file Archetype_admin_controller.php */
/* Location: ./application/controllers/Archetype_admin_controller.php */