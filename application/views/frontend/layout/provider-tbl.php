<?php  
    if(!isset($_SESSION['session_data']))
    {
        redirect('');
    }
?>
<?php
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('/',$link);
    // echo "<pre>";
    $count_data = count($link_array);
    // echo $count_data;
    // print_r($link_array);
    $count_length = $count_data-2;
    
    $page = $link_array[$count_length];
    // echo $page = end($link_array);
?>
<?php $assets_data = base_url('assets/front_assets/'); ?>
<section class="inner-page">
    <img class="quote_img" src="<?= $assets_data; ?>images/wrapper_img2.jpg">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="page-wrapper col-md-9">
                    <div class="timer-section">
                        <img src="<?= $assets_data; ?>images/clock-icon.png">

                        <div class="progress-area">
                            <div class="progress">
                                <div class="progress-bar" id="progress-bar" style="width:02%"></div>
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
                                <li>
                                    <span>
                                        3 Hr
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        4 Hr
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        5 Hr
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="tab_section">

                        <ul class="nav-tab">
                            <li>
                                <a href="<?= base_url('Home/'); ?>"  class="<?php if($page == 'Home'){ ?>active<?php } ?>">Request</a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('Provider-List/'); ?>"  class="<?php if($page == 'Provider-List'){ ?>active<?php } ?>">Provider</a>
                            </li>
                        </ul>

                        <!-- Material checked -->
                        <div class="switch">
                            <label>
                                Away
                                <input type="checkbox" id="check_active_status" onchange="my_activity(<?= $_SESSION["session_data"]; ?>)">
                                <span class="lever"></span> Available
                            </label>
                        </div>

                    </div>



                    
                    <div id="provider_available" class="table-content scrl_gbl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Y/N</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Format</th>
                                    <th scope="col">Archetype</th>
                                    <!-- <th scope="col">Duration</th> -->
                                </tr>
                            </thead>
                            <tbody id="provider-details-add">

                            </tbody>
                        </table>
                        <div class="sucmsg"></div>
                    </div>
                    <div class="text-right btn_sec">
                        <button type="button" onclick="send_req_to_btn()">Send</button>
                    </div>
                </div>

                <div class="ad-section col-md-3">
                    <img src="<?= $assets_data; ?>images/card_add.png">
                </div>
            </div>
        </div>
    </div>
            
</section>
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

    // change activity
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
    
    // function provider 
    $(function(){
        $.ajax({
            url: '<?= base_url("ProvidersViewController/sender_details/") ?>',
            type: 'post',
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
                html = '';
                if(event != null)
                {
                    for(var i = 0;i < event.length; i++)
                    {

                        html += '<tr><td><div class="check-group"> <input type="radio" id="Johndeo'+i+'" name="radio-group" value="'+event[i].mainId+'"><label for="Johndeo'+i+'"></label></div></td><td>'+event[i].user_name+'</td><td>'+event[i].platform_name+'</td><td>'+event[i].format_name+'</td><td>'+event[i].archetype_name+'</td></tr>'; 
                    }
                }
                else
                {
                    html += '<tr><td colspan="7"><center class="text-warning"><i class="fa fa-file-text-o" aria-hidden="true"></i> No Provider Available</center></td></tr>';
                }
                $("#provider-details-add").html(html);

            }

        })
    })

    // function send to button
    function send_req_to_btn()
    {
        var radioValue = $("input[name='radio-group']:checked").val();
        if(radioValue == undefined)
        {
            $(".sucmsg").html("<span class='text-danger'><i class='fa fa-times'></i> You Must Choose A Providers</span>").fadeIn().delay(3000).fadeOut('slow');
        }
        else
        {
            $.ajax({
                url: '<?= base_url("ProvidersViewController/notify_request/"); ?>',
                type: 'post',
                data: {radioValue: radioValue},
                dataType: 'json',
                success:  function(event)
                {
                    if(event.no_error == true)
                    {
                        $(".sucmsg").html("<span class='text-success'><i class='fa fa-check'></i> "+event.main_msg+"</span>").fadeIn().delay(3000).fadeOut('slow');

                    }
                    else
                    {
                        $(".sucmsg").html("<span class='text-danger'><i class='fa fa-times'></i> "+event.main_msg+"</span>").fadeIn().delay(3000).fadeOut('slow');
                    }
                }
            })
        }
    }
    // show count time per user
    function show_count_time_per_user()
    {
        $.ajax({
            url: '<?= base_url('UserDesk/check_user_available_time') ?>',
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                console.log(event);
                $("#progress-bar").css("width",event.total_time+"%");
            }
        })
    }
    $(function(){
        setInterval(function(){ show_count_time_per_user(); },2000);
    })

</script>