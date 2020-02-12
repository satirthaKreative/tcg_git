<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deck_editor_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

public function deck_editor()
{
	$selectQuery = $this->db->select('*, B.id as mainId')
							->from('accept_request_tbl AS A')
							->join('deck_editor_tbl AS B', 'A.ID = B.a_id', 'INNER')
							->join('req_to_pro AS C', 'C.provider_id = A.provider_id', 'INNER')
							->join('provider_data_tbl AS D', 'D.id = C.provider_tbl_id', 'INNER')
							->join('platform_tbl AS E', 'E.id = D.platform')
							->join('format_tbl AS F', 'F.id = D.format')
							->join('archetype_name AS G', 'G.id = D.archetype')
							->where('A.requester_id',$_SESSION['session_data'])
							->or_where('A.provider_id',$_SESSION['session_data'])
							->get();
	if($selectQuery->num_rows()>0)
	{
		return $selectQuery->result();
	}
	else
	{
		return false;
	}

}

public function search_data($search_data){
		$selectQuery = $this->db->select('*, B.id as mainId')
							->from('accept_request_tbl AS A')
							->join('deck_editor_tbl AS B', 'A.ID = B.a_id', 'INNER')
							->join('req_to_pro AS C', 'C.provider_id = A.provider_id', 'INNER')
							->join('provider_data_tbl AS D', 'D.id = C.provider_tbl_id', 'INNER')
							->join('platform_tbl AS E', 'E.id = D.platform')
							->join('format_tbl AS F', 'F.id = D.format')
							->join('archetype_name AS G', 'G.id = D.archetype')
							->like('G.archetype_name',$search_data,'after')
							->where('A.requester_id',$_SESSION['session_data'])
							->or_where('A.provider_id',$_SESSION['session_data'])
							->get();
	if($selectQuery->num_rows() > 0)
	{
		return $selectQuery->result();
	}
	else
	{
		return false;
	}
}

public function search_data_q($data_value){
	$selectQuery = $this->db->select('*')
							->from('accept_request_tbl AS A')
							->join('deck_editor_tbl AS B', 'A.ID = B.a_id', 'INNER')
							->join('req_to_pro AS C', 'C.provider_id = A.provider_id', 'INNER')
							->join('provider_data_tbl AS D', 'D.id = C.provider_tbl_id', 'INNER')
							->join('platform_tbl AS E', 'E.id = D.platform')
							->join('format_tbl AS F', 'F.id = D.format')
							->join('archetype_name AS G', 'G.id = D.archetype')
							->join('reg_font AS H', 'H.id = D.user_id')
							->where('B.id',$data_value)
							->where('A.requester_id',$_SESSION['session_data'])
							->or_where('A.provider_id',$_SESSION['session_data'])
							->get();
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

/* End of file Deck_editor_model.php */
/* Location: ./application/models/Deck_editor_model.php */