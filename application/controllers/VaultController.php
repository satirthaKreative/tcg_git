<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VaultController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Time_calculation_model','tcm');
	}
	public function index()
	{
		$total_time_in_voult = $this->tcm->fetch_parcentage_time();
		$_SESSION['voult_percentage_show'] = round($total_time_in_voult);
		$arr = array();
		if(isset($_SESSION['status']) && $_SESSION['status'] == 'success')
		{
			if($total_voult_time_left = $this->tcm->total_time_left())
			{
				$this->load->font_page('frontend/layout/vault',$arr);
				unset($_SESSION['status']);
			}
			else
			{
				$this->load->font_page('frontend/layout/vault',$arr);
				unset($_SESSION['status']);
			}

		}
		else
		{
			$this->load->font_page('frontend/layout/vault',$arr);
		}
		
	}

}

/* End of file VaultController.php */
/* Location: ./application/controllers/VaultController.php */