<?php
    $link1 = $_SERVER['REQUEST_URI'];
    $link_array1 = explode('/',$link1);
    // echo "<pre>";
    $count_data1 = count($link_array1);
    // echo $count_data;
    // print_r($link_array);
    $count_length1 = $count_data1-2;
    
    $page1 = $link_array1[$count_length1];
    // echo $page = end($link_array);

    $count_length9 = $count_data1-1;
    
    $page9 = $link_array1[$count_length9];
?>
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
		

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Orbitron:400,700&display=swap" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	</head>
<body>

<header class="tg_header wh_bg">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3 col-md-3 logo-sec">
				<a href="<?= base_url(''); ?>" class="logo">
					<img class="logo_xl" src="<?= base_url('assets/front_assets/images/logo_tx.png'); ?>">
					<img class="d-none" src="<?= base_url('assets/front_assets/images/logo.png'); ?>">
				</a>
			</div>

			<div class="col-lg-9 col-md-9 menu-sec text-right">
				<div id="navigation">
					<nav>
						<ul>
						<?php if (isset($_SESSION['session_data'])) { ?>
							<li <?php if($page1 == 'Home'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('Home/'); ?>">Home</a></li>
							<li <?php if($page1 == 'Vault'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('Vault/'); ?>">Vault</a></li>
							<li <?php if($page1 == 'MyDesk' || $page1 == 'Provider-List'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('MyDesk/'); ?>">My Decks</a></li>
							<li <?php if($page1 == 'Deck-Editor'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('Deck-Editor/'); ?>">Deck Editor</a></li>
						<?php } ?>
							<li <?php if($page1 == 'Contact'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('Contact/'); ?>">Contact Us</a></li>
						<?php if (!isset($_SESSION['session_data'])) { ?>
							<li <?php if($page9 == 'Login_font' || $page9 == '/'){ ?> class="current-menu-item" <?php } ?>><a href="<?= base_url('Login_font') ?>">Log in </a></li>
						<?php } else { ?>
							<li class=" dropdown user-pro <?php if($page1 == 'My-Account'){ ?> current-menu-item <?php } ?>">
								<a href="javascript:;">
									<span><i class="fa fa-user" aria-hidden="true"></i> <?php if(isset($_SESSION['session_user'])){ echo $_SESSION['session_user']; } else { echo "User Profile"; } ?></span>
								</a>

								<ul class="dropdown_menu">
									<!-- <li></li> -->
									<li><a href="<?= base_url('My-Account/'); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Profile</a></li>
									<li><a href="<?= base_url('Logout_font/'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
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


