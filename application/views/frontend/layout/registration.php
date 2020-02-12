

<section class="banner_section2">
    <img src="<?= base_url('assets/front_assets/images/register_banner.jpg'); ?>">
    
    <div class="banner_text">
        <div class="container">
            <div class="row">
                <h2>Leveling The Playingfield</h2>
            </div>
        </div>
    </div>

</section>


<section class="register-sec">
    <div class="container">
        <div class="row">
            <div class="registration-content">
                <div class="col-lg-5 left-sec">
                    <div class="price-sec">
                        <h4>$9.99/Month</h4>
                    </div>

                        

                        <ul class="tabs step_section">
                            <li class="active">
                                <span>1</span>
                                <h4>Account Information</h4> 
                            </li>
                            <li>
                                <span>2</span>
                                <h4>Billing Information</h4> 
                            </li>
                        </ul>

                        <div class="step1" style="display: block;" >
                        

                            <h3>Create an account</h3>
                            <form id="reg_form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" placeholder="User name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="user_email" placeholder="Email address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="user_pass" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="user_c_pass" placeholder="Confirm password">
                                </div>
                                <button type="button" class="btn btn-primary" id="sign_up" name="sign_up" onclick="reg_function();">NEXT</button>
                            </form>
                            <center class="sucmsg mt5" style="display: none;" ></center>
                        </div>

                        <div class="step2" style="display: none;">
                            <h3>Proceed to payment</h3>


                                <div class="payment-method">
                                    <label for="card" class="method">
                                        <span class="card-logos mt15">
                                            <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/visa_logo.png">
                                            <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/mastercard_logo.png">
                                        </span>

                                        <span class="radio-input">
                                            <input id="card" type="radio" name="payment" value="card"/> Credit Card
                                        </span>
                                    </label>

                                    <label for="paypal" class="method paypal">
                                        <span class="card-logos mt15">
                                            <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/paypal_logo.png">
                                        </span>
                                        <div class="radio-input">
                                            <input id="paypal" type="radio" name="payment" value="paypal"/> PayPal
                                        </div>
                                    </label>
                                </div>
                                
                                <!-- CREDIT CARD -->
                                <div class="credit_card">
                                    <form action="<?= base_url('FrontAuth/pushPayment/'); ?>" method="post" id="cre_dit_card">
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <!-- <label>Product</label> -->
                                                <input type="hidden" value="1 hours" name="product" class="form-control" placeholder="Enter Product" readonly="">
                                            </div>
                                            <div class="form-group col-12">
                                                <label>Price</label>
                                                <input type="text" value="9.99" name="price_d" class="form-control" placeholder="Enter Price" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" id="card_user_name" name="fullname" class="form-control" placeholder="Enter name" value="<?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?>" required="" autofocus="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="card_user_email" name="email" class="form-control" placeholder="Enter email" value="<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; } ?>" required="">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Card Number</label>
                                                <input type="text" name="card_number" class="form-control" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
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
                                                        <input type="text" name="card_exp_month" class="form-control" placeholder="MM" required="">

                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </div>
                                                     <div class="input-group date">
                                                       <input type="text" name="card_exp_year" class="form-control" placeholder="YYYY" required="">

                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>CVC Code</label>
                                                <input type="text" name="card_cvc" class="form-control" placeholder="CVC" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea name="cAddress" class="form-control" id=""></textarea>
                                        </div>
                                        <div class="btn-section">
                                            <button type="submit" class="btn btn-primary sign-up" >SIGN UP</button>  
                                        </div>
                                    </form>
                                </div>
                                
                                <!--- PAY PAL -->
                                <div class="pay_pal" style="display: none;">
                                    <form action="<?php echo site_url('paypal/samples/payments_pro_f/do_direct_payment')?>" method="post" id="cre_dit_card">
                                    <div class="form-group">
                                        <label>Payment Action</label>
                                        <input type="text" name="Paymentaction" class="form-control" value="Sale" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Credit Card Type</label>
                                        <select class="form-control" name="creditcardtype">
                                            <option value="Master" selected="selected">Master card</option>
                                            <option value="Visa">Visa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Acct</label>
                                        <input type="text" name="acct" class="form-control" value="4032036545137265" placeholder="">
                                    </div>
                                    <div class="form-row date">
                                        <div class="form-group col-5">
                                            <label>Expiry Month</label>
                                            <div class="input-group date">
                                                <input type="text" name="expM" value="02" class="form-control" id="datepicker">
                                                
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <label>Expiry Year</label>
                                            <div class="input-group date">
                                                <input type="text" name="expY" value="2025" class="form-control" id="datepicker">
                                                
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>CVV</label>
                                            <input type="text" name="CVV2" value="123" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" id="paypal_user_email" value="<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; } ?>" class="form-control" placeholder="">
                                    </div>
                                    <?php if(isset($_SESSION['user_name'])){ 
                                        $data = explode(' ',$_SESSION['user_name']); 
                                    } ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>First Name</label>
                                            <input type="text" id="paypal_user_name" name="fname" value="" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="" class="form-control" placeholder="lastname">
                                        </div>
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
                                        <label>State</label>
                                        <select class="form-control" name="State" class="form-control">
                                            <option value="AL">Alabama - AL</option> 
                                            <option value="AK">Alaska - AK </option> 
                                            <option value="AZ">Arizona - AZ </option> 
                                            <option value="AR">Arkansas - AR </option> 
                                            <option value="CA">California - CA </option> 
                                            <option value="CO">Colorado - CO </option> 
                                            <option value="CT">Connecticut - CT </option> 
                                            <option value="DE">Delaware - DE </option> 
                                            <option value="FL">Florida - FL </option> 
                                            <option value="GA">Georgia - GA </option> 
                                            <option value="HI">Hawaii - HI </option> 
                                            <option value="ID">Idaho - ID </option> 
                                            <option value="IL">Illinois - IL </option> 
                                            <option value="IN">Indiana - IN </option> 
                                            <option value="IA">Iowa - IA </option> 
                                            <option value="KS">Kansas - KS </option> 
                                            <option value="KY">Kentucky - KY </option> 
                                            <option value="LA">Louisiana - LA </option> 
                                            <option value="ME">Maine - ME </option> 
                                            <option value="MD">Maryland - MD </option> 
                                            <option value="MA">Massachusetts - MA </option> 
                                            <option value="MI">Michigan - MI </option> 
                                            <option value="MN">Minnesota - MN </option> 
                                            <option value="MS">Mississippi - MS </option> 
                                            <option value="MO">Missouri - MO </option> 
                                            <option value="MT">Montana - MT </option> 
                                            <option value="NE">Nebraska - NE </option> 
                                            <option value="NV">Nevada - NV </option> 
                                            <option value="NH">New Hampshire - NH </option> 
                                            <option value="NJ">New Jersey - NJ </option> 
                                            <option value="NM">New Mexico - NM </option> 
                                            <option value="NY">New York - NY </option> 
                                            <option value="NC">North Carolina - NC </option> 
                                            <option value="ND">North Dakota - ND </option> 
                                            <option value="OH">Ohio - OH </option> 
                                            <option value="OK">Oklahoma - OK </option> 
                                            <option value="OR">Oregon - OR </option> 
                                            <option value="PA">Pennsylvania - PA </option> 
                                            <option value="RI">Rhode Island - RI </option> 
                                            <option value="SC">South Carolina - SC </option> 
                                            <option value="SD">South Dakota - SD </option> 
                                            <option value="TN">Tennessee - TN </option> 
                                            <option value="TX">Texas - TX </option> 
                                            <option value="UT">Utah - UT </option> 
                                            <option value="VT">Vermont - VT </option> 
                                            <option value="VA">Virginia - VA </option> 
                                            <option value="WA">Washington - WA </option> 
                                            <option value="WV">West Virginia - WV </option> 
                                            <option value="WI">Wisconsin - WI </option> 
                                            <option value="WY">Wyoming - WY </option>
                                        </select>
                                    </div>
                                    <div class="form-row local">
                                        <div class="form-group col-md-4">
                                            <label>City</label>
                                            <!-- <select class="form-control" name="City" class="form-control">
                                                <option value="Kansas City">Kansas City</option>
                                            </select> -->

                                            <input type="text" value="Kansas City" name="City" class="form-control" placeholder="">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>Country Code</label>
                                            <input type="text" value="US" name="CountryCode" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>ZIP</label>
                                            <input type="number" value="64111" name="ZIP" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row currency">
                                        <div class="form-group col-md-6">
                                            <label>Amount</label>
                                            <div class="input-currency">
                                                <input type="number" value="9.99" name="Amount" class="form-control" placeholder="pay amount" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Currency Code</label>
                                            <input type="text" value="USD" name="CurrencyCode" class="form-control" placeholder="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Product</label> -->
                                            <input type="hidden" name="product_name" value="2 hours" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Desc</label>
                                        <textarea rows="4" placeholder="Comments" name="Desc" class="form-control">Web Order</textarea>
                                    </div>

                                    
                                    <div class="btn-section">
                                        <button type="submit" class="btn btn-primary sign-up" >SIGN UP</button>  
                                    </div>
                                </div>

                                </form>

                        </div>
                </div>
            
                <div class="col-lg-7 right-sec">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FD-g0Vc64mQ?rel=0&autoplay=1&controls=0&disablekb=0&showinfo=0" allowfullscreen></iframe>
                    </div>
                
                </div>
            </div>

            
        </div>
    </div>
</section>
<div class="modal" id="reg-suc-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="success-checkmark">
          <div class="check-icon">
            <span class="icon-line line-tip"></span>
            <span class="icon-line line-long"></span>
            <div class="icon-circle"></div>
            <div class="icon-fix"></div>
          </div>
        </div>
        <h2>Payment Successful</h2>
      </div>
      
    </div>
  </div>
</div>
<!-- <section class="block_quote">

    <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/contact_img2.png">
</section> -->

<script>

    
    function reg_function(){
        $.ajax({
            url: '<?= base_url('Registration/add_reg'); ?>',
            type: 'post',
            data: $("#reg_form").serialize(),
            dataType: 'json',
            success: function(respones){
                // console.log(event.estimate_err);
                // if(event.no_error == true){
                //     $(".sucmsg").html("<b style='color:green'><i class='fa fa-check'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                //     $('#reg_form').find('input').val('');
                // }else if(event.no_error == false){
                //     $(".sucmsg").html("<b style='color:red'><i class='fa fa-times'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                // }

                if(respones.no_error == true)
                {
                    check_session_set_not();
                    $(".step2").css('display','block');
                    $(".step1").css('display','none');
                    $(".step_section li:first-child").addClass('active');
                    $(".step_section li:nth-child(2)").addClass('active');
                }
                else if(respones.no_error == false)
                {
                    $(".step1").css('display','block');
                    $(".step2").css('display','none');
                    $(".sucmsg").html("<b style='color:red'><i class='fa fa-times'></i> "+respones.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                }
            }
        });
    }
</script>
<script>
    $(function(){
        $('input:radio[name="payment"]').change(function(){
                if ($(this).is(':checked')) {
                    var data = $(this).val();
                    if(data == 'card')
                    {
                        $(".credit_card").css('display','block');
                        $(".pay_pal").css('display','none');
                        // $(".sign-up").attr('onclick','credit_send()');
                    }
                    else if(data == 'paypal')
                    {
                        $(".pay_pal").css('display','block');
                        $(".credit_card").css('display','none');
                        // $(".sign-up").attr('onclick','paypal_send()');
                    }
                }
            });
    })
    // function credit_send(){
    //     $.post("<?= base_url('FrontAuth/pushPayment/'); ?>",function(event){
    //         if(event){
    //             console.log(event);
    //         }
    //     },'JSON');
    // }

    $(function(){
        $("#reg-suc-modal").modal('hide');
        unset_reg_session(<?php if(isset($_SESSION['suc_reg_action'])){ echo $_SESSION['suc_reg_action']; }else{ echo 0; } ?>);
    })

    function unset_reg_session(data){
       if(data != 0){
        $("#reg-suc-modal").modal('show');
        // section data
        setTimeout(function(){
            $.ajax({
                url: '<?= base_url("Registration/unset_session_reg/") ?>',
                type: 'post',
                dataType: 'json',
                success:  function(event_resp){
                    $("#reg-suc-modal").modal('hide');
                }
            });
        },3000);
        setTimeout(function(){ $("#reg-suc-modal").modal('hide'); },4000);
       }else{
        $("#reg-suc-modal").modal('hide');
        // end section data
       }
    }
    
     // session checking
    function check_session_set_not(){
        $.ajax({
            url: '<?= base_url('Registration/check_session_gateway/') ?>',
            type: 'post',
            dataType: 'json',
            success: function(event){
                // user
                $("#card_user_name").val(event[0]);
                $("#card_user_email").val(event[1]);
                // paypal
                $("#paypal_user_name").val(event[0]);
                $("#paypal_user_email").val(event[1]);
            }
        })
    }
</script>