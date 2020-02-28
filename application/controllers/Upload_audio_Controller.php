<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_audio_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function audio_file_upload()
	{

		$size = $_FILES['audio_data']['size']; //the size in bytes
		$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
		$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea

		//move the file from temp name to local folder using $output name
		move_uploaded_file($input, "uploads/audio_save/".$output);
	}

}

/* End of file Upload_audio_Controller.php */
/* Location: ./application/controllers/Upload_audio_Controller.php */