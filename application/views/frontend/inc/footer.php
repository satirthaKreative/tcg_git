<dv class="notification">
    <h4>Hi, John Deo</h4>
    <span id="countdown"></span>
    <button type="button" id="stop_countdown_btn" onclick="stop_count_btn()" class="btn btn-danger btn-sm">stop</button>
</dv>
<section class="footer">

    <div class="footer_sec">
        <p>© All rights reserved is a copyright formality indicating</p>
    </div>

</section>
	
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/front_assets/js/jquery.slimNav_sk78.min.js'); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script>

    jQuery(document).ready(function() {	
        jQuery('#navigation nav').slimNav_sk78();
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

</script> 

<!-- <script>
    $.ajax({
        url: "<?= base_url('') ?>",
        type: "post",
        dataType: "json",
        success:  function(event)
        {
            
        }
    })
</script> -->


<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>

<!-- Notification hide -->
<script>
    $(".notification").hide();
    // setInterval(function(){  },1000);


    // Accept Click Data

    function accept_click(data)
    {
        $.ajax({
            url: '<?= base_url("ProvidersViewController/accept_requester/") ?>',
            type: 'post',
            data: {data:  data},
            dataType:  'json',
            success: function(event)
            {
                console.log(event);
                var val2 = event.request_time; 
                
                // convert to provider ajax
                $.post('<?= base_url("ProvidersViewController/return_time_format/") ?>',{val2: val2}).done(function(event1){ var val3 = event1; console.log(val3); time_check(val3); });  
            }
        })
    }

    function time_check(val2){
            $(".notification").show();
            var time = val2;
            parts = time.split(':');
            hours = parts[0];
            minutes = parts[1];
            seconds = parts[2];

            hoursInt = hours.split('"');
            hourNew = hoursInt[1];

            secondsInt = seconds.split('"');
            secondsNew = secondsInt[0];

            console.log(secondsNew);

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
    }

    // Accept status
    $(function(){
        setInterval(function(){ request_stopwatch(); },1000);
    })

    // $(function(){ request_stopwatch(); })
    function request_stopwatch()
    {
        if($(".notification").is(":visible"))
        {
            $.ajax({
                url: '<?= base_url("ProvidersViewController/check_request_stopwatch/") ?>',
                type: 'post',
                dataType: 'json',
                success: function(event)
                {
                    if(event.no_error == true)
                    {
                        $(".notification").hide();
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
        $.ajax({
            url: '<?= base_url('ProvidersViewController/stop_timer_id/') ?>',
            type: 'post',
            dataType: 'json',
            success: function(event)
            {

            }
        })
        
    }
</script>


</html>