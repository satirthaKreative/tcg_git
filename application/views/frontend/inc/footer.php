<?php if(isset($_SESSION['session_data'])){ echo "<script> var y_state = ''; </script>"; }else{ echo "<script> var y_state = 1; </script>"; } ?>
<dv class="notification" style="display:none">
    <img class="clock" src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/clock-icon.png">
    <!--<h4>Hi, John Deo</h4>-->
    <span id="countdown"></span>
    <button type="button" id="stop_countdown_btn" onclick="stop_count_btn()" class="btn btn-danger btn-sm">stop</button>

</dv>

<!-- Chatbox Content -->

<div id="frame" class="chatbox">
    
    <div class="content">
        <div class="contact-profile">
            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
            <p><!-- Harvey Specter --></p>
            
        </div>
        <div class="messages">
            <ul class="msg-sent">
                <!-- <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="">
                    <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                    <p>When you're backed against the wall, break the god damn thing down.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                    <p>Excuses don't win championships.</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="">
                    <p>Oh yeah, did Michael Jordan tell you that?</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                    <p>No, I told him that.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                    <p>What are your choices when someone puts a gun to your head?</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="">
                    <p>What are you talking about? You do what they say or they shoot you.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                    <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                </li> -->
                <li class="sent">
                     <div id="formats"></div>
                     <ol id="recordingsList"></ol>
                </li>
            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                <input type="text" placeholder="Write your message..." id="chating_box_id">
                <div class="ctrl_sec">

                        
                    <div id="controls">
                        <button id="recordButton"><i class="fa fa-microphone" aria-hidden="true"></i></button>
                        <button id="pauseButton">Pause</button>
                        <button id="stopButton"><i class="fa fa-stop" aria-hidden="true"></i></button>
                    </div>
                    <button class="submit" onclick="submit_msg_chat()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    <i class="fa fa-paperclip attachment" aria-hidden="true"></i>

                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- end of content -->

<a href="javascript:void(0);" class="c_btn" style="display:none;">
    <i class="fa fa-comment-o" aria-hidden="true"></i>
</a>

<!-- Provider Notice -->
<?php if(isset($_SESSION['session_data'])): ?>
<a href="javascript:void(0);" onclick="show_provider_click();" class="provider_notice">
    <span class="notice-count">0</span>
    <i class="fa fa-bell-o" aria-hidden="true"></i>
</a>
<?php endif; ?>
<!-- end provider section -->

<!-- Chatbox Content // -->
<section class="footer">

    <div class="footer_sec">
        <p>© All rights reserved is a copyright formality indicating</p>
    </div>

</section>
    
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/front_assets/js/BsMultiSelect.js'); ?>"></script>

<script src="<?= base_url('assets/front_assets/js/jquery.slimNav_sk78.min.js'); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script>var downlink_links = "<?= base_url('upload_audio_Controller/audio_file_upload/') ?>";</script>
<!-- Chatbox js -->
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="<?= base_url('assets/front_assets/js/app.js'); ?>"></script>


<!-- BsMultiSelect -->

<script type="text/javascript">
    //<![CDATA[


    //]]>

    
</script>


<script>
    
    $(function(){
        // $("#platform_select").val();
        // $("#platform_select").trigger("chosen:updated");

        jQuery('#navigation nav').slimNav_sk78();
    })


    // $(".form-control ").attr("placeholder", "Type a Location").val("").focus().blur();

    // $(document).ready(function() {
    //   $('.form-control [type=search]').attr("placeholder", "Your Name"); 

    // });

</script>

<script>


    jQuery(document).ready(function() { 
        // add-class-on-scroll
        jQuery('#nav-icon0').click(function(){
                jQuery(this).toggleClass('open');
        });
    });

    var url = window.location.href;
    var page_name=url.substr(url.lastIndexOf('/') + 1);
    if(page_name=="contact-us.php" || page_name=="register.php" || page_name== "index.php"){
        
        $(".tg_header").removeClass("wh_bg");
        
    }
    if (url == 'https://www.ecollegestreet.in/demo/TCGtester/html/') {

        $(".tg_header").removeClass("wh_bg");
    }

    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());

   
   
if(y_state != 1){

    // setInterval(function(){  },1000);


    // Accept Click Data

    function accept_click(data)
    {
        // checking time availibity returns true or not

        $.ajax({
            url: "<?= base_url('ProvidersViewController/checking_voult_havev_enough_time/') ?>",
            type: "post",
            data: {id_req: data},
            dataType: "json",
            success:  function(response){
                if(response.state == 1)
                {
                    // Accept field true
                    $(".provider_notice").hide();
                    $.ajax({
                        url: '<?= base_url("ProvidersViewController/accept_requester/") ?>',
                        type: 'post',
                        data: {data:  data},
                        dataType:  'json',
                        success: function(event)
                        {

                           $.ajax({
                               url: "<?= base_url('Checking_new_msg_controller/new_msg_session_set/') ?>",
                               type: "post",
                               dataType: "json",
                               success: function(resp){

                               }, error: function(resp){
                                   console.log("Error getting!!!");
                               }
                            });
                            //console.log(event);
                            var val2 = event.request_time; 
                            
                            // convert to provider ajax
                            $.post('<?= base_url("ProvidersViewController/return_time_format/") ?>',{val2: val2}).done(function(event1){ var val3 = event1; console.log(val3); time_check(val3); });  
                        }
                    })

                }
                else
                {
                    alert("You don't have enough time in your voult!!! Buy some more time!!!");
                }
            }, error: function(response){

            }
        })

    }

    function time_check(val2){
            $(".notification").show();
            $(".c_btn").show();
            var time = val2;
            parts = time.split(':');
            hours = parts[0];
            minutes = parts[1];
            seconds = parts[2];

            hoursInt = hours.split('"');
            hourNew = hoursInt[1];

            secondsInt = seconds.split('"');
            secondsNew = secondsInt[0];

            //console.log(secondsNew);

            var timer = setInterval(function(){ 
                secondsNew--;
                if(secondsNew == -1)
                {
                    secondsNew = 59;
                    minutes--;
                    if(minutes == -1)
                    {
                        minutes = 59;
                        hourNew--;
                        if(hourNew == -1)
                        {
                            clearInterval(timer);
                            stop_watch();
                            stop_count_btn();
                            return "00:00:00";
                        }
                    }
                }

                //$("#countdown").html(add_zero(hourNew)+":"+add_zero(minutes)+":"+add_zero(secondsNew));

                $("#countdown").html(hourNew+":"+minutes+":"+secondsNew);
            },1000);
    }

    // stop watch
    function  stop_watch()
    {
        $(".notification").hide();
        $(".c_btn").hide();
    }

    // Accept status
    $(function(){
        setInterval(function(){ request_stopwatch();checking_data();check_notice(); },1000);
    })
    // how to checking 
    function checking_data()
    {
        var sess_id = '<?= $_SESSION["session_data"] ?>';
        $.ajax({
            url: "<?= base_url('Checking_new_msg_controller/checking_new_msg_come/') ?>",
            type: "post",
            data: {sess_id:  sess_id},
            dataType: "json",
            success: function(event){
                
                if(event.main_content)
                {
                    console.log(event);
                    checkChatBox();
                }
                else
                {
                    console.log('checking...');
                }
            }, error: function(event){
                
            }
        })
    }
    // $(function(){ request_stopwatch(); })
    function request_stopwatch()
    {
        if($(".notification").is(":visible"))
        {
            $.ajax({
                url: '<?= base_url("ProvidersViewController/check_request_stopwatch/") ?>',
                type: 'post',
                dataType: 'json',
                success: function(event1)
                {
                    if(event1.no_error == true)
                    {
                        $(".notification").hide();
                        $(".c_btn").hide();
                    }
                    else
                    {

                    }
                }
            })
        }
        else
        {
            $.ajax({
                url: '<?= base_url("ProvidersViewController/request_stopwatch/") ?>',
                type: 'post',
                dataType: 'json',
                success: function(event)
                {
                    console.log(event);
                    if(event.no_error == true)
                    {
                    
                        var val6 = event.query_time; 
                        console.log(val6);
                        $.ajax({
                            url: '<?= base_url("ProvidersViewController/return_time_format/") ?>',
                            type: 'post',
                            data: {val2: val6},
                            dataType: 'json',
                            success: function(event1)
                            {
                                var val3 = '"'+event1+'"'; console.log(val3); time_check(val3);
                            }
                        });
                        $(".notification").show();
                        $(".c_btn").show();


                    }
                    else if(event.no_error == false)
                    {

                    }
                }

            })
        
        }
    }

    function stop_count_btn()
    {
        var data = $("#countdown").text();
        alert(data);
        $.ajax({
            url: '<?= base_url('ProvidersViewController/stop_timer_id/') ?>'+data,
            type: 'post',
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
                $(".notification").hide();
                $(".c_btn").hide();
                $(".chatbox").hide();
            }
        })
        
    }


    function newMessage() {
        message = $(".message-input input").val();
        
        if($.trim(message) == '') {
            return false;
        }
        $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        $(".messages").animate({ scrollTop: $(document).height() }, "fast");
    };

    $('.submit').click(function() {
      newMessage();
    });

    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        newMessage();
        return false;
      }
    });
    //# sourceURL=pen.js



    $(function(){
       $(".c_btn").click(function(e) {
                $("#frame").slideToggle("slow");
                return false
            });
    });

    function checkChatBox()
    {
        var main_url_checking = "<?= base_url('/'); ?>";
        if($(".c_btn").is(":visible"))
        {
            $.ajax({
                url: '<?= base_url("ChatController/chatcheck/") ?>',
                type: 'post',
                dataType: 'json',
                success:  function(event)
                {
                    var sess_id = '<?= $_SESSION["session_data"] ?>';
                    // console.log(event);
                    // console.log(sess_id);
                   if(event.length == 0)
                   {
                    $('.msg-sent').html("<li class='sent'><img src='http://emilcarlsson.se/assets/mikeross.png' alt=''><p>Start Conversation</p></li>");
                   }
                   else
                   {
                    var html = '';
                    for(i = 0; i < event.length; i++)
                    {
                        var select_one = "";
                        if(sess_id == event[i].s_id)
                        {
                            select_one = "sent";
                        }
                        else
                        {
                            select_one = "replies";
                        }


                        if(event[i].archetype_id == 1)
                        {
                            html += '<li class="'+select_one+'"><img src="http://emilcarlsson.se/assets/mikeross.png" alt=""><audio controls="" src="'+main_url_checking+'uploads/audio_save/'+event[i].msg+'"></audio></li>';
                        }
                        else
                        {
                            html += '<li class="'+select_one+'"><img src="http://emilcarlsson.se/assets/mikeross.png" alt=""><p>'+event[i].msg+'</p></li>';
                        }
                        
                    }
                    html +='<li class="sent"><div id="formats"></div><ol id="recordingsList"></ol></li>';
                    $('.msg-sent').html(html);
                   }
                }
            })
        }
        else
        {

        }
    }


    function submit_msg_chat(){
        var chat_data = $("#chating_box_id").val();
        console.log(chat_data);
        $.ajax({
            url: '<?= base_url("ChatController/insert_chat_data/") ?>'+chat_data,
            type: 'post',
            dataType: 'json',
            success: function(event)
            {
                
            }
        })
    }
    
}else{
    $(".notification").hide();
    $(".c_btn").hide();
}



function check_notice()
{
    $.ajax({
        url: "<?= base_url('Notification_Controller/check_notice/') ?>",
        type: "post",
        dataType: "json",
        success: function(event)
        {
            // console.log(event);
            // alert(event);
            $(".notice-count").html(event);
        }
    })
}

function show_provider_click()
{
    window.location.href="<?= base_url('Home/Provider-Notification'); ?>";
}

function myFuncty(data){
    // console.log(data);
    $.ajax({
        url: "<?= base_url('ChatController/insertChatVideo/') ?>",
        type:  "post",
        data: {data:  data},
        dataType: "json",
        success:  function(event){
            console.log(event);
        }, error: function(event){

        }
    })
}

</script>



</html>