<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked_controller extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Blocked_model','bm');
	}

	public function index()
	{
		
	}

	public function check_total_providers($block_gl_data)
	{
		$result_data = array(
			'total_providers_list' => $this->bm->check_total_providers($block_gl_data)
		);
		echo json_encode($result_data);
	}

	public function check_blocked_data()
	{
		$result_data = $this->bm->check_blocked_data();
		echo json_encode($result_data);
	}

	# block active 

	public function block_active()
	{
		$block_id = $_POST['block_id'];
		$blocked_by = $_POST['blocked_by'];

		#checking data in tbl or not
		if($checking_query['no_error'] = $this->bm->block_active($block_id,$blocked_by))
		{
			$errmsg['no_error'] = true;
		}
		else
		{
			$errmsg['no_error'] = false;
		}

		echo json_encode($errmsg);

	}

	# block de-active 

	public function block_deactive()
	{
		$block_id = $_POST['block_id'];
		$blocked_by = $_POST['blocked_by'];

		#checking data in tbl or not
		if($checking_query['no_error'] = $this->bm->block_deactive($block_id,$blocked_by))
		{
			$errmsg['no_error'] = true;
		}
		else
		{
			$errmsg['no_error'] = false;
		}

		echo json_encode($errmsg);

	}

}

/* End of file blocked_controller.php */
/* Location: ./application/controllers/blocked_controller.php */