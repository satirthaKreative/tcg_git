<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save_file_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDatas()
	{
		$date = date('Y-m-d');
		$previous_date = date("Y-m-d", time() - 60 * 60 * 24);
		// echo $previous_date;
		// echo "select * from chat_bot_tbl inner join reg_font on reg_font.id = chat_bot_tbl.r_id where (msg_on >= ".$previous_date." and msg_on <= ".date("Y-m-d").") and s_id = ".$_SESSION['session_data']." group by r_id";
		$where_condition = '(s_id = "'.$_SESSION['session_data'].'")';
		$condition2 = '((msg_on >= "'.$previous_date.'") and (msg_on <= "'.date("Y-m-d").'"))';

		$selectQuery = $this->db->from('chat_bot_tbl')->join('reg_font',' reg_font.id = chat_bot_tbl.r_id')->where($condition2)->where($where_condition)->group_by(array('r_id','archetype_id'))->get();

		if($selectQuery->num_rows() > 0)
		{
			return $selectQuery->result();
		}
		else
		{
			return false;
		}
	}

	public function save_file_chat($user1, $user2, $arche)
	{
		$date = date('Y-m-d');
		$previous_date = date("Y-m-d", time() - 60 * 60 * 24);
		// echo $previous_date;
		// echo "select * from chat_bot_tbl inner join reg_font on reg_font.id = chat_bot_tbl.r_id where (msg_on >= ".$previous_date." and msg_on <= ".date("Y-m-d").") and s_id = ".$_SESSION['session_data']." group by r_id";
		$where_condition = '(s_id = "'.$user1.'" OR s_id = "'.$user2.'") AND (r_id = "'.$user2.'" OR r_id = "'.$user1.'")';
		$condition2 = '((msg_on >= "'.$previous_date.'") and (msg_on <= "'.date("Y-m-d").'"))';

		$selectQuery = $this->db->from('chat_bot_tbl')->join('reg_font',' reg_font.id = chat_bot_tbl.r_id')->where($condition2)->where($where_condition)->where('archetype_id',$arche)->get();
		if($selectQuery->num_rows() > 0)
		{
			return $selectQuery->result();
		}
		else
		{
			return false;
		}
		
	}

}

/* End of file Save_file_model.php */
/* Location: ./application/models/Save_file_model.php */