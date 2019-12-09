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
			$_SESSION['platform_name'] = $platform_name;
			$_SESSION['format_name'] = $format_name;
			$_SESSION['communication_name'] = $communication_name;
			$_SESSION['archetype_name'] = $archetype_name;

		// checking queries
		$selectQueryData = $this->db->where($where_second_condition)->get('provider_data_tbl');
		// condition checking
		if($selectQueryData->num_rows() > 0)
		{
			return $selectQueryData->result();
		}
	}


}
	

}

/* End of file ProvidersTblModel.php */
/* Location: ./application/models/ProvidersTblModel.php */