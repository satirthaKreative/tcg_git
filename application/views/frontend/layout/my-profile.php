
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
                        <!-- <li>
                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'billing-info')">Billing Information</a>
                        </li> -->
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
                                    <option>Chat Communication</option>
                                    <option>Audio Communication</option>
                                </select>
                            </div>

                        </div>
                        
                        <div class="form-section2">
                            <div class="form-group">
                                <label>Blocked Users</label>

                                <input type="search" class="form-control" placeholder="Search">

                            </div>
                        </div>

                        <div class="table-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Unblock</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Satisfaction Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Johndeo">
                                                <label for="Johndeo"></label>
                                            </div>
                                        </td>
                                        <td>John Deo</td>
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Annabel">
                                                <label for="Annabel"></label>
                                            </div>
                                        </td>
                                        <td>Anna Bell</td>
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Mickhussy">
                                                <label for="Mickhussy"></label>
                                            </div>
                                        </td>
                                        <td>Mick Hussy</td>
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>


                        <h3>Recent Testing Conversations</h3>

                        <div class="table-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Unblock</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Communication</th>
                                        <th scope="col">File Type</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Audio">
                                                <label for="Audio"></label>
                                            </div>
                                        </td>
                                        <td>John Deo</td>
                                        <td>Audio</td>
                                        <td>.WAV</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Docx">
                                                <label for="Docx"></label>
                                            </div>
                                        </td>
                                        <td>Mick Hussy</td>
                                        <td>Audio</td>
                                        <td>.TXT</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Audio2">
                                                <label for="Audio2"></label>
                                            </div>
                                        </td>
                                        <td>Anna Bell</td>
                                        <td>Audio</td>
                                        <td>.WAV</td>
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

                                <ul>
                                    <li>
                                        <span>
                                            0 Hr
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            1 Hr
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2 Hr
                                        </span>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="volte_area">
                            <h3>
                                Increase Your Vault Volume: <strong>1 Hour for $85.00</strong> Full
                            </h3>
                            <h4>
                                The Incentive Vault is <strong><?= $_SESSION['voult_percentage_show']; ?>%</strong> Full.
                            </h4>
                            <h4>
                                Additional Time Price: <strong>$85.00</strong>
                            </h4>

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
                        <form action="">
                            <div class="form-group col-sm-6">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" placeholder="John Deo">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Billing Address:</label>
                                <input type="text" class="form-control" placeholder="100 Main St New York , NY 55555">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Credit Card:</label>
                                <select class="form-control">
                                    <option>Masetr card</option>
                                    <option>set 2</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Credit Card Number:</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Expiration Date:</label>

                                <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input  type="text" class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
                                    
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>


                            </div>

                            <div class="form-group col-sm-3">
                                <label>CVV:</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" placeholder="">
                            </div>
                            
                            <div class="btn-section">
                                <button type="submit" class="btn btn-primary">Edit</button>  
                            </div>
                        </form>
                    </div>

                </div>

            </div>


            <div class="ad-section2">
                <img src="<?= base_url('assets/front_assets/images/ad-this2.png'); ?>">
            </div>


        </div>
    </div>
            
</section>



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
     // activity details
     $(function(){
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
                    html += "<option value = "+event[i].id+">"+event[i].time_slot+" "+event[i].time_type+" (Price : "+event[i].time_slot_price+" USD)</option>";
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