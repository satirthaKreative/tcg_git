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
			$output .= '<tr class="">
                            <td colspan=""><a href="javascript:;" class="name" id="card_data_model" onclick="show_card_data('.$key->id.')">'.$key->card_name.'</a>
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
		if($data_set->num_rows() > 0){
			return $data_set->result();
		}else{
			return false;
		}
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
				$output .= '<tr class="" id="'.str_replace('%20',' ',$key).'">
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
                                                <a href="javascript:;" class="" onclick=myOnClickChange("'.str_replace('%20',' ',$key).'")>
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
						$output .= '<tr class="" id="'.str_replace('%20',' ',$key).'">
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
		                                                <a href="javascript:;" class="" onclick=myOnClickShowChange("'.str_replace('%20',' ',$key).'")>
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