<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Orbitron:400,700&amp;display=swap" rel="stylesheet">

	<title>PayPal Error</title>

	<style>

 	* {

        box-sizing: border-box;

        -webkit-box-sizing: border-box;

        margin: 0;

        padding: 0;

    }

    body {
        font-size: 14px;
        -webkit-font-smoothing: antialiased;
        font-family: 'Open Sans', sans-serif;
    }
    .container {
	    max-width: 1140px;
	    margin: auto;
	}

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

	

	.error {
	    height: 100vh;
	    padding: 60px 0;
	    text-align: center;
	}

	.error img {
	    max-width: 120px;
	    margin: 4rem 0 15px;
	}

	.error h3.title {
	    font-size: 25px;
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

	</style>

</head>



<body>

	<header class="tg_header">
	    <div class="container">
	        <a href="javascript:void(0);" class="logo">
	            <img class="" src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/logo.png">
	        </a>
	    </div>
	</header>

	<div class="error">
		<img src="<?= base_url('assets/payumoney/images/invalid_card.png'); ?>" />
		<h3 class="title">Your card deatils is not valid</h3>
	</div>

	<?php

	echo '<pre />';

	print_r($Errors);

	?>

	<section class="footer_sec">
        <p>© All rights reserved is a copyright formality indicating</p>
    </section>

</body>

</html>