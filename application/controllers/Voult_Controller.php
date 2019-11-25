<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voult_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_voult_model','avm');
	}

	public function index()
	{
		$data_arr = array();
		$this->load->admin_pages('backend/add_vault',$data_arr);
	}

	// add total voult time
	public function add_total_voult_time()
	{
		$err_msg['no_error'] = false;
		// data total value
		$in_hour = $_POST['tot_voult_time'];
		$in_sec = $_POST['in_sec'];
		$in_min = $_POST['in_min'];
		$err_msg['all_val'] = $in_hour." ".$in_min." ".$in_sec;
		// check conditions
		if($total_time_count = $this->avm->add_total_voult_time($in_hour,$in_min,$in_sec))
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = 'Added Successfully';
		}
		else
		{
			$err_msg['main_error'] = 'Something went wrong! Try again later';
		}
		echo json_encode($err_msg);
	}

	// add total voult time
	public function update_total_voult_time()
	{
		$err_msg['no_error'] = false;
		// data total value
		$in_hour = $_POST['tot_voult_time'];
		$in_sec = $_POST['in_sec'];
		$in_min = $_POST['in_min'];
		$err_msg['all_val'] = $in_hour." ".$in_min." ".$in_sec;
		// check conditions
		if($total_time_count = $this->avm->update_total_voult_time($in_hour,$in_min,$in_sec))
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = 'Added Successfully';
		}
		else
		{
			$err_msg['main_error'] = 'Something went wrong! Try again later';
		}
		echo json_encode($err_msg);
	}

	// check voult total time added or not

	public function check_voult_total_time()
	{
		$total_view['total_count_res_time'] = $this->avm->check_total_time_in_voult();
		echo json_encode($total_view);
	}

	// addition of slot time & Price

	public function add_slot_time_price()
	{
		$err_msg['no_error'] = false;
		if($total_addition = $this->avm->add_slot_time_price())
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Insert Data";
		}
		else
		{
			$err_msg['main_error'] = "Something Went Wrong! Try Again Later";
		}
		echo  json_encode($err_msg);
	}

	// view voult

	public function view_voult()
	{
		$data = array();
		$this->load->admin_pages('backend/view_voult',$data);
	} 

	// view full voult time slot data

	public function full_slot_view()
	{
		$data = $this->avm->full_slot_view();
		echo json_encode($data);
	}

	// edit voult details

	public function edit_voult_details($data_store)
	{
		$return_voult_single = $this->avm->edit_voult_details($data_store);
		echo json_encode($return_voult_single);
	}

	// update voult details

	public function update_save_details($data)
	{
		$err_msg['no_error'] = false;

		if($data_insert = $this->avm->update_save_details($data))
		{
			$err_msg['no_error'] = true;
			$err_msg['main_error'] = "Successfully Updated Details On Voult";
		}
		echo json_encode($err_msg);

	}

}

/* End of file Voult_Controller.php */
/* Location: ./application/controllers/Voult_Controller.php */