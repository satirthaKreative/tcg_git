<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvidersTblModel extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

// show all senders

public function providers_total_details()
{
	#session user id
	$session_data= $_SESSION['session_data'];

	#session data
	$selectQuery = $this->db->where('block_id',$_SESSION['session_data'])->where('block_status',1)->get('block_users_tbl');
	$fetchQ_data = $selectQuery->row();
	if($selectQuery->num_rows() > 0){
		$num_data = $fetchQ_data->blocked_by;
	}else{
		$num_data = 0;
	}

	#all providers
	$selectQueryData = $this->db->select('*, a.id as mainId, b.id as platId, c.id as formatId, e.id as archeId')
				->from('provider_data_tbl a') 
    			->join('platform_tbl b', 'b.id=a.platform')
    			->join('format_tbl c', 'c.id=a.format')
    			->join('archetype_name e', 'e.id=a.archetype')
    			->join('reg_font g', 'g.id=a.user_id')
				// ->where('g.active_state',1)
				->where('a.user_id !=',$_SESSION['session_data'])
				->where('a.user_id !=',$num_data)
						// ->where('cur_time',date('Y-m-d'))
				->get();

	if($selectQueryData->num_rows() > 0)
	{
		return $selectQueryData->result();
	}

}

// end show all senders

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
			// 'communication' => $communication
		];

		// print_r($where_second_condition);

		// platform name fetch
		$selectPlatform = $this->db->where('id',$platform)->get('platform_tbl');
		$fetchPlatform = $selectPlatform->row();
		$platform_name = $fetchPlatform->platform_name;
		// format name fetch
		$selectFormat = $this->db->where('id',$format)->get('format_tbl');
		$fetchFormat = $selectFormat->row();
		$format_name = $fetchFormat->format_name;
		// communication name fetch
		// $selectCommunication = $this->db->where('id',$communication)->get('communication_tbl');
		// $fetchCommunication = $selectCommunication->row();
		// $communication_name = $fetchCommunication->communication_name;
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
    					// ->join('communication_tbl d', 'd.id=a.communication')
    					->join('archetype_name e', 'e.id=a.archetype')
    					// ->join('voult_time_slot f', 'f.id=a.timeframe')
    					->join('reg_font g', 'g.id=a.user_id')
						->where($where_second_condition)
						->where('g.active_state',1)
						->where('a.user_id !=',$_SESSION['session_data'])
						// ->where('cur_time',date('Y-m-d'))
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
    				// ->join('communication_tbl d', 'd.id=a.communication')
    				->join('archetype_name e', 'e.id=a.archetype')
    				// ->join('voult_time_slot f', 'f.id=a.timeframe')
    				->join('reg_font g', 'g.id=a.user_id')
    				->join('platform_tbl h', 'h.id=a.platform')
    				->where('b.status',1)
    				->where($where_condition)
    				->where('user_id !=',$_SESSION['session_data'])
    				// ->where('cur_time',date('Y-m-d'))
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

	// if($select_request_tbl->num_rows() > 0){
	// 	$data_check = 
	// }else{
	// 	echo "No";
	// }
	$requester_tbl_id = $fetch_request_tbl->id;
	// echo "hi".$requester_tbl_id;
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

// provider new type request
public function notify_creation($value, $time_frame_select, $platform_data, $format_data, $arche_type)
{

	$insert_array = [
		'platform' => $platform_data,
		'format' => $format_data,
		'archetype' => $arche_type,
		'timeframe' => $time_frame_select,
		'communication' => 0,
		'cur_time' => date('Y-m-d'),
		'user_id' => $_SESSION['session_data'],
	];
	$insertQuery = $this->db->insert('requester_tbl',$insert_array);

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

	// echo $request_id;
	// die();

	$select_provider_time = $this->db->where($where_condition)->order_by('id','DESC')->limit(1)->get('provider_data_tbl');
	$fetch_provider_time = $select_provider_time->row();
	

	

	// requester details 
	$select_requester_id = $this->db->where('id',$request_id)->get('requester_tbl');
	$fetch_requester_id = $select_requester_id->row();
	$req_user_id = $fetch_requester_id->user_id; 
	$fetch_timeframe_id = $fetch_requester_id->timeframe;

	// actual provided time
	$select_provider_sec_time = $this->db->where('id',$fetch_timeframe_id)->get('voult_time_slot');
	$fetch_provider_sec_time = $select_provider_sec_time->row();
	$provider_actual_time = $fetch_provider_sec_time->convert_seconds;
	// insert array
	$insert_arr = [
		'requester_id' => $req_user_id,
		'provider_id' => $_SESSION['session_data'],
		'request_time' => $provider_actual_time,
		'chat_on' => date('Y-m-d'),
	];

	$update_arr = [
		'status' => 0
	];

	$update_where_arr = [
		'provider_id' => $_SESSION['session_data'],
		'requester_id' => $req_user_id,
	];

	$select_up_row = $this->db->where($update_where_arr)->order_by('id','DESC')->limit(1)->get('req_to_pro');
	$fetch_up_row = $select_up_row->row();
	$last_up_id = $fetch_up_row->id;

	$update_query = $this->db->where('id',$last_up_id)->update('req_to_pro',$update_arr);

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
	if(isset($_SESSION['session_data'])){
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
}

// checking timer

public function check_request_stopwatch()
{
	$where = '(provider_id="'.$_SESSION['session_data'].'" or requester_id = "'.$_SESSION['session_data'].'")';
	$checking_available_or_not = $this->db->from('accept_request_tbl')
										->where($where)
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

public function stop_timer_id($stopage_time)
{
	$str_time = $stopage_time;

	// convert

		$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
		//print_r($str_time);
		sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

		$time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

	// end convert



	$where = '(provider_id="'.$_SESSION['session_data'].'" or requester_id = "'.$_SESSION['session_data'].'")';


	$checking_available_or_not = $this->db->from('accept_request_tbl')
										->where($where)
										->where('chat_on',date('Y-m-d'))
										->where('status',1)
										->order_by('id','Desc')
										->limit(1)
										->get();
	$select_deck = $checking_available_or_not->row();
	$tot_time_deck = $select_deck->request_time;
	$use_time = $tot_time_deck - $time_seconds;
	$insert_arr_deck = [
		'a_id' => $select_deck->id,
		'time_use' => $use_time,
	];	
	$insert_deck = $this->db->insert('deck_editor_tbl',$insert_arr_deck);
	if($checking_available_or_not->num_rows() > 0)
	{
		$fetch_row = $checking_available_or_not->row();
		$actual_tm = $fetch_row->request_time;
		$last_id = $fetch_row->id;
		$p_id = $fetch_row->provider_id;
		$r_id = $fetch_row->requester_id;
		if($p_id == $_SESSION['session_data'])
		{
			$main_user = $r_id;
		}
		else if($r_id == $_SESSION['session_data'])
		{
			$main_user = $p_id;
		}
 		//
		$where1 = '(user_id="'.$fetch_row->provider_id.'" or user_id = "'.$fetch_row->requester_id.'")';
		$selectUsers = $this->db->where($where1)->get('timezone_tbl');
		$count_user = $selectUsers->num_rows();
		
			$fetch_data_type = $selectUsers->result_array();
			foreach($fetch_data_type as $fetch_data){
				$arr_value = [
					'total_time' => $fetch_data['total_time'] - ($actual_tm - $time_seconds),
				];

				$add_voult_time = 2*($actual_tm - $time_seconds);
				$insertVoult = $this->db->get('voult');
				$fetchVoult = $insertVoult->row();

				$in_hours = $add_voult_time/3600;
				$in_mins = $add_voult_time/60;

				$update_data_in_voult = [
					'voult_total_time' => $fetchVoult->voult_total_time + $in_hours,
					'time_in_second' => $fetchVoult->time_in_second + $add_voult_time,
					'time_in_minute' => $fetchVoult->time_in_minute + $in_mins,
				];
				$updateQueryVoult = $this->db->update('voult',$update_data_in_voult);
				if($fetch_data['user_id'] == $_SESSION['session_data'])
				{
					$update_query_user = $this->db->where('user_id',$_SESSION['session_data'])->update('timezone_tbl',$arr_value);
				}
				else
				{
					$update_query_user = $this->db->where('user_id',$main_user)->update('timezone_tbl',$arr_value);
				}
			}
			
		//
		$where_check = [
			'status'=>0,
		];
		$update_checking_available = $this->db->where('id',$last_id)->update('accept_request_tbl',$where_check);
		if($this->db->affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}


public function checking_voult_havev_enough_time($id_req)
{
	$getting_request_time = $this->db->from('requester_tbl')
									->join('voult_time_slot','requester_tbl.timeframe=voult_time_slot.id','inner')
									->where('requester_tbl.id',$id_req)
									->get();
	$fetch_row_time =  $getting_request_time->row();
	$req_time = $fetch_row_time->convert_seconds;

	# checking the provider voult left time

	$getting_provider_voult = $this->db->where('user_id',$_SESSION['session_data'])->get('timezone_tbl');
	if($getting_provider_voult->num_rows() > 0 )
	{
		$fetch_provider_time = $getting_provider_voult->row();
		$my_time = $fetch_provider_time->total_time;

		if($my_time >= $req_time)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}

}

	

}

/* End of file ProvidersTblModel.php */
/* Location: ./application/models/ProvidersTblModel.php */