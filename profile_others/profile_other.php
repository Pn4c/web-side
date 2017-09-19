<?php include "../show_error.php";?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<?php include "../static/system_variables.php";?>
   	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=<?php echo $font_family;?>">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="profile_other_css.php" type="text/css">
	<link href='../home/post_css.php' rel='stylesheet' type='text/css'>
	
	<title>Pn4c</title>
	<?php session_start(); ?>
	<?php include "profile_other_actions.php" ?>
	<?php include "../home/home_actions.php"; ?>
	<?php include '../languages/select_lang.php';?>
</head>
<body  style="margin:0px 0px; padding:0px 0px;overflow-y: auto;" >
	<?php include "../home/main-navbar.php"; ?>
	
	<div class="container-fluid" style="border:0px; font-size: 13px;font-family:<?php echo $font_family;?>;">
		<br /><br />
		<div id="profil-header">
			<?php include $profile_other_header; ?>
		</div>
		<br /><br />
		
		<div class="col-md-2">
			
		</div>
		
		<div class="col-md-5 col-md-offset-0" id="posts-head">
			<?php show_posts(); ?>
		</div>

		<div class="col-md-2 col-md-offset-1" id="posts-head">
			<?php show_all_nots(); ?>
		</div>
	</div>
</body>
</html>
