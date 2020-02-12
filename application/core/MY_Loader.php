<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Loader extends CI_Loader
	{
	    public function __construct()
	    {
	        parent::__construct();
	    }

	    public function font_page($page_name,$arr = array())
	    {
	    	$this -> view('frontend/inc/header');
	    	$this -> view($page_name,$arr);
	    	$this -> view('frontend/inc/footer');
	    }

	    public function admin_login_page($page_name,$arr = array())
	    {
	    	$this -> view($page_name,$arr);
	    }

	   	public function admin_pages($page_name,$arr = array())
	   	{
	   		$this -> view('backend/inc/header');
	   		$this -> view('backend/inc/sidebar');
	   		$this -> view($page_name,$arr);
	   		$this -> view('backend/inc/footer');
	   	} 
	} 
?>