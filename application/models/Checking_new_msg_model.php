<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checking_new_msg_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function checking_new_msg_come($new_session_msg)
	{
		$where = '(requester_id="'.$new_session_msg.'" or provider_id = "'.$new_session_msg.'")';
		$checkChat = $this->db->where($where)->order_by('id','DESC')->limit(1)->get('accept_request_tbl');
		if($checkChat->num_rows() > 0){
			$fetchCheckChat = $checkChat->row();
			$get_row_id = $fetchCheckChat->id;

			$selectAllpr = $this->db->where('id',$get_row_id)->get('accept_request_tbl');
			$fetchAllpr = $selectAllpr->row();
			$p_id = $fetchAllpr->requester_id;
			$r_id = $fetchAllpr->provider_id;
			// check chat happen or not
			$where1 = '((s_id="'.$p_id.'" and r_id = "'.$r_id.'") or (s_id="'.$r_id.'" and r_id = "'.$p_id.'"))';
			

			$selectChat = $this->db->where($where1)->where('msg_on',date('Y-m-d'))->order_by('id','desc')->limit(1)->get('chat_bot_tbl');
			$fetchChat = $selectChat->row();

			$_SESSION['last_id_of_chating'] = $fetchChat->id;

			if($_SESSION['last_id_of_chating'] )
			// check chat
		}
	}

}

/* End of file Checking_new_msg_model.php */
/* Location: ./application/models/Checking_new_msg_model.php */