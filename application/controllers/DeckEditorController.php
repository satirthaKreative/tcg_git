<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeckEditorController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('DeckEditorModel','dem');
		$this->load->library('pagination');
	}
	// index page
	public function index()
	{

	}
	// all card data
	public function pagination()
	{	
		
		$config = [
			'base_url' => '#',
			'total_rows' => $this->dem->count_total_rows(),
			'per_page' => 1000,
			'uri_segment' => 3,
			'use_page_numbers' => TRUE,
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li class='page-item'>",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li class='page-item'>",
			'prev_tag_close' => "</li>",
			'num_tag_open' => "<li class='page-item'>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
			'cur_tag_close' => "</a></li>",
			'first_link' => 'First',
			'last_link' => 'Last',
			'next_link' => '&gt;',
			'prv_link' => '&gt;',
			'first_tag_open' => "<li class='page-item'>",
			'first_tag_close' => '</li>',
			'last_tag_open' => "<li class='page-item'>",
			'last_tag_close' => '</li>',
			'num_links' => 1
		];
		
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page-1)*$config['per_page'];
		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'total_cards' => $this->dem->allDetails($config['per_page'],$start)
		);
		echo  json_encode($output);
	}

	// all card data
	public function pagination_search()
	{
		
		$search_card_data = $_POST['search_card_data'];
		$output = array(
			'total_cards' => $this->dem->pagination_search($search_card_data)
		);
		echo  json_encode($output);
	}
	// show card details 
	public function show_card_data()
	{
		$result_data = $_POST['val'];
		$output = array(
			'pagination_link' => $this->dem->show_card_data($result_data),
		);
		echo json_encode($output);
	}
	//
	public function formatPage()
	{
		$result = $this->dem->formatPage();
		echo json_encode($result);
	}
	// 
	public function card_addition($data_list)
	{
		$output = array(
			'pagination_link' => $this->dem->card_addition($data_list),
		);
		echo json_encode($output);
	}
	// 
	public function onclickDownData($data_list)
	{
		$output = array(
			'pagination_link' => $this->dem->onclickDownData($data_list),
		);
		echo json_encode($output);
	}
	public function checking_card_addition()
	{
		$output = array(
			'pagination_link' => $this->dem->checking_card_addition(),
		);
		echo json_encode($output);
	}

	public function unset_session_card()
	{
		unset($_SESSION["new_card_session"]);
		unset($_SESSION["new_sidear_card_session"]);
		$_SESSION['new_card_session'] = array();
		$_SESSION['new_sidear_card_session'] = array();
	}

	public function card_sidebar_addition($data_list)
	{
		$output = array(
			'pagination_link' => $this->dem->card_sidebar_addition($data_list),
		);
		echo json_encode($output);
	}


	public function removeDataMainDeck($data_list)
	{
		$result = $this->dem->removeDataMainDeck($data_list);
		echo  json_encode($result);
	}

	# edit deck data with details

	public function edit_deck_data()
	{
		# card name
		$card_name = $_POST['card_name'];
		
		# deck type
		$decktype = $_POST['decktype'];
		
		# comment
		$comment =  $_POST['comment'];
		// echo json_encode($comment);
		#condition
		if($result = $this->dem->edit_deck_data($card_name,$decktype,$comment))
		{
			// echo json_encode($result);
			$errors['no_error'] = true;
		}
		else
		{
			$errors['no_error'] = false;
		}
		echo  json_encode($errors);
	}

	# save deck data with details

	public function save_deck_data()
	{
		# card name
		$card_name = $_POST['card_name'];
		
		# deck type
		$decktype = $_POST['decktype'];
		
		# format
		$format_scl =  $_POST['format_scl'];
		// echo json_encode($comment);
		#condition
		if($result = $this->dem->save_deck_data($card_name,$decktype,$format_scl))
		{
			// echo json_encode($result);
			$errors['no_error'] = true;
		}
		else
		{
			$errors['no_error'] = false;
		}
		echo  json_encode($errors);
	}


}

/* End of file DeckEditorController.php */
/* Location: ./application/controllers/DeckEditorController.php */