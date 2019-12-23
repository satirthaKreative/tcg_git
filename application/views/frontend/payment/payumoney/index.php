<?php



if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){

	//Request hash

	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	

	if(strcasecmp($contentType, 'application/json') == 0){

		$data = json_decode(file_get_contents('php://input'));

		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);

		$json=array();

		$json['success'] = $hash;

    	echo json_encode($json);

	

	}

	exit(0);

}

 

function getCallbackUrl()

{

	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

	return base_url('Payment/response/');

}



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PayUmoney BOLT PHP7 Kit</title>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<!-- this meta viewport is required for BOLT //-->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >

<!-- BOLT Sandbox/test //-->

<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-

color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>


<!-- Fonts -->

<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,900|Orbitron:400,700&amp;display=swap" rel="stylesheet">

<!-- BOLT Production/Live //-->

<!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->



</head>





<style type="text/css">

	* {

	    box-sizing: border-box;

	    -webkit-box-sizing: border-box;

	    margin: 0;

		padding: 0;

	}
	body {
	    font-size: 14px;
	    -webkit-font-smoothing: antialiased;
	    font-family: 'Raleway', sans-serif;
	}

	section.payment_sec {
	    margin-bottom: 40px;
	    background-image: url(https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/inner-pattern.png);
	    background-repeat: no-repeat;
	    background-size: cover;
        padding: 70px 0;
	}

	/* .main {

		margin-left:30px;

		font-family:Verdana, Geneva, sans-serif, serif;

	} */

	.text {

		float:left;

		width:190px;

	}





	/***** Custom css ****/
	header.tg_header {
	    border-bottom: 1px solid #eee;
	    padding: 5px 0;
	    box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.1);
	}
	header.tg_header a.logo {
	    display: block;
	    max-width: 50px;
	}
	img {
	    max-width: 100%;
	}
	.container {
	    max-width: 1140px;
	    margin: auto;
	}
	.main {
	    max-width: 420px;
	    margin: auto;
	    border: 1px solid #eee;
	    border-radius: 6px;
	    background-color: #ffffff;
	    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
	    -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
	}



	.main .header {

	    text-align: center;

	    background-color: #f9f9f9;

	    padding: 10px;

	}

	.main .header img {

	    margin-bottom: 10px;

	}

	.main form {

	    padding: 14px;

	}
	.dv.hidden {
	    display: none;
	}
	.main form .dv {

	    margin-bottom: 15px;

	}

	.main form .dv span {

	    overflow: hidden;

	    display: inline-block;

	}

	.main form .dv label {

	    font-size: 15px;

	    text-align: right;

	}

	.main form .dv input {
	    height: 40px;
	    border: 1px solid #ddd;
	    padding: 10px;
	    width: 100%;
	}

	.main form input[type="submit"] {
	    width: 100%;
	    padding: 12px;
	    background-color: #b31605;
	    border: 1px solid #b31605;
	    font-size: 16px;
	    color: #ffffff;
	}


	.footer_sec {
		background-color: #000;
	    text-align: center;
	    padding: 12px;
	}
	.footer_sec p {
	    margin: 0;
	    color: #ababab;
	}

	@media screen and (max-width: 568px) {
		section.payment_sec {
		    padding: 50px 10px 0;
		}
		.main form .dv span {
		    width: 100%;
		    margin-bottom: 8px;
		}
	}
	
	@media screen and (max-width: 767px) {
		header.tg_header a.logo {
		    max-width: 70px;
		    margin: auto;
		    background-color: #fff;
		    padding: 8px;
		    border-radius: 50%;
		    height: 70px;
		    margin-bottom: -20px;
		    position: relative;
		    z-index: 99;
		    box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.1);
		}
	}



</style>





<body>

	<header class="tg_header">
		<div class="container">
			<a href="javascript:void(0);" class="logo">
				<img class="d-none" src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/logo.png">
			</a>
		</div>
	</header>


	<section class="payment_sec">
		<div class="main">

			<div class="header">

		    	<img src="<?= base_url('assets/payumoney/images/payumoney.png'); ?>" />

		    	<h3>PHP7 BOLT Kit</h3>

		    </div>





			<form action="#" id="payment_form">

		    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />

		    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />

		    <div class="dv hidden">

		    <span class="text"><label>Merchant Key:</label></span>

		    <span><input type="text" id="key" name="key" placeholder="Merchant Key" value="RwRblfoh" /></span>

		    </div>

		    

		    <div class="dv hidden">

		    <span class="text"><label>Merchant Salt:</label></span>

		    <span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="EdBr4wvptZ" /></span>

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>Transaction/Order ID:</label></span>

		    <span><input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" readonly=""/></span>

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>Amount:</label></span>

		    <span><input type="text" id="amount" name="amount" placeholder="Amount" value="<?= $_SESSION['buy_time_slot_price']; ?>" readonly=""/></span>    

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>Product Info:</label></span>

		    <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="<?= $_SESSION['buy_time_view']; ?>"  readonly=""/></span>

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>First Name:</label></span>

		    <span><input type="text" id="fname" name="fname" placeholder="First Name" value="" /></span>

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>Email ID:</label></span>

		    <span><input type="text" id="email" name="email" placeholder="Email ID" value="" /></span>

		    </div>

		    

		    <div class="dv">

		    <span class="text"><label>Mobile/Cell Number:</label></span>

		    <span><input type="text" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="" /></span>

		    </div>

		    

		    <div class="dv hidden">

		    <span class="text"><label>Hash:</label></span>

		    <span><input type="text" id="hash" name="hash" placeholder="Hash" value="p6S2uGTU49Ns5864u8lleKa8ePBIDcIvTkgfPtHhscc=" /></span>

		    </div>

		    

		    

		    <div><input type="submit" value="Pay" onclick="launchBOLT(); return false;" /></div>

			</form>

		</div>
</section>

<section class="footer_sec">
    <p>© All rights reserved is a copyright formality indicating</p>
</section>

<script type="text/javascript"><!--

$('#payment_form').bind('keyup blur', function(){

	$.ajax({

          url: '<?= base_url('Payment') ?>',

          type: 'post',

          data: JSON.stringify({ 

            key: $('#key').val(),

			salt: $('#salt').val(),

			txnid: $('#txnid').val(),

			amount: $('#amount').val(),

		    pinfo: $('#pinfo').val(),

            fname: $('#fname').val(),

			email: $('#email').val(),

			mobile: $('#mobile').val(),

			udf5: $('#udf5').val()

          }),

		  contentType: "application/json",

          dataType: 'json',

          success: function(json) {

            if (json['error']) {

			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);

            }

			else if (json['success']) {	

				$('#hash').val(json['success']);

            }

          }

        }); 

});

//-->

</script>

<script type="text/javascript"><!--

function launchBOLT()

{

	bolt.launch({

	key: $('#key').val(),

	txnid: $('#txnid').val(), 

	hash: $('#hash').val(),

	amount: $('#amount').val(),

	firstname: $('#fname').val(),

	email: $('#email').val(),

	phone: $('#mobile').val(),

	productinfo: $('#pinfo').val(),

	udf5: $('#udf5').val(),

	surl : $('#surl').val(),

	furl: $('#surl').val(),

	mode: 'dropout'	

},{ responseHandler: function(BOLT){

	console.log( BOLT.response.txnStatus );		

	if(BOLT.response.txnStatus != 'CANCEL')

	{

		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.

		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +

		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +

		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +

		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +

		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +

		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +

		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +

		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +

		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +

		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +

		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +

		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +

		'</form>';

		var form = jQuery(fr);

		jQuery('body').append(form);								

		form.submit();

	}

},

	catchException: function(BOLT){

 		alert( BOLT.message );

	}

});

}

//--

</script>	



</body>

</html>