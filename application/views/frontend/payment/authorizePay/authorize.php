<html>
	<head>
		<title>Payment</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="panel">
		    <div class="panel-heading">
		        <h3 class="panel-title">Authorize.Net</h3>
		    </div>
		    <div class="panel-body">
				
		        <!-- Payment form -->
		        <form action="<?= base_url('Authorize/pushPayment/') ?>" method="POST">
		        	<div class="form-group">
		        	    <label>Product</label>
		        	    <input type="text" value="<?= $_SESSION['buy_time_view']; ?>" name="product" placeholder="Enter Product" readonly>
		        	</div>
		        	<div class="form-group">
		        	    <label>Price</label>
		        	    <input type="text" value="<?= $_SESSION['buy_time_slot_price']; ?>" name="price_d" placeholder="Enter Price" readonly="">
		        	</div>
		            <div class="form-group">
		                <label>NAME</label>
		                <input type="text" name="fullname" placeholder="Enter name" required="" autofocus="">
		            </div>
		            <div class="form-group">
		                <label>EMAIL</label>
		                <input type="email" name="email" placeholder="Enter email" required="">
		            </div>
		            <div class="form-group">
		                <label>CARD NUMBER</label>
		                <input type="text" name="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
		            </div>
		            <div class="row">
		                <div class="left">
		                    <div class="form-group">
		                        <label>EXPIRY DATE</label>
		                        <div class="col-1">
		                            <input type="text" name="card_exp_month" placeholder="MM" required="">
		                        </div>
		                        <div class="col-2">
		                            <input type="text" name="card_exp_year" placeholder="YYYY" required="">
		                        </div>
		                    </div>
		                </div>
		                <div class="right">
		                    <div class="form-group">
		                        <label>CVC CODE</label>
		                        <input type="text" name="card_cvc" placeholder="CVC" autocomplete="off" required="">
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="form-group">
		            		<label for="">Address</label>
		            		<textarea name="cAddress" class="form-control" id="" cols="30" rows="10"></textarea>
		            	</div>
		            </div>
		            <button type="submit" class="btn btn-success">Submit Payment</button>
		        </form>
		    </div>
		</div>
	</body>
</html>