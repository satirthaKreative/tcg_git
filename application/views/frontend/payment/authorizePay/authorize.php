<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<title>TCG Portal</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Orbitron:400,700&amp;display=swap" rel="stylesheet">

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
        font-family: 'Open Sans', sans-serif;
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
    .main .header h3.panel-title {
	    font-size: 20px;
	}
    img {
        max-width: 100%;
    }

    section.payment_sec {
        padding-top: 50px;
        height: auto;
        background-image: url(https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/inner-pattern.png);
        background-repeat: no-repeat;
        margin-bottom: 70px;
        background-size: cover;
    }
    .container {
        max-width: 1140px;
        margin: auto;
    }
    .main {
        max-width: 500px;
        margin: auto;
        border: 1px solid #eee;
        border-radius: 6px;
        background-color: #ffffff;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }
    .main .header {
        padding: 15px;
        text-align: center;
        background-color: #fafaff;
        border-bottom: 2px solid #e5e5f1;
    }
    .main .header img {
        max-width: 150px;
    }

    .main form {
        padding: 15px;
    }

	
	.form-control:disabled, .form-control[readonly] {
	    background-color: #e9ecef;
	    opacity: 1;
	}
    .form-group {
        margin-bottom: 1rem;
    }
    label {
        display: inline-block;
        margin-bottom: .5rem;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 48px;
        padding: .375rem .75rem;
        font-size: 15px;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        font-family: 'Open Sans', sans-serif;
    }
    form input, form select {
        height: 45px;
    }
    form select {
        height: 45px;
    }
    .form-row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -5px;
        margin-left: -5px;
    }
    .form-row>.col, .form-row>[class*=col-] {
        padding-right: 5px;
        padding-left: 5px;
    }
    .form-group textarea {
        height: 80px !important;
    }


    .main form button.btn {
        border: 1px solid #730d02;
        width: 100%;
        padding: 15px;
        text-transform: uppercase;
        font-size: 16px;
        background-color: #b31605;
        border-color: #b31605;
        color: #ffffff;
    }

   	.cr_date .input-group {
	    width: 47%;
	    margin: 0 4px;
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

	.col-6 {
	    -ms-flex: 0 0 50%;
	    flex: 0 0 50%;
	    max-width: 50%;
	}
    @media (min-width: 768px) {
        .col-md-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    }
    @media (min-width: 768px) {
        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    @media (min-width: 768px) {
		.col-md-8 {
		    -ms-flex: 0 0 66.666667%;
		    flex: 0 0 66.666667%;
		    max-width: 66.666667%;
		}
	}

	@media screen and (max-width: 767px) {
		.form-row .form-group.col-md-6 {
		    width: 100%;
		}
		.form-group.col-md-8 {
		    width: 75%;
		}
		.form-group.col-md-4 {
		    width: 25%;
		}

	}
	@media screen and (max-width: 568px) {
		.cr_date .input-group {
		    width: 46%;
		}
	}
	@media (max-width: 320px) {
        label {
            font-size: 12px;
        }
        .form-control {
            font-size: 13px;
	        height: 40px;
        }
    }

</style>

	</head>



	<body>

		<header class="tg_header">
	        <div class="container">
	            <a href="<?= base_url(''); ?>" class="logo">
	                <img class="" src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/logo.png">
	            </a>
	        </div>
	    </header>

		<section class="payment_sec">
        	<div class="main">

			    <div class="header">

			        <h3 class="panel-title">Authorize.Net</h3>

			    </div>

		        <!-- Payment form -->

		        <form action="<?= base_url('Authorize/pushPayment/') ?>" method="POST">

		        	<div class="form-row">

			        	<div class="form-group col-6">

			        	    <label>Product</label>

			        	    <input type="text" class="form-control" value="<?= $_SESSION['buy_time_view']; ?>" name="product" placeholder="Enter Product" readonly>

			        	</div>

			        	<div class="form-group col-6">

			        	    <label>Price</label>

			        	    <input type="text" class="form-control" value="<?= $_SESSION['buy_time_slot_price']; ?>" name="price_d" placeholder="Enter Price" readonly="">

			        	</div>
		        	</div>

		        	<div class="form-row">

			            <div class="form-group col-md-6">

			                <label>Name</label>

			                <input type="text" class="form-control" name="fullname" placeholder="Enter name" required="" autofocus="">

			            </div>

			            <div class="form-group col-md-6">

			                <label>Email</label>

			                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">

			            </div>
		            </div>
					
					<div class="form-row">
			            <div class="form-group col-md-6">

			                <label>Card Number</label>

			                <input type="text" class="form-control" name="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">

			            </div>
			            <div class="form-group col-md-6">
						    <label>Credit Card Type</label>
						    <select class="form-control" name="creditcardtype">
						        <option value="Master" selected="selected">Master card</option>
						        <option value="Visa">Visa</option>
						    </select>
						</div>
		            </div>

		            <div class="form-row">

		                <div class="form-group col-md-8">

	                        <label>Expiry Date</label>

	                        <div class="form-row cr_date">
		                        <div class="input-group date">
		                            <input type="text" class="form-control" name="card_exp_month" placeholder="MM" required="">
		                        </div>
		                        <div class="input-group date">

		                             <input type="text" class="form-control" name="card_exp_year" placeholder="YYYY" required="">
		                        </div>     
	                        </div>     

	                    </div>

	                    <div class="form-group col-md-4">

	                        <label>CVC Code</label>

	                        <input type="text" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="off" required="">

		                </div>

	                </div>

	            	<div class="form-group">

	            		<label for="">Address</label>

	            		<textarea name="cAddress" class="form-control" id="" cols="30" rows="10"></textarea>

	            	</div>

		            <button type="submit" class="btn btn-success">Submit Payment</button>

		        </form>

		    </div>

		</section>


        <section class="footer_sec">
            <p>© All rights reserved is a copyright formality indicating</p>
        </section>

	</body>

</html>