<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyDesk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyDeskModel','mdm');
		$this->load->model('My_Archetype_View','mav');
	}

	public function index()
	{
		$data_arr = array();
		$this->load->font_page('frontend/layout/my-desk',$data_arr);
	}

	public function show_platform()
	{
		$result_set = $this->mdm->show_platform();
		echo json_encode($result_set);
	}

	public function show_format()
	{
		$result_set = $this->mdm->show_format();
		echo  json_encode($result_set);
	}

	public function show_time_frame()
	{
		$result_set = $this->mdm->show_time_frame();
		echo  json_encode($result_set);
	}

	public function my_archetype_view()
	{
		//$data_view['share'] = 'data';
		$data_view = $this->mav->my_archetype_view();
		echo  json_encode($data_view);
	}

	public function communication_tbl()
	{
		$data_view = $this->mdm->communication_tbl();
		echo json_encode($data_view);
	}

	public function data_time_frame()
	{
		$data_view = $this->mdm->data_time_frame();
		echo  json_encode($data_view);
	}

	public function my_format_change()
	{
		$data_id = $_POST['data_id'];
		$data = $this->mdm->my_format_change($data_id);
		echo json_encode($data);
	}

}

/* End of file MyDesk.php */
/* Location: ./application/controllers/MyDesk.php */