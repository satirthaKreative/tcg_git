<style>
    .white-text{ color: #fff; }



    #loader .loading-image {
        max-width: 40px;
        margin: auto;
    }

    #loader {
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        display: flex;
        background-color: rgba(0, 0, 0, 0.85);
        height: 100%;
    }
</style>

<section class="login_section">
    <div class="login_banner">
        <img src="<?= base_url('assets/front_assets/images/login_banner03.jpg'); ?>">
        
            <div class="login_content">
                <?= form_open('Login_font/add_login',['id'=>'login_form']); ?>
                <div class="form-group">
                    <input type="email" class="form-control email_text white-text"  name="user_email" placeholder="Enter Email *">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control password_text  white-text" name="user_pass" placeholder="Password *">
                </div>
                <div class="form-row">
                    <div class="form-group form-check col-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <div class="form-group col-6 text-right">
                        <a href="#" class="" data-toggle="modal" data-target="#forgot_modal">Forgot Password?</a>
                    </div>
                </div>
                <button type="button" class="btn btn-primary login_btn" name="sign_in" onclick="my_login();">Sign In</button>
                <?= form_close(); ?>
                
                <center class="sucmsg mt5" style="display: none;" ></center>
                <p class="text-center">Not a member?</p>

                <div class="button-group text-center">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#about_tcg">About TCGTester</a>
                    <a href="<?= base_url('Registration') ?>" class="btn btn-warning">Create an Account</a>
                </div>
            </div>
    </div>

    <div id="loader" style="display:none;">
        <img class="loading-image" src="<?= base_url('assets/front_assets/images/5.svg'); ?>" />
    </div>
</section>


<!-- Forgot password Modal -->
<div class="modal fade" id="forgot_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Reset Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="">
                
                <div class="form-group">
                    <input type="email" class="form-control check_email_class" id="recover_email"  placeholder="Enter Email">
                </div>

                <div class="form-group password_new" style="display: none;">
                    <input type="password" class="form-control" id="password_new"  placeholder="Enter New Password">
                </div>

                <div class="form-group password_c_new" style="display: none;">
                    <input type="password" class="form-control" id="password_c_new"  placeholder="Re-enter Confirm Password">
                </div>

                <div class="button-group text-right">
                    <button type="button" class="btn" id="change_data_pass" onclick="submit_email();">Submit</button>
                    <p class="succ-msg-check-mail"></p>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- login query -->
<!-- Modal -->
<div class="modal fade" id="about_tcg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="video_wrap">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe autoplay="" class="embed-responsive-item" src="https://www.youtube.com/embed/FD-g0Vc64mQ" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
    function my_login(){
        $.ajax({
            url: '<?= base_url('Login_font/add_login'); ?>',
            type: 'post',
            data: $("#login_form").serialize(),
            dataType: 'json',
            success: function(event){
                console.log(event);
                if(event.no_error == true){
                    // $(".sucmsg").html("<b style='color:green'><i class='fa fa-check'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');

                    $("#loader").show();
                    $('#reg_form').find('input').val('');
                    setTimeout( function(){ window.location.href='<?= base_url('Home/'); ?>' } , 3000);
                }else if(event.no_error == false){
                    $(".sucmsg").html("<b style='color:red'><i class='fa fa-times'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                }
            }
        })
    }

    function submit_email()
    {
        var data_mail = $('#recover_email').val();
        $.ajax({
            url: '<?= base_url("Registration/check_email_address/") ?>',
            type: 'post',
            data: {data_mail: data_mail},
            dataType: 'json',
            success:  function(event){
                if(event.no_error == true){
                    $(".check_email_class").css('border','1px solid #41d410');
                    $(".check_email_class").attr('readonly','readonly');
                    $(".password_c_new").show();
                    $(".password_new").show();
                    $("#change_data_pass").attr('onclick','confirm_change_password()');
                    
                }else if(event.no_error == false){
                    $(".change_data_pass").attr('onclick','submit_email()');
                    $(".password_c_new").hide();
                    $(".password_new").hide();
                    $(".succ-msg-check-mail").css('float','left');
                    $(".succ-msg-check-mail").html("<b class='text-danger'><i class='fa fa-times'></i> "+event.err_msg+"</b>").fadeIn().delay(5000).fadeOut('slow');
                }
            }, error: function(event){

            }
        })
    }

    function confirm_change_password()
    {
        var data_n_pass = $("#password_new").val();
        var data_nc_pass = $("#password_c_new").val();
        var recover_email = $("#recover_email").val();

        $.ajax({
            url: '<?= base_url("Registration/forgot_pass_recover/") ?>',
            type: 'post',
            data: {data_nc_pass:  data_nc_pass,data_n_pass:  data_n_pass,recover_email: recover_email},
            dataType: 'json',
            success:  function(event){
                if(event.no_error == true){
                    $(".succ-msg-check-mail").css('float','left');
                    $(".succ-msg-check-mail").html("<b class='text-success'><i class='fa fa-check'></i> "+event.err_msg+"</b>").fadeIn().delay(5000).fadeOut('slow');
                    setTimeout(function(){ window.location.href='<?= base_url(""); ?>'; },3000);
                }else if(event.no_error == false){
                    $(".succ-msg-check-mail").css('float','left');
                    $(".succ-msg-check-mail").html("<b class='text-danger'><i class='fa fa-times'></i> "+event.err_msg+"</b>").fadeIn().delay(5000).fadeOut('slow');
                }
            }, error: function(event){

            }
        })

    }
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click", ".login_btn", function(){

            var email = $('.email_text').val();
            var password = $('.password_text').val();
            var form_data = new FormData();
            form_data.append('action', 'loginRequest');
            form_data.append('email', email);
            form_data.append('password', password);

            $.ajax({
                url : '<?=AJAX_PATH;?>',
                type : 'POST',
                dataType : 'JSON',
                contentType : false,
                processData : false,
                data: form_data,
                success: function(data){
                    console.log(data);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        });
    });
</script> -->