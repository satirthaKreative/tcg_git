<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProviderDesk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data_arr = array();
        $this->load->font_page('frontend/layout/provider-desk',$data_arr);
    }

}

/* End of file ProviderDesk.php */
/* Location: ./application/controllers/ProviderDesk.php */