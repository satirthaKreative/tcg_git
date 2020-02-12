<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archetype_filter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Archetype_filter_model','afm');
	}

	public function index()
	{
		$data = array();
		$this->load->admin_pages('backend/archetype-filter',$data);
	}

	public function add_archetype_filter()
	{
		$error_msg['no_error'] = false;
		if($result_set = $this->afm->add_archetype_filter())
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Successfully Added ";
		}
		else
		{
			$error_msg['main_error'] = "Something Went Wrong ! Try Again Later";
		}
		echo json_encode($error_msg);
	}

	public function view_archetype()
	{
		$arr = array();
		$this->load->admin_pages('backend/view-archetype',$arr);
	}

	public function view_archetype_filter()
	{
		$error_msg = $this->afm->view_archetype_filter();
		echo json_encode($error_msg);
	}

	public function view_archetype_filter55()
	{
		$error_msg = $this->afm->view_archetype_filter55();
		echo json_encode($error_msg);
	}

	public function add_archetype_filter1()
	{
		$error_msg['no_error'] = false;
		if($result_set = $this->afm->add_archetype_filter1())
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Successfully Added";
		}
		else
		{
			$error_msg['main_error'] = "Something Went Wrong ! Try Again Later";
		}
		echo json_encode($error_msg);
	}

	public function view_archetype_format()
	{
		$result = $this->afm->view_archetype_format();
		echo json_encode($result);
	}

}

/* End of file Archetype_filter.php */
/* Location: ./application/controllers/Archetype_filter.php */