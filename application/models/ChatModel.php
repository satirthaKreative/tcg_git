<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatModel extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

public function chatcheck()
{
	 $where = '(requester_id="'.$_SESSION['session_data'].'" or provider_id = "'.$_SESSION['session_data'].'")';
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
	 	

	 	$selectChat = $this->db->where($where1)->where('msg_on',date('Y-m-d'))->get('chat_bot_tbl');
	 	$fetchChat = $selectChat->result();
	 	return $fetchChat;
	 	// check chat
	 }
}

public function insertChat($msg_data)
{
	$where = '(requester_id="'.$_SESSION['session_data'].'" or provider_id = "'.$_SESSION['session_data'].'")';
	$select_actual_user = $this->db->where($where)->order_by('id','DESC')->limit(1)->get('accept_request_tbl');
	$fetch_actual_user = $select_actual_user->row();
	$requester = $fetch_actual_user->requester_id;
	$provider = $fetch_actual_user->provider_id;
	if($requester == $_SESSION['session_data'])
	{
		$save_id = $provider;
	}
	else if($provider == $_SESSION['session_data'])
	{
		$save_id = $requester;
	}

	$insert_condition = [
		's_id' => $_SESSION['session_data'],
		'r_id' => $save_id,
		'archetype_id' => 0,
		'msg' => $msg_data,
		'msg_on' => date('Y-m-d'),

	];
	$insertQuery = $this->db->insert('chat_bot_tbl',$insert_condition);
	if($this->db->affected_rows())
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function insertChatVideo($msg_data)
{
	$where = '(requester_id="'.$_SESSION['session_data'].'" or provider_id = "'.$_SESSION['session_data'].'")';
	$select_actual_user = $this->db->where($where)->order_by('id','DESC')->limit(1)->get('accept_request_tbl');
	$fetch_actual_user = $select_actual_user->row();
	$requester = $fetch_actual_user->requester_id;
	$provider = $fetch_actual_user->provider_id;
	if($requester == $_SESSION['session_data'])
	{
		$save_id = $provider;
	}
	else if($provider == $_SESSION['session_data'])
	{
		$save_id = $requester;
	}

	$insert_condition = [
		's_id' => $_SESSION['session_data'],
		'r_id' => $save_id,
		'archetype_id' => 1,
		'msg' => $msg_data.".wav",
		'msg_on' => date('Y-m-d'),

	];
	$insertQuery = $this->db->insert('chat_bot_tbl',$insert_condition);
	if($this->db->affected_rows())
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function audio_insert($audio_data)
{
	$insert_condition = [
		'archetype_id' => 0,
		'msg' => $audio_data,

	];
	$insertQuery = $this->db->insert('chat_bot_tbl',$insert_condition);
	if($this->db->affected_rows())
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function account_settings()
{
	$selectQuery = $this->db->where('id',$_SESSION['session_data'])->get('reg_font');
	if($selectQuery->num_rows() > 0)
	{
		return $selectQuery->result();
	}
	else
	{
		return false;
	}
}


public function edit_user_profile()
{
	$update_condition = [
		'user_name' => $_POST['u_name'],
		'user_email' => $_POST['u_mail'],
		'user_pass' => $_POST['u_pass'],
		'enc_pass' => md5($_POST['u_pass'])
	];
	$selectQuery = $this->db->where('id',$_SESSION['session_data'])->update('reg_font',$update_condition);
	if($this->db->affected_rows() > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
	

}

/* End of file ChatModel.php */
/* Location: ./application/models/ChatModel.php */