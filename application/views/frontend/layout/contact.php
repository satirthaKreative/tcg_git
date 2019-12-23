<section class="banner_section2">

    <img src="<?= base_url('assets/front_assets/images/banner2.jpg'); ?>">

    

    <div class="banner_text">

        <div class="container">

            <div class="row">

                <h2>Contact Us</h2>

            </div>

        </div>

    </div>



</section>



<section class="contact-sec">

    <div class="container">

        <ul>

            <li class="col-6">

                <div class="c-img">

                    <i class="fa fa-phone" aria-hidden="true"></i>

                </div>

                <h3>Phones</h3>

                <p>LiveChat (click to open)</p>



            </li>

            <li class="col-6">

                <div class="c-img">

                    <i class="fa fa-envelope-o" aria-hidden="true"></i>

                </div>

                <h3>Email</h3>

                <p><a href="javascript:void(0);">sinfo.support@tcg.com</a></p>



            </li>

        </ul>

    </div>

</section>







<section class="contact-sec2 ">

    <div class="container">

        <div class="row">

        

           

            <div class="col-lg-10 m-auto">

            

                <form id="form_email">

                    <div class="form-row">

                        <div class="form-group col-lg-4 col-sm-4">

                            <input type="text" class="form-control" id = "user_name"  name="username" placeholder="Name">

                        </div>

                        <div class="form-group col-lg-4 col-sm-4">

                            <input type="email" class="form-control" id = "user_email"  name="useremail" placeholder="Email address">

                        </div>

                        <div class="form-group col-lg-4 col-sm-4">

                            <input type="tel" class="form-control"  id = "user_number" name="usernumber" placeholder="Phone number">

                        </div>

                    </div>

                    

                    <div class="form-group">

                        <textarea class="form-control" name="usermsg"  id = "user_msg" rows="3" placeholder="How can we help?"></textarea>

                    </div>

                    <button type="button" name="send_message" onclick="send_msg_mail()" class="btn btn-primary">Send Message</button>

                </form>

                <center class="success_msg mt5"></center>



                <div class="social_section">

                    <h3>Connect with us</h3>

                    <p>Join the converstion about modern design</p>

                    <a href="javascript:void(0);" class="link"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                    <a href="javascript:void(0);" class="link"><i class="fa fa-instagram" aria-hidden="true"></i></a>

                    <a href="javascript:void(0);" class="link"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>

                    <a href="javascript:void(0);" class="link"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="block_quote">

    <img src="<?= base_url('assets/front_assets/images/contact_img2.png'); ?>">

</section>





<script>

    function send_msg_mail()

    {

        $.ajax({

            url : '<?= base_url("Contact/send_msg_mail"); ?>',

            type: 'post',

            data: $("#form_email").serialize(),

            dataType: 'json',

            success:  function(event){

                if(event.no_error == true)

                {

                    $(".success_msg").html("<b class='text-success'><i class='fa fa-check'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    $("#user_name").val('');
                    $("#user_email").val('');
                    $("#user_number").val('');
                    $("#user_msg").val('');

                }

                else

                {

                    $(".success_msg").html("<b class='text-danger'><i class='fa fa-times'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }

            }

        })

    }

</script>