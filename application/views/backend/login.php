<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/admin_assets/login_page/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin_assets/login_page/css/main.css">
<!--===============================================================================================-->
<!-- custom style end -->
<style>
	.mt5{
		margin-top: 5px;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/admin_assets/login_page/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<?= form_open('Admin_login',['class' => 'login100-form validate-form p-b-33 p-t-5','id'=>'form_id']) ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="button" class="login100-form-btn" name="login_submit" onclick="my_admin_login();">
							Login
						</button>
					</div>
				<?= form_close(); ?>
				<center class="success_msg mt5"></center>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/admin_assets/login_page/js/main.js"></script>

<!-- 	custom jquery javascript	 -->
<script>
	function my_admin_login()
	{
		// alert('test');
		$.ajax({
			url: '<?= base_url("Admin_login/check_login"); ?>',
			type: 'post',
			data: $("#form_id").serialize(),
			dataType: 'json',
			success: function(event){
				if(event.no_error == true)
				{
					$(".success_msg").html("<b style='color:green;'> <i class = 'fa fa-check'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
					window.setTimeout(function() {
					    window.location.href = '<?= base_url('Dashboard'); ?>';
					}, 3000);
				}
				else if(event.no_error == false)
				{
					$(".success_msg").html("<b style='color:red;'> <i class = 'fa fa-times'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
				}
			}
		});
	}
</script>
</body>
</html>