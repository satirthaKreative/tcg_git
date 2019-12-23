
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
                    <h3>Create an account</h3>
                    <?= form_open('Registration/add_reg',['id'=>'reg_form']); ?>
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
                        <button type="button" class="btn btn-primary" id="sign_up" name="sign_up" onclick="reg_function();">Sign Up</button>
                    <?= form_close(); ?>
                    <center class="sucmsg mt5" style="display: none;" ></center>
                </div>
            
                <div class="col-lg-7 left-sec">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FD-g0Vc64mQ" allowfullscreen></iframe>
                    </div>
                
                </div>
            </div>

            
        </div>
    </div>
</section>

<script>
    function reg_function(){
        $.ajax({
            url: '<?= base_url('Registration/add_reg'); ?>',
            type: 'post',
            data: $("#reg_form").serialize(),
            dataType: 'json',
            success: function(event){
                // console.log(event);
                // console.log(event.estimate_err);
                if(event.no_error == true){
                    $(".sucmsg").html("<b style='color:green'><i class='fa fa-check'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    $('#reg_form').find('input').val('');
                }else if(event.no_error == false){
                    $(".sucmsg").html("<b style='color:red'><i class='fa fa-times'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                }
            }
        });
    }
</script>