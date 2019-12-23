<style>
    .white-text{ color: #fff; }
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
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="button" class="btn btn-primary login_btn" name="sign_in" onclick="my_login();">Sign In</button>
                <?= form_close(); ?>
                <center class="sucmsg mt5" style="display: none;" ></center>
                <p class="text-center">Not a member?</p>

                <div class="button-group text-center">
                    <a href="#" class="btn btn-success">About TCGTester</a>
                    <a href="<?= base_url('Registration') ?>" class="btn btn-warning">Create an Account</a>
                </div>
            </div>
    </div>
</section>



<!-- login query -->
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
                    $(".sucmsg").html("<b style='color:green'><i class='fa fa-check'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    $('#reg_form').find('input').val('');
                    setTimeout( function(){ window.location.href='<?= base_url('Home/'); ?>' } , 3000);
                }else if(event.no_error == false){
                    $(".sucmsg").html("<b style='color:red'><i class='fa fa-times'></i> "+event.estimate_err+"</b>").fadeIn().delay(3000).fadeOut('slow');
                }
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