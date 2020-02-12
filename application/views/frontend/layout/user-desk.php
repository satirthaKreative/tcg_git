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
<section class="inner-page">
    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg'); ?>">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="page-wrapper col-md-9">
                    <div class="timer-section">
                        <img src="<?= base_url('assets/front_assets/images/clock-icon.png'); ?>">

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
                                <a href="<?= base_url('Home/Provider'); ?>"  class="<?php if($page == 'Provider'){ ?>active<?php } ?>">Provider</a>
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



                    
                    <div class="col-md-10">

                        <div class="form-content">
                            <form action="" id="sender_data_form">

                                <div class="form-group">
                                    <select class="form-control" name="platform_select" id="platform_select">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="format_select" id="format_select" onchange="formatChange()">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="archetype_select" id="archetype_select">
                                        <option value="">Archetype Name</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="time_frame_select" id="time_frame_select">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="communication_select" id="communication_select">

                                    </select>
                                </div>
                                <button type="button" name="send" onclick="mySend(<?= $_SESSION['session_data']; ?>);" class="btn">Send</button>
                                
                            </form>
                            
                            <p class="show_res_msg"></p>
                        </div>

                    </div>
                </div>

                <div class="ad-section col-md-3">
                    <img src="<?= base_url('assets/front_assets/images/card_add.png'); ?>">
                </div>
            </div>
        </div>
    </div>
            
</section>

<script>
// sending data
    function mySend(data){
        $.ajax({
            url : '<?= base_url('UserDesk/submit_data/'); ?>'+data,
            type: 'post',
            data: $('#sender_data_form').serialize(),
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
                if(event.no_error == true)
                {
                    $(".show_res_msg").html("<span class='text-success'>"+event.main_error+"</span>").fadeIn().delay(3000).fadeOut('slow');
                    setTimeout(function(){ $(".show_res_msg").removeClass('text-success');window.location.href="<?= base_url('Provider-List/'); ?>" },3000);
                } 
                else if(event.no_error == false)
                {
                    $(".show_res_msg").html("<span class='text-danger'>"+event.main_error+"</span>").fadeIn().delay(3000).fadeOut('slow');
                } 
            }
        })
    }
    // show platform select
    $(function(){
        var data = '';
        $.ajax({
            url: '<?= base_url('MyDesk/show_platform/'); ?>',
            data: data,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                var html = '';
                    html += '<option value="">Platform</option>';
                for(var i=0;i<event.length;i++)
                {
                    html += '<option value='+event[i].id+'>'+event[i].platform_name+'</option>';
                }
                $("#platform_select").html(html);
            }
        })
    })

    // show format select
    $(function(){
        var data = '';
        $.ajax({
            url: '<?= base_url('MyDesk/show_format'); ?>',
            data: data,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                var html = '';
                    html += '<option value="">Format</option>';
                for(var i=0;i<event.length;i++)
                {
                    html += '<option value='+event[i].id+'>'+event[i].format_name+'</option>';
                }
                $("#format_select").html(html);
            }
        })
    })

    // show archetype select
    function formatChange(){
        var data = '';
        var format_id = $("#format_select").val();
        $.ajax({
            url: '<?= base_url('MyDesk/my_archetype_view_new/'); ?>'+format_id,
            data: data,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                var html = '';
                    html += '<option value="">Archetype Name</option>';
                for(var i=0;i<event.length;i++)
                {
                    html += '<option value='+event[i].id+'>'+event[i].archetype_name+'</option>';
                }
                $("#archetype_select").html(html);
            }
        })
    }

    // show time slot
    $(function(){
        var data_time_frame = '';
        $.ajax({
            url: '<?= base_url('MyDesk/data_time_frame') ?>',
            data: data_time_frame,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                //  console.log(event);
                var html = '';
                    html +='<option value="">Time Frame</option>';
                    for(var i=0;i<event.length;i++)
                    {
                        html += '<option value='+event[i].id+'>'+event[i].time_slot+' '+event[i].time_type+'</option>';
                    }
                    $("#time_frame_select").html(html);
            }
        })
    })

    // show Time Frame select
    // $(function(){
    //     var data = '';
    //     $.ajax({
    //         url: '<?= base_url('MyDesk/show_time_frame'); ?>',
    //         data: data,
    //         type: 'post',
    //         dataType: 'json',
    //         success:  function(event)
    //         {
    //             var html = '';
    //                 html += '<option value="">Time Frame</option>';
    //             for(var i=0;i<event.length;i++)
    //             {
    //                 html += '<option value='+event[i].id+'>'+event[i].format_name+'</option>';
    //             }
    //             $("#archetype_select").html(html);
    //         }
    //     })
    // });

    // communication frame
    $(function(){
        var data = '';
        $.ajax({
            url: '<?= base_url('MyDesk/communication_tbl'); ?>',
            data: data,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                console.log(event);
                var html = '';
                    html += '<option value="">Communication</option>';
                for(var i=0;i<event.length;i++)
                {
                    html += '<option value='+event[i].id+'>'+event[i].communication_name+'</option>';
                }
                $("#communication_select").html(html);
            }
        })
    }) 

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
        var msg_on_condition = "";
        
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