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
                <div class="page-wrapper col-md-10">
                    <div class="timer-section">
                        <img src="<?= $assets_data; ?>images/clock-icon.png">

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



                    
                    <div class="table-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Y/N</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Format</th>
                                    <th scope="col">Archetype</th>
                                    <th scope="col">Duration</th>
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
                                    <td>MTGA</td>
                                    <td>Standard</td>
                                    <td>Esper Midrange</td>
                                    <td>2 Hrs</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="check-group">
                                            <input type="checkbox" id="Annabell">
                                            <label for="Annabell"></label>
                                        </div>
                                    </td>
                                    <td>Anna Bell</td>
                                    <td>Cockatrice</td>
                                    <td>Modern</td>
                                    <td>GB Rock</td>
                                    <td>1 Hrs</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="check-group">
                                            <input type="checkbox" id="Mickhussy">
                                            <label for="Mickhussy"></label>
                                        </div>
                                    </td>
                                    <td>Mick Hussy</td>
                                    <td>Xmage</td>
                                    <td>Legacy</td>
                                    <td>Jeskai Control</td>
                                    <td>30 min</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="ad-section col-md-2">
                    <img src="<?= $assets_data; ?>images/ad-this.png">
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
            }

        })
    })
</script>