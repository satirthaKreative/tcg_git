<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FrontAuth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('myAuthorize');

		$this->load->model('Auth_model_f');
	}
	public function index(){}

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
		$cardType = $this->input->post('creditcardtype');
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

			$time = strtotime(date('Y-m-d'));
			$final = date("Y-m-d", strtotime("+1 month", $time));

			$arrEmp = [
				'user_name' => $_SESSION['user_name'],
				'user_email' => $_SESSION['user_email'],
				'user_pass' => $_SESSION['upass'],
				'enc_pass' => md5($_SESSION['upass']),
				'arrive_date' => date('Y-m-d'),
				'cNumber' => $cNumber,
				'cexpireDateM' => $cexpireDateM,
				'cexpireDateY' => $cexpireDateY,
				'cvvNumber' => $cvvNumber,
				'cusAddress' => $cusAddress,
				'endDate' => $final,
				'cardType' => $cardType,
				'paymentGateway' => 'Card'
			];

			
		if($this->Auth_model_f->add_insert($arrEmp)){
			$_SESSION['suc_reg_action'] = 1;
			redirect('Registration');
		}else{
			echo "Error";
		}
		}else{
			echo "do";
		}
	}

}

/* End of file FrontAuth.php */
/* Location: ./application/controllers/FrontAuth.php */