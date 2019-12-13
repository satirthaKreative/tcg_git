<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvidersTblModel extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

public function sender_details()
{
	$session_data = $_SESSION['session_data'];
	// condition
	$where_condition = [
		'user_id' => $session_data, 
	];
	// select query
	$selectQuery = $this->db->where($where_condition)->order_by('user_id','DESC')->limit(1)->get('requester_tbl');
	if($selectQuery->num_rows() > 0)
	{
		// actual data
		$total_details = $selectQuery->row();
		// properties
		$archetype =  $total_details->archetype;
		$platform = $total_details->platform;
		$format = $total_details->format;
		$communication = $total_details->communication;

		$where_second_condition = [
			'platform' => $platform,
			'format' => $format,
			'archetype' => $archetype,
			'communication' => $communication,
		];

		// platform name fetch
		$selectPlatform = $this->db->where('id',$platform)->get('platform_tbl');
		$fetchPlatform = $selectPlatform->row();
		$platform_name = $fetchPlatform->platform_name;
		// format name fetch
		$selectFormat = $this->db->where('id',$format)->get('format_tbl');
		$fetchFormat = $selectFormat->row();
		$format_name = $fetchFormat->format_name;
		// communication name fetch
		$selectCommunication = $this->db->where('id',$communication)->get('communication_tbl');
		$fetchCommunication = $selectCommunication->row();
		$communication_name = $fetchCommunication->communication_name;
		// archetype name fetch
		$selectArchetype = $this->db->where('id',$archetype)->get('archetype_name');
		$fetchArchetype = $selectArchetype->row();
		$archetype_name = $fetchArchetype->archetype_name;

		// total type fullname
			// $_SESSION['platform_name'] = $platform_name;
			// $_SESSION['format_name'] = $format_name;
			// $_SESSION['communication_name'] = $communication_name;
			// $_SESSION['archetype_name'] = $archetype_name;

		// checking queries
		$selectQueryData = $this->db->select('*, a.id as mainId')
						->from('provider_data_tbl a') 
    					->join('platform_tbl b', 'b.id=a.platform')
    					->join('format_tbl c', 'c.id=a.format')
    					->join('communication_tbl d', 'd.id=a.communication')
    					->join('archetype_name e', 'e.id=a.archetype')
    					->join('voult_time_slot f', 'f.id=a.timeframe')
    					->join('reg_font g', 'g.id=a.user_id')
						->where($where_second_condition)
						->where('active_state',1)
						->where('user_id !=',$_SESSION['session_data'])
						->where('cur_time',date('Y-m-d'))
						->get();
		// $Purchase_req = $this->provider_data_tbl->find();
		// echo $Purchase_req;
		// exit();
		// echo $selectQueryData;
		// exit;
		// condition checking
		if($selectQueryData->num_rows() > 0)
		{
			return $selectQueryData->result();
		}
	}


}

// provider notification tbl
public function provider_notification()
{
	$where_condition = [
		'b.provider_id' => $_SESSION['session_data'],
		'b.status' => 1,
		'b.active_date' => date('Y-m-d') 
	];
	$selectQueryData = $this->db->select('*, a.id as mainId')
					->from('requester_tbl a')
					->join('req_to_pro b','b.requester_tbl_id = a.id')
					->join('format_tbl c', 'c.id=a.format')
    				->join('communication_tbl d', 'd.id=a.communication')
    				->join('archetype_name e', 'e.id=a.archetype')
    				->join('voult_time_slot f', 'f.id=a.timeframe')
    				->join('reg_font g', 'g.id=a.user_id')
    				->join('platform_tbl h', 'h.id=a.platform')
    				->where('b.status',1)
    				->where($where_condition)
    				->where('user_id !=',$_SESSION['session_data'])
    				->where('cur_time',date('Y-m-d'))
    				->get();

   
    if($selectQueryData->num_rows() > 0)
	{
		return $selectQueryData->result();
	}
}
// request nofication
public function notify_request($value)
{
	$select_proid = $this->db->where('id',$value)->get('provider_data_tbl');
	$total_data = $select_proid->row();
	//  provider id
	$provider_id = $total_data->user_id;
	//	requester id
	$requester_id = $_SESSION['session_data'];
	// fetch request tbl id
	$select_request_tbl = $this->db->where('user_id',$requester_id)->order_by('id','desc')->limit(1)->get('requester_tbl');
	$fetch_request_tbl = $select_request_tbl->row();
	$requester_tbl_id = $fetch_request_tbl->id;
	// insert queries
	$insertArrayReq = [
		'provider_id' => $provider_id,
		'requester_id' => $requester_id,
		'provider_tbl_id' => $value,
		'requester_tbl_id' => $requester_tbl_id,
		'active_date' => date('Y-m-d'),
		'status' => 1
	]; 

	$insertQueryReq = $this->db->insert('req_to_pro',$insertArrayReq);
	if($this->db->affected_rows())
	{
		return true;
	}
	else
	{
		return false;
	}
}

// provider and requester accept option

public function accept_requester($request_id)
{
	$where_condition = [
		'user_id' => $_SESSION['session_data']
	];

	$select_provider_time = $this->db->where($where_condition)->order_by('id','DESC')->limit(1)->get('provider_data_tbl');
	$fetch_provider_time = $select_provider_time->row();
	$fetch_timeframe_id = $fetch_provider_time->timeframe;

	// actual provided time
	$select_provider_sec_time = $this->db->where('id',$fetch_timeframe_id)->get('voult_time_slot');
	$fetch_provider_sec_time = $select_provider_sec_time->row();
	$provider_actual_time = $fetch_provider_sec_time->convert_seconds;

	// requester details 
	$select_requester_id = $this->db->where('id',$request_id)->get('requester_tbl');
	$fetch_requester_id = $select_requester_id->row();
	$req_user_id = $fetch_requester_id->user_id; 

	// insert array
	$insert_arr = [
		'requester_id' => $req_user_id,
		'provider_id' => $_SESSION['session_data'],
		'request_time' => $provider_actual_time,
		'chat_on' => date('Y-m-d'),
	];

	$insert_request = $this->db->insert('accept_request_tbl',$insert_arr);

	// select request
	if($this->db->affected_rows())
	{
		return $provider_actual_time;
	}
	else
	{
		return false;
	}

}

// stop watch 

function request_stopwatch()
{
	$checking_available_or_not = $this->db->from('accept_request_tbl')
										->where('requester_id',$_SESSION['session_data'])
										->where('chat_on',date('Y-m-d'))
										->where('status',1)
										->order_by('id','Desc')
										->limit(1)
										->get();
	if($checking_available_or_not->num_rows() > 0)
	{
		$fetch_row = $checking_available_or_not->row();
		return $fetch_row->request_time;
	}
	else
	{
		return false;
	}
}

// checking timer

public function check_request_stopwatch()
{
	$checking_available_or_not = $this->db->from('accept_request_tbl')
										->where('requester_id',$_SESSION['session_data'])
										->where('chat_on',date('Y-m-d'))
										->where('status',0)
										->order_by('id','Desc')
										->limit(1)
										->get();
	if($checking_available_or_not->num_rows() > 0)
	{
		$fetch_row = $checking_available_or_not->row();
		return $fetch_row->request_time;
	}
	else
	{
		return false;
	}
}

	

}

/* End of file ProvidersTblModel.php */
/* Location: ./application/models/ProvidersTblModel.php */