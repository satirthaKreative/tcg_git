<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Notification_Model','nm');
	}
	public function check_notice()
	{
		#data call model
		$result = $this->nm->notice_check();
		echo  json_encode($result);
	}

}

/* End of file Notification_Controller.php */
/* Location: ./application/controllers/Notification_Controller.php */