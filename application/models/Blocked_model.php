<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}

	# total providers list

	public function check_total_providers($block_gl_data)
	{
		$store_data = $block_gl_data;
		// echo "hi<br/>";
		$html_data = "";
		#conditional array details
		$conditional_array = [
			'user_id !=' => $_SESSION['session_data'],
		];
		#result data
		 
		# if params null

		if($store_data == '0')
		{
			$result_data = $this->db->from('provider_data_tbl')->where($conditional_array)->group_by('user_id')->get();
			if($result_data->num_rows()>0){

				foreach($result_data->result() as $resultant_data)
				{
					$checking_cond = [
						'block_id' => $resultant_data->user_id,
						'blocked_by' => $_SESSION['session_data'],
						'block_status' => 1
					];
					# checking those block status
					$resultSet = $this->db->where($checking_cond)->get('block_users_tbl');
					if($resultSet->num_rows() > 0){
						$block_status_check = "<a href='javascript:;' class='btn  user_ch unblock-btn-class' onclick=block_deactive(".$resultant_data->user_id.",".$_SESSION['session_data'].")>Unblock</a>";
					}else{
						$block_status_check = "<a href='javascript:;' class='btn user_ch' onclick=block_active(".$resultant_data->user_id.",".$_SESSION['session_data'].")>Block</a>";
					}
					# end checking blocked status
					$user_result_set = $this->db->where('id',$resultant_data->user_id)->get('reg_font');
					$fetch_users = $user_result_set->row();
					$html_data .= "<tr><td>".$fetch_users->user_name."</td><td>".$block_status_check."</td></tr>";
				}

			} else{
				$html_data .="<tr><td colspan='2' class='text-danger'><i class='fa fa-times'></i> No Providers Avaliable</td></tr>";
			}
			// echo "hero";
			// echo "<pre>";
			// print_r($html_data);

		}
		else if($store_data != '0')
		{
			# where condition
			$where_array = [
				'blocked_by'=> $_SESSION['session_data'],
				'block_id !=' => $_SESSION['session_data'],
			];
			# if params not null
			$result_data = $this->db->from('reg_font')->join('block_users_tbl','reg_font.id = block_users_tbl.block_id')->where($where_array)->where("`reg_font.user_name` LIKE '$store_data%'")->get();
			if($result_data->num_rows()>0){

				foreach($result_data->result() as $resultant_data)
				{
					if($resultant_data->block_status == 1){
						$block_status_check = "<a href='javascript:;' class='btn  user_ch unblock-btn-class' onclick=block_deactive(".$resultant_data->block_id.",".$_SESSION['session_data'].")>Unblock</a>";
					}else{
						$block_status_check = "<a href='javascript:;' class='btn user_ch' onclick=block_active(".$resultant_data->user_id.",".$_SESSION['session_data'].")>Block</a>";
					}
					# end checking blocked status
					$html_data .= "<tr><td>".$resultant_data->user_name."</td><td>".$block_status_check."</td></tr>";
				}

			} else{
				$html_data .="<tr><td colspan='2' class='text-danger'><i class='fa fa-times'></i> No Providers Avaliable With That Name</td></tr>";
			}

			// echo "hero1";
			// echo "<pre>";
			// print_r($html_data);
		}



		#end result data

		// exit();
		return $html_data;

	}

	# end providers list 

	# block 
	public function block_active($block_id,$blocked_by)
	{
		#checking blocked active
		$checkQuery = $this->db->where(['block_id'=>$block_id,'blocked_by'=>$blocked_by])->get('block_users_tbl');
		if($checkQuery->num_rows()>0){
			#sql block update
			$sql = $this->db->where(['block_id'=>$block_id,'blocked_by'=>$blocked_by])->update('block_users_tbl',['block_status'=>1]);
		}else{
			#sql block insert
			$sql_arr = [
				'block_id' => $block_id,
				'blocked_by' => $blocked_by,
				'block_status' => 1
			];

			$sql = $this->db->insert('block_users_tbl',$sql_arr);
		}
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	# unblock 
	public function block_deactive($block_id,$blocked_by)
	{
		#checking blocked active
		$checkQuery = $this->db->where(['block_id'=>$block_id,'blocked_by'=>$blocked_by])->get('block_users_tbl');
		if($checkQuery->num_rows()>0){
			#sql block update
			$sql = $this->db->where(['block_id'=>$block_id,'blocked_by'=>$blocked_by])->update('block_users_tbl',['block_status'=>0]);
		}else{
			#sql block insert
			$sql_arr = [
				'block_id' => $block_id,
				'blocked_by' => $blocked_by,
				'block_status' => 0
			];

			$sql = $this->db->insert('block_users_tbl',$sql_arr);
		}
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	

}

/* End of file Blocked_model.php */
/* Location: ./application/models/Blocked_model.php */