<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('myAuthorize');

		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->font_page('frontend/payment/authorizePay/authorize');
	}

	public function pushPayment()
	{
		$fullname = $this->input->post('fullname');
		$cNumber=$this->input->post('card_number');
		$cexpireDateM=$this->input->post('card_exp_month');
		$cexpireDateY=$this->input->post('card_exp_year');
		$cvvNumber=$this->input->post('card_cvc');
		$cusAddress=$this->input->post('cAddress');
		$emailAddress=$this->input->post('email');
		$cdesc= $this->input->post('product');
		$amount = $this->input->post('price_d');
		// create users
		$createUsers = array(
			"fullName"=>$this->input->post('fullname'),
			"cNumber"=>$this->input->post('card_number'),
			"cexpireDateM"=>$this->input->post('card_exp_month'),
			"cexpireDateY"=>$this->input->post('card_exp_year'),
			"cvvNumber"=>$this->input->post('card_cvc'),
			"cusAddress"=>$this->input->post('cAddress'),
			"emailAddress"=>$this->input->post('email'),
			"cdesc" => $this->input->post('product'),
			"amount" => $this->input->post('price_d'),
		);
		

		$result = $this->myauthorize->chargerCreditCard($createUsers);
		if($result!= false){
			$arrEmp = [
				'orderID' => $result,
				'amount' => $amount,
				'productInfo' => $cdesc,
				'firstname' => $fullname,
				'emailID' => $emailAddress,
				'transactionStatus' => 'success',
				'userID' => $_SESSION['session_data'],
				'cAddress' => $cusAddress,
				'expMonth' => $cexpireDateM,
				'expYear' => $cexpireDateY,
				'payType' => 'Visa',
				'card_number' => $cNumber,
				'typeCard' => 'cardPay'
			];
			
		if($this->Auth_model->add_insert($arrEmp)){
			$_SESSION['status'] = 'success';
			redirect('Vault');
		}else{
			echo "Error";
		}
		}else{
			echo "do";
		}
	}


}

/* End of file Authorize.php */
/* Location: ./application/controllers/Authorize.php */