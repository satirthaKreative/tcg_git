<html>
<head>
<title>Angell EYE PayPal Payments Pro CodeIgniter Library Demo</title>

<!-- <style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 20px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
 overflow:auto;
}
</style>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script> -->

</head>
<body>
    <form action="<?php echo site_url('paypal/samples/payments_pro/do_direct_payment')?>" method="post">
        <div class="form-group">
            <label >Payment Action</label>
            <input type="text" name="Paymentaction" class="form-control" value="Sale" placeholder="">
        </div>
        <div class="form-group">
            <label >Creditcardtype</label>
            <select class="form-control" name="creditcardtype">
                <option value="Master" selected="selected">Master card</option>
                <option value="Visa">Visa</option>
            </select>
        </div>
        <div class="form-group">
            <label >acct</label>
            <input type="text" name="acct" class="form-control" value="4032036545137265" placeholder="">
        </div>
        <div class="form-row date">
            <div class="form-group">
                <label >Expiration MDate</label>
                <div class="input-group date">
                    <input type="text" name="expM" value="02" class="form-control" id="datepicker">
                    
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-group">
                <label >Expiration YDate</label>
                <div class="input-group date">
                    <input type="text" name="expY" value="2025" class="form-control" id="datepicker">
                    
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-group">
                <label >CVV</label>
                <input type="text" name="CVV2" value="123" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="Email" value="test@domain.com" class="form-control" placeholder="">
        </div>
        
        
        <div class="form-group">
            <label>first name</label>
            <input type="text" name="fname" value="Tester" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label>last name</label>
            <input type="text" name="lname" value="Testerson" class="form-control" placeholder="100 Main St New York , NY 55555">
        </div>
        <div class="form-group">
            <label>Contact</label>
            <input type="number" name="Contact" value="5555555555" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label>Street</label>
            <input type="text" name="Street" value="123 Test Ave." class="form-control" placeholder="100 Main St New York , NY 55555">
        </div>
        <div class="form-group">
            <label>Street 2</label>
            <input type="text" name="Street2" class="form-control" value="" placeholder="St New York , NY 55555">
        </div>
        <div class="form-group">
            <label >State</label>
            <select class="form-control" name="State">
                <option value="MO">MO</option>
            </select>
        </div>
        <div class="form-row local">
            <div class="form-group">
                <label >City</label>
                <select class="form-control" name="City">
                    <option value="Kansas City">Kansas City</option>
                </select>
            </div>
            
            <div class="form-group">
                <label >Country Code</label>
                <input type="text" value="US" name="CountryCode" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label >ZIP</label>
                <input type="number" value="64111" name="ZIP" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="form-row currency">
            <div class="form-group">
                <label >Amount</label>
                <div class="input-currency">
                    <input type="number" value="100.00" name="Amount" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label >Currency Code</label>
                <input type="text" value="USD" name="CurrencyCode" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label >Product</label>
                <input type="text" name="product_name" value="2 hours" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="form-group">
            <label>Desc</label>
            <textarea rows="4" placeholder="Comments" name="Desc">Web Order</textarea>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
</body>
</html>
