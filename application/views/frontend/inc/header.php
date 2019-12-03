
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TCG Portal</title>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="<?= base_url('assets/front_assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?= base_url('assets/front_assets/css/responsive.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?= base_url('assets/front_assets/css/slimNav_sk78.css'); ?>" rel="stylesheet" type="text/css">
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

		
		<!-- Fonts -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		

		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,900|Orbitron:400,700&display=swap" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
<body>

<header class="tg_header wh_bg">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3 col-md-3 logo-sec">
				<a href="javascript:void(0);" class="logo">
					<img class="logo_xl" src="<?= base_url('assets/front_assets/images/logo_tx.png'); ?>">
					<img class="d-none" src="<?= base_url('assets/front_assets/images/logo.png'); ?>">
				</a>
			</div>

			<div class="col-lg-9 col-md-9 menu-sec text-right">
				<div id="navigation">
					<nav>
						<ul>
						<?php if (isset($_SESSION['session_data'])) { ?>
							<li><a href="<?= base_url('Home/'); ?>">Home</a></li>
							<li><a href="<?= base_url('Vault/'); ?>">Vault</a></li>
							<li><a href="<?= base_url('MyDesk/'); ?>">My Desk</a></li>
						<?php } ?>
							<li><a href="<?= base_url('Contact/'); ?>">Contact Us</a></li>
						<?php if (!isset($_SESSION['session_data'])) { ?>
							<li class="current-menu-item"><a href="<?= base_url('Login_font') ?>">Log in </a></li>
						<?php } else { ?>
							<li class=" dropdown user-pro">
								<a href="javascript:;">
									<span><i class="fa fa-user" aria-hidden="true"></i> <?php if(isset($_SESSION['session_user'])){ echo $_SESSION['session_user']; } else { echo "User Profile"; } ?></span>
								</a>

								<ul class="dropdown_menu">
									<!-- <li></li> -->
									<li><a href="javascript:void(0);">Profile</a></li>
									<li><a href="<?= base_url('Logout_font') ?>">Logout</a></li>
								</ul>
							</li>
						<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>


