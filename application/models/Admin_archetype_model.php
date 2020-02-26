<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_archetype_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function count_total_rows()
	{
		$return_rows = $this->db->select('*')
								->from('deckeditortmpstore a')
								->join('format_tbl b','a.format_name = b.id','INNER')
								->join('reg_font c','a.user_id = c.id','INNER')
								->get();
		$total_rows = $return_rows->num_rows();
		return $total_rows;
	}

	public function articlelist($limit,$offset)
	{
		$return_rows = $this->db->select('*, a.id as mainId, b.format_name as main_format_name')
								->from('deckeditortmpstore a')
								->join('format_tbl b','a.format_name = b.id','INNER')
								->join('reg_font c','a.user_id = c.id','INNER')
								->where('approved_status !=', 1)
								->limit($limit,$offset)
								->get();
		$total_rows = $return_rows->num_rows();
		if($total_rows>0)
		{
			// echo "<pre>";
			return $return_rows->result();
			// print_r($return_rows->result());
			// exit();
		}
		else
		{
			return false;
		}
	}

	public function arche_how_check()
	{
		$result_arr = $this->db->group_by('archetype_filter')->get('archetype_category');
		if($result_arr->num_rows() > 0)
		{
			return $result_arr->result();
		}
		else
		{
			return false;
		}
	}

	public function arche_name_check()
	{
		$result_arr = $this->db->get('archetype_name');
		if($result_arr->num_rows() > 0)
		{
			return $result_arr->result();
		}
		else
		{
			return false;
		}
	}

	public function popup($data){
		$result_arr = $this->db->where('id',$data)->get('deckeditortmpstore');
		return $result_arr->result();
	}

	public function checking_arche_name($data_val){
		$result_arr = $this->db->get('archetype_name');


		if($result_arr->num_rows() > 0)
		{
			$html_view = "";
			foreach($result_arr->result() as $res_data){
				if($res_data->id == $data_val){
					$select_state = "selected";
				}else{
					$select_state = "";
				}
				$html_view .= "<option value='".$res_data->id."' ".$select_state.">".$res_data->archetype_name."</option>";
			}
			return $html_view;
		}
	}

	public function checking_archetype_wish($data_val){
		$result_arr1 = $this->db->where('id',$data_val)->get('archetype_name');
		$fetch_arr1 = $result_arr1->row();
		$data_a_id = $fetch_arr1->a_id;
		$result_arr = $this->db->group_by('archetype_filter')->get('archetype_category');


		if($result_arr->num_rows() > 0)
		{
			$html_view = "";
			foreach($result_arr->result() as $res_data){
				if($res_data->id == $data_a_id){
					$select_state = "selected";
				}else{
					$select_state = "";
				}
				$html_view .= "<option value='".$res_data->id."' ".$select_state.">".$res_data->archetype_filter."</option>";
			}
			return $html_view;
		}
	}


	public function checking_for_users($data_val){
		$result_arr = $this->db->where('id',$data_val)->get('deckeditortmpstore');
		$fetch_arr = $result_arr->row();
		$main_data_id = $fetch_arr->user_id;
		$fetch_data = $this->db->where('id',$main_data_id)->get('reg_font');
		$fetch_data_reg = $fetch_data->row();

		if($fetch_data->num_rows()>0)
		{
			return $fetch_data_reg->user_email;
		}
	} 

	public function denial_send_data($data_val,$res_val)
	{	
		$arr_err = [
			'denial_response' => $res_val,
		];
		$result_arr = $this->db->where('id',$data_val)->update('deckeditortmpstore',$arr_err);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	public function checking_denial_msg($data_show)
	{
		$result_arr = $this->db->where('id',$data_show)->get('deckeditortmpstore');
		if($result_arr->num_rows() > 0){
			return $result_arr->row();
		}else{
			return false;
		}
	}

	public function send_mail_data($resp_data){
		$result_arr = $this->db->where('id',$resp_data)->get('deckeditortmpstore');
		if($result_arr->num_rows() > 0){
			$fetch_data_res = $result_arr->row();
			$my_user_id = $fetch_data_res->user_id;

			# user_id checking for email data
			$fetch_checking = $this->db->where('id',$my_user_id)->get('reg_font');
			if($fetch_checking->num_rows() > 0){
				$main_data_set = $fetch_checking->row();
				$main_user_mail = $main_data_set->user_email;
				return $main_user_mail;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function show_arche_type($main_id){
		$result_arr = $this->db->where('id',$main_id)->get('archetype_name');
		if($result_arr->num_rows() > 0){
			$main_data_set = $result_arr->row();
			$main_user_mail = $main_data_set->archetype_name;
			return $main_user_mail;
		}else{
			return false;
		}
	}

	public function update_data_type($resp_data,$main_descrip)
	{
		$arr_err = [
			'denial_response' => $main_descrip,
		];
		$result_arr = $this->db->where('id',$resp_data)->update('deckeditortmpstore',$arr_err);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	// update new archetype datas na dfetch all of those data

	public function query_updateFetch($main_data_id, $arche_id)
	{
		# update
		$updataQueryOn = $this->db->where('id',$main_data_id)->update('deckeditortmpstore',['choose_arche_id'=>$arche_id]);
		# select 
		$selectQueryOn = $this->db->where('id',$main_data_id)->get('deckeditortmpstore');
		$fetchQueryOn = $selectQueryOn->row();

		# select archetype
		$selectArche = $this->db->where('id',$fetchQueryOn->id)->get('archetype_name');
		$fetchArche = $selectArche->row();
		$get_arche_cate_id = $fetchArche->a_id;

		# format name
		$get_format_id = $fetchQueryOn->format_name;

		# card details
		$get_card_details = $fetchQueryOn->card_details;

		# new archetype name (use the card name)
		$get_new_arche_name = $fetchQueryOn->card_name;

		#insert  array  for archetype
		$insert_array = [
			'archetype_name' => $get_new_arche_name,
			'a_id' => $get_arche_cate_id,
			'a_details' => $get_card_details,
		];
		# insert query
		$insertQuery =  $this->db->insert('archetype_name',$insert_array);
		if($this->db->affected_rows() > 0 )
		{
			$update_main_deckBox = $this->db->where('id',$main_data_id)->update('deckeditortmpstore',['approved_status' => 1]);
			return true;
		}
		else
		{
			return false;
		}
	}

	

}

/* End of file Admin_archetype_model.php */
/* Location: ./application/models/Admin_archetype_model.php */