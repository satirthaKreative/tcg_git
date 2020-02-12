<section class="inner-page profile-section">

    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg'); ?>">

    <div class="wrapper">



        <div class="container">

            <div class="row">



                <div class="sidebar col-md-3">

                    <div class="pro-section">

                        <div class="img-section">

                            <img src="<?= base_url('assets/front_assets/images/pro_img.png'); ?>">

                        </div>

                        <a href="javascript:void(0);"><?php if(isset($_SESSION['session_user'])){ echo $_SESSION['session_user']; } else { echo "User Profile"; } ?></a>

                    </div>



                    <ul class="appende_tabs">

                        <li>

                            <a href="javascrript:void(0);" class="tablinks active" onclick="openCity(event, 'Communations-info')">Communications Settings</a>

                        </li>

                        <li>

                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'time-info')">Time Settings</a>

                        </li>

                        <li>

                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'account-info')">Account Information</a>

                        </li>

                        <li>

                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'billing-info')">Billing Information</a>

                        </li>

                        <li>

                            <a href="<?= base_url('Logout_font') ?>" >Sign Out</a>

                        </li>

                    </ul>

                </div>



                <div class="page-wrapper col-md-9">

                    

                    <!-- Communations Settings -->

                    <div id="Communations-info" class="communations-settings tabcontent" style="display: block;">

                        

                        <div class="tab_section2">



                            <!-- Material checked -->

                            <div class="switch">

                                <label>

                                    Away

                                    <input type="checkbox" id="check_active_status" onchange="my_activity(<?= $_SESSION["session_data"]; ?>)">

                                    <span class="lever"></span> Available

                                </label>

                            </div>



                            <div class="form-group">

                                <label>Preferred Communication:</label>

                                <select class="form-control">

                                    <option>Text Communication</option>

                                    <option>Audio Communication</option>

                                </select>

                            </div>



                        </div>

                        

                        <div class="form-section2">

                            <div class="form-group">

                                <label>Blocked Users</label>



                                <input type="search" class="form-control" placeholder="Search" id="search_block_user" onkeyup="search_block_check()">



                            </div>

                        </div>



                        <div class="table-content">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <!-- <th scope="col">Unblock</th> -->

                                        <th scope="col">Username</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody id="block_user_provider">

                                    <!-- block user data -->

                                </tbody>

                            </table>

                        </div>





                        <h3>Recent Testing Conversations</h3>



                        <div class="table-content">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <!-- <th scope="col">Unblock</th> -->

                                        <th scope="col">Username</th>

                                        <th scope="col">Communication</th>

                                        <th scope="col">File Type</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <tr>

                                       <!--  <td>

                                            <div class="check-group">

                                                <input type="checkbox" id="Audio">

                                                <label for="Audio"></label>

                                            </div>

                                        </td> -->

                                        <td>John Deo</td>

                                        <td>Audio</td>

                                        <td>.WAV <a href="" class="d_load"><i class="fa fa-download" aria-hidden="true"></i></a></td>

                                    </tr>



                                    <tr>

                                        <!-- <td>

                                            <div class="check-group">

                                                <input type="checkbox" id="Docx">

                                                <label for="Docx"></label>

                                            </div>

                                        </td> -->

                                        <td>Mick Hussy</td>

                                        <td>Audio</td>

                                        <td>.TXT <a href="" class="d_load"><i class="fa fa-download" aria-hidden="true"></i></a></td>

                                    </tr>



                                    <tr>

                                        <!-- <td>

                                            <div class="check-group">

                                                <input type="checkbox" id="Audio2">

                                                <label for="Audio2"></label>

                                            </div>

                                        </td> -->

                                        <td>Anna Bell</td>

                                        <td>Audio</td>

                                        <td>.WAV <a href="" class="d_load"><i class="fa fa-download" aria-hidden="true"></i></a></td>

                                    </tr>

                                    

                                </tbody>

                            </table>

                        </div>

                    </div>





                    <!-- Time Settings -->

                    <div id="time-info" class="time-settings tabcontent">

                        <div class="timer-section">

                            <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/clock-icon.png">



                            <div class="progress-area">

                                <div class="progress">

                                    <div class="progress-bar" style="width:<?= $_SESSION['voult_percentage_show'] ?>%"></div>

                                </div>



                                <ul class="percentage">

                                <li>

                                    <span>

                                        0%

                                    </span>

                                </li>

                                <li>

                                    <span>

                                        25%

                                    </span>

                                </li>

                                <li>

                                    <span>

                                        50%

                                    </span>

                                </li>

                                <li>

                                    <span>

                                        75%

                                    </span>

                                </li>

                                <li>

                                    <span>

                                        100%

                                    </span>

                                </li>

                                </ul>



                            </div>

                        </div>



                        <div class="volte_area">

                            <!-- <h3>

                                Increase Your Vault Volume: <strong>1 Hour for $85.00</strong> Full

                            </h3>

                            <h4>

                                The Incentive Vault is <strong><?= $_SESSION['voult_percentage_show']; ?>%</strong> Full.

                            </h4>

                            <h4>

                                Additional Time Price: <strong>$85.00</strong>

                            </h4> -->

                            <?php 
                            # actual slot of time percentage
                            $percentage_voult_time = $_SESSION['voult_percentage_show'];
                            # total price
                            $total_price_of_voult = ''; 
                            # condition 
                            if($percentage_voult_time <= 25)
                            {
                                $total_price_of_voult = 30;
                            }
                            else if(25<$percentage_voult_time && $percentage_voult_time<75)
                            {
                                $total_price_of_voult = (-(1/2)*$percentage_voult_time)+42.5;
                            }
                            else if($percentage_voult_time >= 75)
                            {
                                $total_price_of_voult = 5;
                            }

                            ?>
                            
                            <h3>Current Vault time price <strong>$<span><?= round($total_price_of_voult,1); ?></span> </strong></h3>

                            <!-- <ul>
                                <li>
                                    <span>If vault time</span> <strong> > 75%</strong>  
                                    <h3>$<span>5</span></h3>
                                </li>
                                <li>
                                   <span>If vault time</span>   <strong> > 25%</strong>  
                                   <h3>$<span>30</span></h3>
                                </li>
                                <li>
                                   <span>If vault time</span>  <strong> < 25% - < 75%</strong>  
                                   <h3>$<span>42.5</span></h3>

                                </li>
                            </ul> -->



                            <button type="button" class="purchase_link" data-toggle="modal" data-target="#volte-purchase">

                                Purchase

                            </button>

                        </div>



                    </div>





                    <!-- Account Information -->

                    <div id="account-info" class="account-information tabcontent" >

                        <form action="">

                            <div class="form-group row">

                                <label class="col-sm-3">User name:</label>

                                <div class="col-sm-9">

                                    <input type="text" id="u_name" class="form-control" placeholder="John Deo">

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-sm-3">Email:</label>

                                <div class="col-sm-9">

                                    <input type="email" id="u_mail" class="form-control" placeholder="johndeo45@test.com">

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-sm-3">Password:</label>

                                <div class="col-sm-9">

                                    <input type="password" id="u_pass" class="form-control" placeholder="Enter password">

                                </div>

                            </div>

                            <span id="sucmsg"></span>  

                            <button type="submit" id="edit_user_profile" class="btn btn-primary">Edit</button>

                            

                        </form>

                    </div>





                    <!-- Billing Information -->

                    <div id="billing-info" class="billing-information tabcontent">







                        

                        <ul class="nav nav-tabs">

                            <li class="nav-item">

                                <a class="nav-link credit_class" onclick="credit_card_show();" href="javascript:void(0);">Credit Card</a>

                            </li>

                           <li class="nav-item">

                                <a class="nav-link paypal_class" onclick="paypal_show();" href="javascript:void(0);">Paypal</a>

                            </li>

                        </ul>





                        <p class="succ-form-data"></p>





                        <div class="tab-pane" id="credit_card_tab">

                            <form action="" id="edit_card_profile_form">

                                <div class="form-group col-sm-6">

                                    <label>Full Name:</label>

                                    <input type="text" name="full_name" class="form-control" placeholder="John Deo" id="fullname_view">

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Billing Address:</label>

                                    <input type="text" class="form-control" name="billing_address" placeholder="100 Main St New York , NY 55555" id="billing_address_view">

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Credit Card:</label>

                                    <select class="form-control" id="credit_card_view" name="creditt_card_view">

                                        <option value="">Choose a card type</option>

                                        <option value="Visa">Visa Card</option>

                                        <option value="Master">Master Card</option>

                                    </select>

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Credit Card Number:</label>

                                    <input type="text" id="credit_card_number" class="form-control" placeholder="" name="credit_card_number">

                                </div>



                                <div class="form-group col-sm-6">

                                    <label>Expiration Date:</label>



                                    <div class="form-row cr_date">

                                                <div class="input-group date col-6">

                                                    <input type="text" id="exp_month_card" name="card_exp_month" class="form-control" placeholder="MM" required="">



                                                    <i class="fa fa-calendar" aria-hidden="true"></i>

                                                </div>

                                                 <div class="input-group date col-6">

                                                   <input type="text" id="exp_year_card" name="card_exp_year" class="form-control" placeholder="YYYY" required="">



                                                    <i class="fa fa-calendar" aria-hidden="true"></i>

                                                </div>

                                            </div>





                                    </div>



                                <div class="form-group col-sm-6">

                                    <label>Email:</label>

                                    <input type="email" name="card_email" class="form-control" id="card_email" placeholder="">

                                </div>

                                

                                <div class="btn-section">

                                    <button type="button" class="btn btn-primary" onclick="edit_card_profile()">Edit</button>  

                                </div>

                            </form>

                        </div>



                        <!-- CREDIT CARD // -->





                        <!-- PAYPAL -->

                        <div class="tab-pane" id="paypal_tab">

                            <form action="" id="edit_card_profile_form1">

                                <div class="form-group col-sm-6">

                                    <label>Full Name:</label>

                                    <input type="text" name="full_name" class="form-control" placeholder="John Deo" id="fullname_view1">

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Billing Address:</label>

                                    <input type="text" class="form-control" name="billing_address" placeholder="100 Main St New York , NY 55555" id="billing_address_view1">

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Credit Card:</label>

                                    <select class="form-control" id="credit_card_view1" name="creditt_card_view1">

                                        <option value="">Choose a card type</option>

                                        <option value="Visa">Visa Card</option>

                                        <option value="Master">Master Card</option>

                                    </select>

                                </div>

                                <div class="form-group col-sm-6">

                                    <label>Credit Card Number:</label>

                                    <input type="text" id="credit_card_number1" class="form-control" placeholder="" name="credit_card_number">

                                </div>



                                <div class="form-group col-sm-6">

                                    <label>Expiration Date:</label>



                                    <div class="form-row cr_date">

                                                <div class="input-group date col-6">

                                                    <input type="text" id="exp_month_card" name="card_exp_month1" class="form-control" placeholder="MM" required="">



                                                    <i class="fa fa-calendar" aria-hidden="true"></i>

                                                </div>

                                                 <div class="input-group date col-6">

                                                   <input type="text" id="exp_year_card" name="card_exp_year1" class="form-control" placeholder="YYYY" required="">



                                                    <i class="fa fa-calendar" aria-hidden="true"></i>

                                                </div>

                                            </div>





                                    </div>



                                <div class="form-group col-sm-6">

                                    <label>Email:</label>

                                    <input type="email" name="card_email1" class="form-control" id="card_email" placeholder="">

                                </div>

                                

                                <div class="btn-section">

                                    <button type="button" class="btn btn-primary" onclick="edit_paypal_profile()">Edit</button>  

                                </div>

                            </form>

                        </div>

                        <!-- PAYPAL // -->

                    </div>



                </div>



            </div>





            <div class="ad-section2">

                <img src="<?= base_url('assets/front_assets/images/card_add2.png'); ?>">

            </div>





        </div>

    </div>

            

</section>





<!-- Modal -->

<div class="modal fade" id="volte-purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Choose Your Payment Method</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form>

            <div class="payment-method">

                <label for="card" class="method">

                    <span class="card-logos mt15">

                        <img src="<?= base_url('assets/front_assets/'); ?>images/visa_logo.png"/>

                        <img src="<?= base_url('assets/front_assets/'); ?>images/mastercard_logo.png"/>

                    </span>



                    <span class="radio-input">

                        <input id="card" type="radio" name="payment" value="card" checked="checked"> Credit card

                    </span>

                </label>



                <label for="paypal" class="method paypal">

                    <span class="card-logos mt15">

                        <img src="<?= base_url('assets/front_assets/'); ?>images/paypal_logo.png"/>

                    </span>

                    <div class="radio-input">

                        <input id="paypal" type="radio" name="payment" value="paypal"> paypal

                    </div>

                </label>

            </div>



            <div class="payment">

                <label >You will purchase</label>

                <select class="purchase-time" onchange="check_time_value()">

                    

                </select>

                <span class="prevent_btn"></span>

                <!--<p>With your credit card ending in **** **** **** 1245</p>-->



                <a id="prevent_btn" href="javascript:void(0);" onclick="Payment();">Purchase</a>



            </div>



        </form>



      </div>





    </div>

  </div>

</div>

<script>


// block function 

function block_users_by_requester(block_gl_data){
    $.ajax({
        url: '<?= base_url("Blocked_controller/check_total_providers/") ?>'+block_gl_data,
        type: 'post',
        dataType: 'json',
        success: function(response){
            $("#block_user_provider").html(response.total_providers_list);
        }, error:  function(response){
            // alert('js1');
        }
    })
}

// block active

function block_active(block_id,blocked_by)
{
    $.ajax({
        url: '<?= base_url("Blocked_controller/block_active/") ?>',
        type: 'post',
        data: {block_id: block_id,blocked_by: blocked_by},
        dataType: 'json',
        success: function(response){
            var zero_send = 0;
            block_users_by_requester(zero_send);
            // $("#block_user_provider").html(response.total_providers_list);
        }, error:  function(response){
            // alert('js1');
        }
    })
}

// unblock active

function block_deactive(block_id,blocked_by)
{
    $.ajax({
        url: '<?= base_url("Blocked_controller/block_deactive/") ?>',
        type: 'post',
        data: {block_id: block_id,blocked_by: blocked_by},
        dataType: 'json',
        success: function(response){
            var zero_send = 0;
            block_users_by_requester(zero_send);
            // $("#block_user_provider").html(response.total_providers_list);
        }, error:  function(response){
            // alert('js1');
        }
    })
}

// search block user

function search_block_check()
{
    var block_search_data = jQuery("#search_block_user").val();
    block_users_by_requester(block_search_data);
}
    

</script>

<script type="text/javascript">

                       



        function openCity(evt, cityName) {

            if(cityName == 'account-info')

            {

                account_settings();

            }

          var i, tabcontent, tablinks;

          tabcontent = document.getElementsByClassName("tabcontent");

          for (i = 0; i < tabcontent.length; i++) {

            tabcontent[i].style.display = "none";

          }

          tablinks = document.getElementsByClassName("tablinks");

          for (i = 0; i < tablinks.length; i++) {

            tablinks[i].className = tablinks[i].className.replace(" active", "");

          }

          document.getElementById(cityName).style.display = "block";

          evt.currentTarget.className += " active";

        }

 



</script>

<script>

    function credit_card_show()

    {

        $('#paypal_tab').css('display','none');

        $('#credit_card_tab').css('display','block');

        $('.credit_class').addClass('active');

        $('.paypal_class').removeClass('active');

        jio_card_choose = 0;

        call_card_data(<?= $_SESSION['session_data']; ?>);

        // alert(jio_card_choose);

    }



    function paypal_show()

    {

        $('#paypal_tab').css('display','block');

        $('#credit_card_tab').css('display','none');

        $('.paypal_class').addClass('active');

        $('.credit_class').removeClass('active');

        jio_card_choose = 1;

        call_paypal_data(<?= $_SESSION['session_data']; ?>);

        // alert(jio_card_choose);

    }

</script>

 <script>

     // activity details

     $(function(){
        var global_block_search_data = 0;
        // call block function
        block_users_by_requester(global_block_search_data);
        // end call block function

        $('#paypal_tab').css('display','none');

        $('#credit_card_tab').css('display','block');

        $('.credit_class').addClass('active');

        var jio_card_choose = 0;



         var user_active_session = '<?= $_SESSION["session_data"] ?>';

         var data_new1 = '';

         // console.log(user_active_session);

         $.ajax({

             url: '<?= base_url('UserDesk/activity_of_user/'); ?>'+user_active_session,

             data: data_new1,

             type: 'post',

             dataType: 'json',

             success:  function(event)

             {

                 console.log(event);

                 console.log(event[0].active_state);

                 if(event[0].active_state == 1)

                 {

                     $("#check_active_status").attr("checked","checked");

                     $("#check_active_status").attr("value",1);

                 }

                 else

                 {

                     $("#check_active_status").removeAttr("checked"); 

                     $("#check_active_status").attr("value",0);

                 }

             }

         })

         // call card data

            call_card_data(user_active_session);

            

     })



     function my_activity($data)

     {

         var user_active_session = '<?= $_SESSION["session_data"] ?>';

         var t = $("#check_active_status").val();

         

         if(t == 0)

         {

             $("#check_active_status").attr("value",1);

             t = $("#check_active_status").val();

         }

         else

         {

             $("#check_active_status").attr("value",0);

             t = $("#check_active_status").val();

         }

         $.ajax({

             url: '<?= base_url('UserDesk/update_activity/'); ?>'+user_active_session,

             data: {t:t},

             type: 'post',

             dataType: 'json',

             success: function(event)

             {

                 console.log(event);

             }

         })



     }

 </script>



<!--  Voult Slot -->

<script>

    $(function(){
        var total_time_of_price_voult = parseFloat('<?= $_SESSION["total_price_of_voult_test_new"] ?>');
        $.ajax({

            url : "<?php echo  base_url('Voult_time_controller/index'); ?>",

            type: "POST",

            dataType:  "json",

            success:  function(event)

            {

                console.log(event);

                var html = '';

                for(var i = 0; i<event.length; i++)

                {
                    var price_new_check = event[i].time_slot_price;
                    var convert_price_new_check = (parseFloat(price_new_check)+parseFloat(total_time_of_price_voult));

                    html += "<option value = "+event[i].id+">"+event[i].time_slot+" "+event[i].time_type+" (Price : "+convert_price_new_check+" USD)</option>";

                }

                $(".purchase-time").html(html);

            }

        })

    })

    $(function(){

        $.ajax({

            url : "<?php echo  base_url('Voult_time_controller/index'); ?>",

            type: "POST",

            dataType:  "json",

            success:  function(event)

            {

                console.log(event);

                var html = '';

                    html += "<option value=''>Select Timeframe</option>";

                for(var i = 0; i<event.length; i++)

                {

                    html += "<option value = "+event[i].id+">"+event[i].time_slot+" "+event[i].time_type+" (Price : "+event[i].time_slot_price+" USD)</option>";

                }

                $(".purchase-time").html(html);

            }

        })

    })



    // check time value

    function check_time_value()

    {

        var purchase_time = $(".purchase-time").val();

        // alert(purchase_time);

        $.ajax({

            url: "<?php echo base_url('Voult_time_controller/prevent_buy_time') ?>",

            type: "post",

            data: {purchase_time: purchase_time},

            dataType: "json",

            success:  function(event)

            {

                console.log(event);

                if(event.no_error == true)

                {

                    $("#prevent_btn").attr('onclick','Payment()');

                }

                else if(event.no_error == false)

                {

                    $(".prevent_btn").html("<i class='text-danger'>You can't buy more than 5 hours total time</i>").fadeIn().delay(3000).fadeOut('slow');

                    $("#prevent_btn").removeAttr('onclick');

                }

            }

        })

    }



    // payment

    function Payment()

    {

        var parchase_time = $('.purchase-time').val();

        $.ajax({

            url: "<?php echo base_url('Voult_time_controller/session_create'); ?>",

            type: "post",

            data: {parchase_time: parchase_time},

            dataType: "json",

            success:  function(event)

            {

               console.log(event); 

               window.location.href="<?= base_url('Payment/'); ?>";

            }

        });

    }

</script>



<!-- Account settings -->

<script>

    function account_settings()

    {

        $.ajax({

            url: '<?= base_url("ChatController/account_settings/") ?>',

            type: 'post',

            dataType: 'json',

            success:  function(event)

            {

                var html = '';

                $("#u_name").val(event[0].user_name);

                $("#u_mail").val(event[0].user_email);

                $("#u_pass").val(event[0].user_pass);

            }

        })

    }



    



    $("#edit_user_profile").click(function(event){

        event.preventDefault();

        var u_name = $("#u_name").val();

        var u_mail = $("#u_mail").val();

        var u_pass = $("#u_pass").val();

        alert(u_name);

        alert(u_mail);

        $.ajax({

            url: '<?= base_url("ChatController/edit_user_profile/") ?>',

            type: 'post',

            data: {u_name: u_name,u_mail: u_mail,u_pass: u_pass},

            dataType: 'json',

            success: function(event)

            {

                if(event.no_error == true)

                {

                    $("#sucmsg").html("<i class='text-success'>Successfully Updated </i>").fadeIn().delay(3000).fadeOut('slow');

                }

                else if(event.no_error == false)

                {

                    $("#sucmsg").html("<i class='text-danger'>Try Again! Server Not Responding </i>").fadeIn().delay(3000).fadeOut('slow');

                }

            }

        })

    })

</script>





<script>

    function call_card_data(data)

    {

        $.ajax({

            url: '<?= base_url("Registration/all_details/"); ?>'+data,

            type: 'post',

            dataType: 'json',

            success: function(resp){

                $("#fullname_view").val(resp[0].user_name);

                $("#card_email").val(resp[0].user_email);

                $("#credit_card_number").val(resp[0].cNumber);

                $("#exp_month_card").val(resp[0].cexpireDateM);

                $("#exp_year_card").val(resp[0].cexpireDateY);

                $("#billing_address_view").val(resp[0].cusAddress);

                var html = '';

                if(resp[0].cardType == 'Master' || resp[0].cardType == 'master')

                {

                    html += '<option value="Master" selected>Master Card</option><option value="Visa">Visa Card</option>';

                }

                else if(resp[0].cardType == 'Visa' || resp[0].cardType == 'Visa')

                {

                    html += '<option value="Master">Master Card</option><option value="Visa" selected>Visa Card</option>';

                }

                else

                {

                    html += '<option value="Master">Master Card</option><option value="Visa">Visa Card</option>'; 

                }

                $("#credit_card_view").html(html);

            },

            error: function(resp){

                var html = '';

                html += '<option value="Master">Master Card</option><option value="Visa">Visa Card</option>'; 

                $("#credit_card_view").html(html);

            }

        });

    }



    function call_paypal_data(data)

    {

        $.ajax({

            url: '<?= base_url("Registration/all_paypal_details/"); ?>'+data,

            type: 'post',

            dataType: 'json',

            success: function(resp){

                $("#fullname_view1").val(resp[0].user_name);

                $("#card_email1").val(resp[0].user_email);

                $("#credit_card_number1").val(resp[0].cNumber);

                $("#exp_month_card1").val(resp[0].cexpireDateM);

                $("#exp_year_card1").val(resp[0].cexpireDateY);

                $("#billing_address_view1").val(resp[0].cusAddress);

                var html = '';

                if(resp[0].cardType == 'Master' || resp[0].cardType == 'master')

                {

                    html += '<option value="Master" selected>Master Card</option><option value="Visa">Visa Card</option>';

                }

                else if(resp[0].cardType == 'Visa' || resp[0].cardType == 'Visa')

                {

                    html += '<option value="Master">Master Card</option><option value="Visa" selected>Visa Card</option>';

                }

                else

                {

                    html += '<option value="Master">Master Card</option><option value="Visa">Visa Card</option>'; 

                }

                $("#credit_card_view1").html(html);

            },

            error: function(resp){

                var html = '';

                html += '<option value="Master">Master Card</option><option value="Visa">Visa Card</option>'; 

                $("#credit_card_view1").html(html);

            }

        });

    }

    // edit function

    function edit_card_profile()

    {

        var sess_data_form = "<?= $_SESSION['session_data']; ?>";

        alert(sess_data_form);

        $.ajax({

            url: '<?= base_url("Registration/edit_all_data/") ?>'+sess_data_form,

            type: 'post',

            data: $("#edit_card_profile_form").serialize(),

            dataType: 'json',

            success:  function(event){

                if(event.no_error == true){

                    $(".succ-form-data").html("<b class='text-success'>"+event.no_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }else if(event.no_error == false){

                    $(".succ-form-data").html("<b class='text-danger'>"+event.no_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }

            },

            error: function(event){



            }

        })

    }

    // edit paypal  profile section

    function edit_paypal_profile()

    {

        var sess_data_form = "<?= $_SESSION['session_data']; ?>";

        alert(sess_data_form);

        $.ajax({

            url: '<?= base_url("Registration/edit_all_data/") ?>'+sess_data_form,

            type: 'post',

            data: $("#edit_card_profile_form1").serialize(),

            dataType: 'json',

            success:  function(event){

                if(event.no_error == true){

                    $(".succ-form-data").html("<b class='text-success'>"+event.no_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }else if(event.no_error == false){

                    $(".succ-form-data").html("<b class='text-danger'>"+event.no_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }

            },

            error: function(event){



            }

        })

    }

</script>