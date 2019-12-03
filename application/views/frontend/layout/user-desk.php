<?php
    $link = $_SERVER['PHP_SELF'];
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
                <div class="page-wrapper col-md-10">
                    <div class="timer-section">
                        <img src="<?= base_url('assets/front_assets/images/clock-icon.png'); ?>">

                        <div class="progress-area">
                            <div class="progress">
                                <div class="progress-bar" style="width:02%"></div>
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

                    <div class="tab_section">

                        <ul class="nav-tab">
                            <li>
                                <a href="<?= base_url('MyDesk/'); ?>"  class="<?php if($page == 'MyDesk'){ ?>active<?php } ?>">Request</a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('MyDesk/Provider'); ?>"  class="<?php if($page == 'Provider'){ ?>active<?php } ?>">Provider</a>
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
                                    <select class="form-control" name="format_select" id="format_select">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="archetype_select" id="archetype_select">
                                        
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
                            
                            
                        </div>

                    </div>
                </div>

                <div class="ad-section col-md-2">
                    <img src="<?= base_url('assets/front_assets/images/ad-this.png'); ?>">
                </div>
            </div>
        </div>
    </div>
            
</section>

<script>

    function mySend(data){
        $.ajax({
            url : '<?= base_url('UserDesk/submit_data/'); ?>'+data,
            type: 'post',
            data: $('#sender_data_form').serialize(),
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
            }
        })
    }
    // show platform select
    $(function(){
        var data = '';
        $.ajax({
            url: '<?= base_url('MyDesk/show_platform'); ?>',
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
    $(function(){
        var data = '';
        $.ajax({
            url: '<?= base_url('MyDesk/my_archetype_view'); ?>',
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
    })

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
                 console.log(event);
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

    $(function(){

    });
</script>