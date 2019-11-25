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


<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>

</html>