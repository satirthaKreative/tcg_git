<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_desk_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_desk_model','adm');
	}

	public function index()
	{
		$data_arr = array();
		$this->load->admin_pages('backend/desk_editor',$data_arr);
	}

	// Add Platform 

	public function add_platform()
	{
		$err_msg['no_error'] = false;
		if($data_insert = $this->adm->add_platform())
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Added Platforms";
		}
		else
		{
			$err_msg['main_error'] = "Something Went Wrong ! Try Again Later";
		}
		echo  json_encode($err_msg);
	}

	// Add Format

	public function add_format()
	{
		$err_msg['no_error'] = false;
		if($data_insert = $this->adm->add_format())
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Added Format";
		}
		else
		{
			$err_msg['main_error'] = "Something Went Wrong ! Try Again Later";
		}
		echo  json_encode($err_msg);
	}

	// Add Communication

	public function add_communication()
	{
		$err_msg['no_error'] = false;
		if($data_insert = $this->adm->add_communication())
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Added Format";
		}
		else
		{
			$err_msg['main_error'] = "Something Went Wrong ! Try Again Later";
		}
		echo  json_encode($err_msg);
	}

	// view platform

	public function view_platform()
	{
		$data_arr = array();
		$this->load->admin_pages("backend/view_platform",$data_arr);
	}

	// view format

	public function view_format()
	{
		$data_arr = array();
		$this->load->admin_pages("backend/view_format",$data_arr);
	}

	// view communication

	public function view_communication()
	{
		$data_arr = array();
		$this->load->admin_pages("backend/view_communication",$data_arr);
	}

	// view platform tbl

	public function view_platform_tbl()
	{
		$result_set = $this->adm->view_platform_tbl();
		// $result_set['data'] = false;
		echo json_encode($result_set);
	}

	// show platform tbl

	public function show_platform_details($data_id)
	{
		$result_set = $this->adm->show_platform_details($data_id);
		echo json_encode($result_set);
	}

	// update platform tbl

	public function update_platform_details($plat_id)
	{
		$error_msg['no_error'] = false;
		if($result_set = $this->adm->update_platform_details($plat_id))
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Successfully Update The Data";
		}
		echo json_encode($error_msg);
	}

	// view format tbl

	public function view_format_tbl()
	{
		$result_set = $this->adm->view_format_tbl();
		echo json_encode($result_set);
	}

	// show platform tbl

	public function show_format_details($data_id)
	{
		$result_set = $this->adm->show_format_details($data_id);
		echo json_encode($result_set);
	}

	// update format tbl

	public function update_format_details($plat_id)
	{
		$error_msg['no_error'] = false;
		if($result_set = $this->adm->update_format_details($plat_id))
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Successfully Update The Data";
		}
		echo json_encode($error_msg);
	}

	// view format tbl

	public function view_communication_tbl()
	{
		$result_set = $this->adm->view_communication_tbl();
		echo json_encode($result_set);
	}

	// show platform tbl

	public function show_communication_details($data_id)
	{
		$result_set = $this->adm->show_communication_details($data_id);
		echo json_encode($result_set);
	}

	// update format tbl

	public function update_communication_details($plat_id)
	{
		$error_msg['no_error'] = false;
		if($result_set = $this->adm->update_communication_details($plat_id))
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Successfully Update The Data";
		}
		echo json_encode($error_msg);
	}

	// delete platform 

	public function delete_platform()
	{
		$error_msg['no_error'] = false;
		$del_id = $_POST['data_val'];
		if($result_set = $this->adm->delete_platform($del_id))
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Delete Successfully";
		}
		echo json_encode($error_msg);
	}

	// delete format

	public function delete_format()
	{
		$error_msg['no_error'] = false;
		$del_id = $_POST['data_val'];
		if($result_set = $this->adm->delete_format($del_id))
		{
			$error_msg['no_error'] = true;
			$error_msg['main_error'] = "Delete Successfully";
		}
		echo json_encode($error_msg);
	}

}

/* End of file Admin_desk_controller.php */
/* Location: ./application/controllers/Admin_desk_controller.php */