<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * 
	 */

	include("./vendor/autoload.php");


	class MyAuthorize
	{
		// global variable
		public $merchanAuthentication;
		public $refId;
		// construct
		public function __construct()
		{
			$this->merchanAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType(); 
			$this->merchanAuthentication->setName("44fPEzd8uxU"); 
			$this->merchanAuthentication->setTransactionKey("6Mk2DE3au3Qm673P");
			$this->refId = 'ref'.time(); 
		}

		public function chargerCreditCard($detCus){	
					$creditCard = new net\authorize\api\contract\v1\CreditCardType();
					$creditCard->setCardNumber($detCus['cNumber']);
					$creditCard->setExpirationDate($detCus['cexpireDateY']."-".$detCus['cexpireDateM']);					 	
					$creditCard->setCardCode($detCus['cvvNumber']);
					$paymentOne = new net\authorize\api\contract\v1\PaymentType();
					$paymentOne->setCreditCard($creditCard);
					$order = new net\authorize\api\contract\v1\OrderType();
					$order->setDescription($detCus['cdesc']);
					// Preparin customer information object
					$billto = new net\authorize\api\contract\v1\CustomerAddressType();
					$billto->setFirstName($detCus['fullName']);
					// $billto->setLastName($detCus['lname']);
					$billto->setAddress($detCus['cusAddress']);
					// $billto->setCity($detCus['city']);
					// $billto->setState($detCus['state']);
					// $billto->setCountry($detCus['country']);
					// $billto->setZip($detCus['zip']);
					// $billto->setPhoneNumber($detCus['phone']);
					$billto->setEmail($detCus['emailAddress']);
					// create transaction 
					$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
					$transactionRequestType->setTransactionType("authCaptureTransaction");
					$transactionRequestType->setAmount($detCus['amount']); 
					$transactionRequestType->setOrder($order);
					$transactionRequestType->setPayment($paymentOne);
					$transactionRequestType->setBillTo($billto);
					$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
					$request->setMerchantAuthentication($this->merchanAuthentication);
					$request->setRefId($this->refId); 				  	
					$request->setTransactionRequest($transactionRequestType);
					$controllerx = new net\authorize\api\controller\CreateTransactionController($request);
					$response = $controllerx->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
					if ($response != null){
					    $tresponse = $response->getTransactionResponse();
					    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") ) {
					      // echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
					      // echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
					    	return  $tresponse->getTransId();
					    }else{
					        return  false;
					    }
					} else{
					      return  false;
					}
				}

	}
?>