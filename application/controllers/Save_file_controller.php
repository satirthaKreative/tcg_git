<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save_file_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Save_file_model','sfm');
		$this->load->helper('file');
	}
	public function index()
	{
		$getData = $this->sfm->getDatas();
		echo json_encode($getData);
	}
	public function save_file_chat()
	{
		$user1 = $_POST['id1'];
		$user2 = $_POST['id2'];
		$arche = $_POST['a_id'];

		if($arche == 0)
		{
			if($getData = $this->sfm->save_file_chat($user1, $user2, $arche)){
				$fn = "csv_".uniqid().".txt";
				$file = fopen("uploads/chat_save/".$fn,"w");
				$path = "uploads/chat_save/".$fn;
				foreach($getData as $val_data)
				{
					$mg = $val_data->msg;
				    $data_array = array($mg);
				    fputcsv($file,$data_array);
				}
				fclose($file);

				$this->load->helper('download');
				$path = file_get_contents(base_url('uploads/chat_save/').$fn); // get file name
				$name = "sample_file1.txt"; // new name for your file
				force_download($name, $path);
				       
				
			}else{
				echo "error";
			}
		}
		
		else
		{
			if($getData = $this->sfm->save_file_chat($user1, $user2, $arche)){
				$this->load->helper('download');
				foreach($getData as $val_data)
				{
					$path = file_get_contents(base_url('uploads/audio_save/').$val_data->msg); // get file name
					$name = "sample_file1.wav"; // new name for your file
					force_download($name, $path); 
				}
			}else{
				echo "error";
			}
		}


		
	}

}

/* End of file Save_file_controller.php */
/* Location: ./application/controllers/Save_file_controller.php */