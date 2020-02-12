<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeckEditorModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	// count all details
	public function count_total_rows()
	{
		$return_rows = $this->db->get('card_details');
		$total_rows = $return_rows->num_rows();
		return $total_rows;
	}
	// show all details of datas	
	public function allDetails($limit,$offset)
	{
		$output = '';
			$return_rows = $this->db->select('*')
								->from('card_details')
								->limit($limit,$offset)
								->get();
		$total_rows = $return_rows->num_rows();
		foreach ($return_rows->result() as $key) {
			$card_store = $key->card_name;
			$actual_card_name = htmlspecialchars('"'.$card_store.'"');
			$data = str_replace(array( '{', '}' ), ' ', $key->manacost);
			$data_new = [];
			$data_new = explode(' ',$data);
			$empty_list  = '';
			foreach($data_new as $new_data_list)
			{
				if(is_numeric($new_data_list)){
					$empty_list .= '<li> <span title="{'.$new_data_list.'}">'.$new_data_list.'</span></li> &nbsp;';
				}else if(!is_numeric($new_data_list) && $new_data_list != ''){
					$empty_list .= '<li> <img src="'.base_url("assets/front_assets/images/".$new_data_list.".png").'" alt="" title="{'.$new_data_list.'}"></li>  &nbsp;';
				}
			}
			$output .= '<tr class="">
                            <td colspan=""><a href="javascript:;" class="name" id="card_data_model" onclick="show_card_data('.$key->id.')">'.$key->card_name.'</a>
                            </td>
                                    <td colspan="">
                                    	<ul>'.$empty_list.'</ul>
                            		</td>
                            <td class="position">
                                <a href="javascript:;" onclick="myclickDownData('.$actual_card_name.')"  class="">
                                   	<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>';
		}
		return $output;

	}

	public function onclickDownData($data)
	{
		return $this->card_addition($data);
	}

	public function pagination_search($search_card_data){
		$result_data = $this->db->like('card_name',$search_card_data,'after')->get('card_details');
		$output = '';
					foreach ($result_data->result() as $key) {
						#####
						$card_store = $key->card_name;
						$actual_card_name = htmlspecialchars('"'.$card_store.'"');
						# key data
						$data1 = str_replace(array( '{', '}' ),' ', $key->manacost);
						$data_new = [];
						$data_new = explode(' ',$data1);
						$empty_list  = '';
						foreach($data_new as $new_data_list)
						{
							if(is_numeric($new_data_list)){
								$empty_list .= '<li> <span title="{'.$new_data_list.'}">'.$new_data_list.'</span></li> &nbsp;';
							}else if(!is_numeric($new_data_list) && $new_data_list != ''){
								$empty_list .= '<li> <img src="'.base_url("assets/front_assets/images/".$new_data_list.".png").'" alt="" title="{'.$new_data_list.'}"></li>  &nbsp;';
							}
						}
						# end of key data
						$output .= '<tr class="">
			                            <td colspan=""><a href="javascript:;" class="name" onclick="show_card_data('.$key->id.')">'.$key->card_name.'</a>
			                            </td>
			                                    <td colspan="">
			                                    	<ul>'.$empty_list.'</ul>
			                            		</td>
			                            <td class="position">
			                                <a href="javascript: ;" onclick="myclickDownData('.$actual_card_name.')" class="">
			                                   	<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
			                                </a>
			                            </td>
			                        </tr>';
					}
			return $output;
	}

	// card details

	public function show_card_data($data)
	{
		$data_set = $this->db->where('id',$data)->get('card_details');
		$output = '';
		foreach($data_set->result() as $key){
			$data1 = str_replace(array( '{', '}' ), ' ', $key->manacost);
			$data_new = [];
			$data_new = explode(' ',$data1);
			$empty_list  = '';
			foreach($data_new as $new_data_list)
			{
				if(is_numeric($new_data_list)){
					$empty_list .= '<li> <span title="{'.$new_data_list.'}">'.$new_data_list.'</span></li> &nbsp;';
				}else if(!is_numeric($new_data_list) && $new_data_list != ''){
					$empty_list .= '<li> <img src="'.base_url("assets/front_assets/images/".$new_data_list.".png").'" alt="" title="{'.$new_data_list.'}"></li>  &nbsp;';
				}
			}
			$output .= '<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Card Details </h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      				<div class="modal-body">
        				<div class="card_area">
           	 				<div class="card_title">
                				<h2 id="card-show-details">'.$key->card_name.'</h2>
                			<ul>'.$empty_list.'</ul>
            			</div>
                	<p class="card-ability">'.$key->ability.'.</p>
        			</div></div></div></div>';
			}
		return $output;
	}

	//

	public function formatPage()
	{
		$result = $this->db->get('format_tbl');
		return $result->result();
	}

	// card data store 
	public function card_addition($data_list)
	{
		    $key11 = array_search($data_list,$_SESSION['new_sidear_card_session']);
		    if($key11!==false){
		    	unset($_SESSION['new_sidear_card_session'][$key11]);
			}
		$output = '';
		if(isset($_SESSION['new_card_session'])){
			// $_SESSION['new_card_session'] = array();
			array_push($_SESSION['new_card_session'],$data_list);
			foreach ($_SESSION['new_card_session'] as $key) {
				
				# main convert part 
				$random_pass_char = 202;
				if(strpos($key, " ") == true)
				{
					$data_key_id = str_replace(" ",202,$key);
					$key_manacost_show = $key;
				}
				else if(strpos($key, "%20") == true)
				{
					$data_key_id = str_replace("%20",202,$key);
					$key_manacost_show = str_replace("%20"," ",$key);
				}
				else
				{
					$data_key_id = $key;
				}
				# end of main convert part

				# fetch card from particular card database

				$fetch_full = $this->db->where('card_name',$key_manacost_show)->get("card_details");
				if($fetch_full->num_rows() > 0)
				{
					# card full data
					$stored_full_data = $fetch_full->row();
					# end card full data 
					$data1 = str_replace(array( '{', '}' ), ' ', $stored_full_data->manacost);
					$data_new = [];
					$data_new = explode(' ',$data1);
					$empty_list  = '';
					foreach($data_new as $new_data_list)
					{
						if(is_numeric($new_data_list)){
							$empty_list .= '<li> <span title="{'.$new_data_list.'}">'.$new_data_list.'</span></li> &nbsp;';
						}else if(!is_numeric($new_data_list) && $new_data_list != ''){
							$empty_list .= '<li> <img src="'.base_url("assets/front_assets/images/".$new_data_list.".png").'" alt="" title="{'.$new_data_list.'}"></li>  &nbsp;';
						}
					}
				}else{
					$empty_list = "<li></li>";
				}

				# end fetch card database 
				// $deck_val = 'MainDeck';
				// $deck_name_editor = '"'.$deck_val.'"';

				$actual_card_name1 = str_replace('%20',' ',htmlspecialchars('"'.$key.'"'));
				$output .= '<tr class="" id="'.$data_key_id.'">
                                       <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">'.str_replace("%20"," ",$key).'</a></td>
                                            <td colspan="">
                                                <ul>'.$empty_list.'</ul>
                                            </td>
                                            <td class="action">
                                                <a href="javascript:;" class="edit" onclick="maindeck_model('.$actual_card_name1.','."'MainDeck'".')">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="delet" onclick="delete_main_data_deck('.$actual_card_name1.')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0);" onclick="save_maindeck_data('.$actual_card_name1.','."'MainDeck'".')"> 
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="position">
                                                <a href="javascript:;" class="" onclick="myOnClickChange('.$actual_card_name1.')">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>';
			}
		}else{
			array_push($_SESSION['new_card_session'],$data_list);
			$output .= '<tr class="">
                            <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">'.str_replace("%20"," ",$_SESSION['new_card_session']).'</a></td>
                            				<td colspan="">
                                                <ul>
                                                    <li>
                                                        <span title="2">2</span>
                                                    </li>
                                                    <li>
                                                        <img src='.base_url("assets/front_assets/images/w.png").' alt="" title="{W}">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="action">
                                                <a href="javascript:;" class="edit" onclick="maindeck_model()">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delet" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#save_modal"> 
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="position">
                                                <a href="javascript:;" class="">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>';
		}
		return $output;
		// $data = array();
		// if(isset()){
		// 	$data[] = implode(",",$data_list);
		// 	$_SESSION['new_card_session'] = $data;
		// }else{
		// 	$data[] = implode(",",$data_list);
		// 	$_SESSION['new_card_session'] = $data;
		// }
		// if(isset($_SESSION['new_card_session'])){
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	// sadibar data


	public function card_sidebar_addition($data_list)
	{
		    $key = array_search($data_list,$_SESSION['new_card_session']);
		    if($key!==false){
		    	unset($_SESSION['new_card_session'][$key]);
			}
			//  



				$output = '';
					// $_SESSION['new_card_session'] = array();
					array_push($_SESSION['new_sidear_card_session'],$data_list);
					foreach ($_SESSION['new_sidear_card_session'] as $key) {
						if(strpos($key, " ") == true)
						{
							$data_key_id = str_replace(" ",202,$key);
							$key_manacost_show = $key;
						}
						else if(strpos($key, "%20") == true)
						{
							$data_key_id = str_replace("%20",202,$key);
							$key_manacost_show = str_replace("%20"," ",$key);
						}
						else
						{
							$data_key_id = $key;
						}
						$actual_card_name1 = str_replace('%20',' ',htmlspecialchars('"'.$key.'"'));
						# end of main convert part

						# fetch card from particular card database

						$fetch_full = $this->db->where('card_name',$key_manacost_show)->get("card_details");
						if($fetch_full->num_rows() > 0)
						{
							# card full data
							$stored_full_data = $fetch_full->row();
							# end card full data 
							$data1 = str_replace(array( '{', '}' ), ' ', $stored_full_data->manacost);
							$data_new = [];
							$data_new = explode(' ',$data1);
							$empty_list  = '';
							foreach($data_new as $new_data_list)
							{
								if(is_numeric($new_data_list)){
									$empty_list .= '<li> <span title="{'.$new_data_list.'}">'.$new_data_list.'</span></li> &nbsp;';
								}else if(!is_numeric($new_data_list) && $new_data_list != ''){
									$empty_list .= '<li> <img src="'.base_url("assets/front_assets/images/".$new_data_list.".png").'" alt="" title="{'.$new_data_list.'}"></li>  &nbsp;';
								}
							}
						}else{
							$empty_list = "<li></li>";
						}
						# end fetch card database
						$output .= '<tr class="" id="'.$data_key_id.'">
		                                       <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">'.str_replace("%20"," ",$key).'</a></td>
		                                            <td colspan="">
		                                                <ul>'.$empty_list.'</ul>
		                                            </td>
		                                            <td class="action">
		                                                <a href="javascript:;" class="edit" onclick="sidedeck_model('.$actual_card_name1.','."'SideDeck'".')">
		                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		                                                </a>
		                                                <a href="javascript:void(0);" class="delet" onclick="delete_particular_deck('.$actual_card_name1.')">
		                                                    <i class="fa fa-trash" aria-hidden="true"></i>
		                                                </a>

		                                                <a href="javascript:void(0);" onclick="save_particuler_data('.$actual_card_name1.','."'SideDeck'".')"> 
		                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
		                                                </a>
		                                            </td>
		                                            <td class="position">
		                                                <a href="javascript:;" class="" onclick="myOnClickShowChange('.$actual_card_name1.')">
		                                                    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
		                                                </a>
		                                            </td>
		                                        </tr>';
					}
				return $output;
	}

	// end of sidebar data

	// remove main data from deck editor

	public function removeDataMainDeck($data_list)
	{
		    $key = array_search($data_list,$_SESSION['new_card_session']);
		    if($key!==false){
		    	unset($_SESSION['new_card_session'][$key]);
			}
			return true;
	}

	// end remove main deck

	public function checking_card_addition(){
		$output = '';
		if(isset($_SESSION['new_card_session'])){
			foreach ($_SESSION['new_card_session'] as $key) {
				$output .= '<tr class="">
                                            <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">Aegis Automaton</a></td>
                                            <td colspan="">
                                                <ul>
                                                    <li>
                                                        <span title="2">2</span>
                                                    </li>
                                                    <li>
                                                        <img src='.base_url("assets/front_assets/images/w.png").' alt="" title="{W}">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="action">
                                                <a href="javascript:;" class="edit" data-toggle="modal" data-target="#edit_modal">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="" class="delet">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#save_modal"> 
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="position">
                                                <a href="javascript:;" class="">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>';
			}
		}else{
			array_push($_SESSION['new_card_session'],$data_list);
			$output .= '<tr class="">
                                            <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">Aegis Automaton</a></td>
                                            <td colspan="">
                                                <ul>
                                                    <li>
                                                        <span title="2">2</span>
                                                    </li>
                                                    <li>
                                                        <img src='.base_url("assets/front_assets/images/w.png").' alt="" title="{W}">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="action">
                                                <a href="javascript:;" class="edit" data-toggle="modal" data-target="#edit_modal">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="" class="delet">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#save_modal"> 
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="position">
                                                <a href="javascript:;" class="">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>';
		}
		return $output;
	}

	# edit deck data with details

	public function edit_deck_data($card_name,$decktype,$comment)
	{
		// return $comment;

		# manacost fetch
		$manacost_sql = $this->db->where('card_name',$card_name)->get('card_details');
		$manacost_return = $manacost_sql->row();
		$fetch_manacost_data = $manacost_return->manacost; 


		# remove html tags from string
		$string_html = strip_tags($comment);
		$actual_answer_key = trim(preg_replace('/\s\s+/', '200 ', $string_html));
		// $act = preg_split('#(?<=\d)(?=[a-z])#i', $actual_answer_key);
		// return print_r($act);
		// $replace_str_html = str_replace(array('\n','\t','&nbsp;'), '202', $string_html);
		$array_data = explode('200', $actual_answer_key);
		$data_val = [];
		foreach ($array_data as $key) {
			# code...
			$data_val[] = $key;
		}
		$data_com = implode(',',$data_val);
		
		// return $fetch_manacost_data;
		# user id
		$user_id = $_SESSION['session_data'];

		# checking for insert / update 
		$checkingQuery = $this->db->where(['card_name'=>$card_name,'user_id'=>$user_id])->get('deckeditortmpstore');
		if($checkingQuery->num_rows() > 0){
			# update array 
			$updateArr = [
				'card_details' => $data_com,
				'deck_name' => $decktype,
				'update_date' => date('Y-m-d')
			];
			$sqlQuery = $this->db->where(['card_name'=>$card_name,'user_id'=>$user_id])->update('deckeditortmpstore',$updateArr);
		}else{
			# insert array 
			$insertArr = [
				'card_name' => $card_name,
				'manacost' => $fetch_manacost_data,
				'card_details' => $data_com,
				'deck_name' => $decktype,
				'user_id' => $user_id,
				'insert_date' => date('Y-m-d'),
				'update_date' => date('Y-m-d')
			];
			$sqlQuery = $this->db->insert('deckeditortmpstore',$insertArr);
		}

		
		# insert data
		$insertQuery = $sqlQuery;
		if($this->db->affected_rows())
		{
			return true;
		} 
		else
		{
			return false;
		}

	}


	# save deck data 

	public function save_deck_data($card_name,$decktype,$format_scl)
	{
		# manacost fetch
		$manacost_sql = $this->db->where('card_name',$card_name)->get('card_details');
		$manacost_return = $manacost_sql->row();
		$fetch_manacost_data = $manacost_return->manacost; 

		# user id
		$user_id = $_SESSION['session_data'];

		# checking for insert / update 
		$checkingQuery = $this->db->where(['card_name'=>$card_name,'user_id'=>$user_id])->get('deckeditortmpstore');
		if($checkingQuery->num_rows() > 0){
			# update array 
			$updateArr = [
				'format_name' => $format_scl,
				'deck_name' => $decktype,
				'update_date' => date('Y-m-d')
			];
			$sqlQuery = $this->db->where(['card_name'=>$card_name,'user_id'=>$user_id])->update('deckeditortmpstore',$updateArr);
		}else{
			# insert array 
			$insertArr = [
				'card_name' => $card_name,
				'manacost' => $fetch_manacost_data,
				'format_name' => $format_scl,
				'deck_name' => $decktype,
				'user_id' => $user_id,
				'insert_date' => date('Y-m-d'),
				'update_date' => date('Y-m-d')
			];
			$sqlQuery = $this->db->insert('deckeditortmpstore',$insertArr);
		}

		# insert data
		$insertQuery = $sqlQuery;
		if($this->db->affected_rows())
		{
			return true;
		} 
		else
		{
			return false;
		}
	}
}

/* End of file DeckEditorModel.php */
/* Location: ./application/models/DeckEditorModel.php */