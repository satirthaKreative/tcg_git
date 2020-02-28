<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('ChatModel','cm');
	}
	public function index()
	{
		
	}
	public function chatcheck()
	{
		$select_data = $this->cm->chatcheck();
		echo  json_encode($select_data);
	}
	public function insert_chat_data($msg_data)
	{
		$errmsg['no_error'] = false;
		if($data = $this->cm->insertChat($msg_data))
		{
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}
	public function insertChatVideo()
	{
		$errmsg['no_error'] = false;
		$msg_data = $_POST['data'];
		if($data = $this->cm->insertChatVideo($msg_data))
		{
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}
	public function audio_insert($data)
	{
		$errmsg['no_error'] = false;
		if($data = $this->cm->audio_insert($data))
		{
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}

	public function account_settings()
	{
		$data_insert = $this->cm->account_settings();
		echo json_encode($data_insert);
	}

	public function edit_user_profile()
	{
		$errmsg['no_error'] = false;
		if($data = $this->cm->edit_user_profile())
		{
			$errmsg['no_error'] = true;
		}
		echo json_encode($errmsg);
	}

}

/* End of file ChatController.php */
/* Location: ./application/controllers/ChatController.php */