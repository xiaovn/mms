<?php
/**
 * Project: mms.
 * File name: header.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 9:51 AM
 * Email: kenzaki@xiao.vn
 */
ob_start();
?>
<?php if (!isset($_SESSION)) session_start(); ?>
<?php include_once('class/translate.class.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Member Management System</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Member Management System">
		<meta name="author" content="Ken Zaki | Xiao JSC">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="assets/css/mms.css" rel="stylesheet">
	</head>

	<body>

<!-- Navigation
================================================== -->

	<div class="navbar navbar-fixed-top">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<h3><a class="brand" href="index.php"><?php _e('Member Management System'); ?></a></h3>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="index.php"><?php _e('Home'); ?></a></li>
						<li><a href="profile.php"><?php _e('Member Area'); ?></a></li>
						<li><a href="admin/"><?php _e('Admin CP'); ?></a></li>
					</ul>
		<?php if(isset($_SESSION['jigowatt']['username'])) { ?>
		<ul class="nav pull-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<?php echo $_SESSION['jigowatt']['gravatar']; ?>
					<a href="#"><?php echo $_SESSION['jigowatt']['username']; ?></a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['jigowatt']['user_level'])) { ?>
					<li><a href="admin/index.php"><i class="icon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="admin/settings.php"><i class="icon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="profile.php"><i class="icon-user"></i> <?php _e('My Account'); ?></a></li>
					<li><a href="http://jigowatt.co.uk/themeforest/login/install.php"><i class="icon-info-sign"></i> <?php _e('Help'); ?></a></li>
					<li class="divider"></li>
					<li><a href="logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav pull-right">
			<li><a href="login.php" class="signup-link"><em><?php _e('Have an account?'); ?></em> <strong><?php _e('Sign in!'); ?></strong></a></li>
		</ul>
		<?php } ?>
				</div>
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->
	</div><!-- /navbar-wrapper -->

<!-- Main content
================================================== -->
		<div class="container" >
			<div class="row">

				<div class="span12">
