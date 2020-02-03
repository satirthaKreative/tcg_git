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
						$output .= '<tr class="">
			                            <td colspan=""><a href="javascript:;" class="name" onclick="show_card_data('.$key->id.')">'.$key->card_name.'</a>
			                            </td>
			                                    <td colspan="">
			                                    	<ul>
			                                            <li>
			                                                <span title="{2}">2</span>
			                                            </li>
			                                            <li>
			                                                <img src="'.base_url("assets/front_assets/images/b.png").'" alt="" title="{B}">
			                                            </li>
			                                            <li>
			                                                <img src="'.base_url("assets/front_assets/images/u.png").'" alt="" title="{U}">
			                                            </li>
			                                            <li>
			                                                <img src="'.base_url("assets/front_assets/images/w.png").'" alt="" title="{W}">
			                                            </li>
			                                        </ul>
			                            		</td>
			                            <td class="position">
			                                <a href="javascript: ;" class="">
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
				$random_pass_char = 202;
				if(strpos($key, " ") == true)
				{
					$data_key_id = str_replace(" ",202,$key);
				}
				else if(strpos($key, "%20") == true)
				{
					$data_key_id = str_replace("%20",202,$key);
				}
				else
				{
					$data_key_id = $key;
				}
				$actual_card_name1 = str_replace('%20',' ',htmlspecialchars('"'.$key.'"'));
				$output .= '<tr class="" id="'.$data_key_id.'">
                                       <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">'.str_replace("%20"," ",$key).'</a></td>
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
						}
						else if(strpos($key, "%20") == true)
						{
							$data_key_id = str_replace("%20",202,$key);
						}
						else
						{
							$data_key_id = $key;
						}
						$actual_card_name1 = str_replace('%20',' ',htmlspecialchars('"'.$key.'"'));
						$output .= '<tr class="" id="'.$data_key_id.'">
		                                       <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">'.str_replace("%20"," ",$key).'</a></td>
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
		                                                <a href="javascript:;" class="" onclick="myOnClickShowChange('.$actual_card_name1.')">
		                                                    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
		                                                </a>
		                                            </td>
		                                        </tr>';
					}
				return $output;
	}

	// end of sidebar data

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


}

/* End of file DeckEditorModel.php */
/* Location: ./application/models/DeckEditorModel.php */