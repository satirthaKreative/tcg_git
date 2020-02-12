<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Account extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Time_calculation_model','tcm');
	}

	public function index()
	{
	    $total_time_in_voult = $this->tcm->fetch_parcentage_time();
		$_SESSION['voult_percentage_show'] = round($total_time_in_voult,2);
		$arr = array();
		$this->load->font_page('frontend/layout/my-profile',$arr);
	}

}

/* End of file My_Account.php */
/* Location: ./application/controllers/My_Account.php */